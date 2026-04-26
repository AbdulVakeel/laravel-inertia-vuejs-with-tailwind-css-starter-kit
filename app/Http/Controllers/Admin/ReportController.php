<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Spatie\QueryBuilder\QueryBuilder;
use Inertia\Inertia;

class ReportController extends Controller
{



    public function transaction()
    {
        $data['pageTitle'] = "Transaction Logs";
        $data['columns'] = $columns = collect([
            ['key' => 'sr', 'label' => 'SN.', 'sortable' => false, 'searchable' => false],
            ['key' => 'user', 'label' => 'User', 'sortable' => false, 'searchable' => false],
            ['key' => 'transaction_id', 'label' => 'Transaction', 'sortable' => true, 'searchable' => false],
            ['key' => 'amount', 'label' => 'Amount', 'sortable' => true, 'searchable' => false],
            ['key' => 'balance', 'label' => 'Balance', 'sortable' => true, 'searchable' => false],
            ['key' => 'type', 'label' => 'Type', 'sortable' => true, 'searchable' => false],
            ['key' => 'wallet', 'label' => 'Wallet', 'sortable' => true, 'searchable' => false],
            ['key' => 'description', 'label' => 'Description', 'sortable' => false, 'searchable' => false,],
            ['key' => 'created_at', 'label' => 'Date', 'sortable' => true, 'searchable' => false],
        ]);

        $globalSearch = getGlobalSearchFilter(['transaction_id', 'amount', 'balance']);
        $query = QueryBuilder::for(Transaction::class)
            ->defaultSort('-id')
            ->with('user')
            ->when(request()['user'] ?? null, function ($q, $user) {
                $q->whereHas('user', function ($query) use ($user) {
                    $query->where('username', 'like', "%$user%");
                });
            })
            ->when(request()['type'] ?? null, function ($q, $type) {
                $q->where('type', $type);
            })
            ->dateFilter('created_at')
            ->allowedSorts($columns->map->key->all())
            ->allowedFilters([...$columns->map->key->all(), $globalSearch])
            ->when(request()->get('scope'), function ($query, $scope) {
                if (method_exists(Transaction::class, 'scope' . ucfirst($scope))) {
                    $query->$scope();
                }
            });

        $data['items'] = $query->paginate(request()->perPage ?? getPaginate())->withQueryString();

        return Inertia::render('Admin/Reports/Transactions', [
            'data' => $data,
        ]);
    }


}
