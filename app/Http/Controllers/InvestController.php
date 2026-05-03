<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investment;
use App\Plugin\InvestmentPlugin;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Invest;
use Inertia\Inertia;

class InvestController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'Subscription';
        $data['investments'] = Investment::where('status', 1)->get();

        return Inertia::render('User/Investment/Index', [
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount'        => 'required|numeric|min:1',
            'investment_id' => 'required|exists:investments,id',
            'wallet_type'   => 'required|string',
        ]);

        $user = auth()->user();
        $investment = Investment::active()->findOrFail($request->investment_id);
        $amount = $request->amount;
        $walletType = $request->wallet_type;

        if ($this->isInvalidInvestmentAmount($amount)) {
            return back()->with('error', 'Invalid investment amount.');
        }

        if ($amount > $user->$walletType) {
            return back()->with('error', 'You don’t have enough funds.');
        }

        $investmentPlugin = new InvestmentPlugin($user, $investment);
        $investmentPlugin->invest($amount, $walletType);

       return to_route('reports.invest')->with('success', 'Subscription successful!');
    }

    private function isInvalidInvestmentAmount($amount)
    {
        return $amount <= 0;
    }

    public function investLog()
    {
        $columns = collect([
            ['key' => 'sr', 'label' => 'Sr.', 'sortable' => false, 'searchable' => false],
            ['key' => 'created_at', 'label' => 'Start Date', 'sortable' => true, 'searchable' => false, 'show' => true],
            ['key' => 'investment.name', 'label' => 'Package', 'sortable' => false, 'searchable' => false, 'show' => true],
            ['key' => 'amount', 'label' => 'Amount', 'sortable' => true, 'searchable' => true, 'show' => true],
            ['key' => 'status', 'label' => 'Status', 'sortable' => false, 'searchable' => false, 'show' => true],
            // ['key' => 'expiry_date', 'label' => 'End Date', 'sortable' => true, 'searchable' => true, 'show' => true],
        ]);

        $globalSearch = getGlobalSearchFilter(['amount']);

        $items = QueryBuilder::for(Invest::class)
            ->with('investment')
            ->where('user_id', auth()->id())
            ->dateFilter('invests.created_at')
            ->defaultSort('-created_at')
            ->allowedSorts($columns->map->key->all())
            ->allowedFilters([...$columns->map->key->all(), $globalSearch])
            ->when(request()->get('scope'), function ($query, $scope) {
                if (method_exists(Invest::class, 'scope' . ucfirst($scope))) {
                    $query->$scope();
                }
            })
            ->paginate(request()->perPage ?? getPaginate())
            ->withQueryString();

        $data['pageTitle'] = 'Subscription Log';
        $user = auth()->user();

        return Inertia::render('User/Reports/Invest', [
            'items' => $items,
            "columns" => $columns,
            "data" => $data,
        ]);
    }
}