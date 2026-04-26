<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\QueryBuilder\QueryBuilder;
use Inertia\Inertia;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ManageUserController extends Controller
{
    public function index()
    {
        /***********************************
         * Columns
         ***********************************/
        $data['columns'] = $columns = collect([
            ['key' => 'sr', 'label' => 'Sr.', 'sortable' => false, 'searchable' => false],
            ['key' => 'username', 'label' => 'User', 'sortable' => true, 'searchable' => false, 'show' => true],
            ['key' => 'mobile', 'label' => 'Phone', 'sortable' => true, 'searchable' => false, 'show' => true],
            ['key' => 'wallet', 'label' => 'Wallet Balance', 'sortable' => false, 'searchable' => false, 'show' => true],
            ['key' => 'created_at', 'label' => 'Joined At', 'sortable' => true, 'searchable' => false, 'show' => true],
            ['key' => 'actions', 'label' => 'Action', 'sortable' => false, 'searchable' => false, 'show' => true],
        ]);

        $globalSearch = getGlobalSearchFilter(['username', 'email', 'mobile']);
        $baseQuery = User::query()
            ->doesNotHaveAdminRole()
            ->orWhereDoesntHave('roles');

        /***********************************
         * MAIN QUERY (TABLE DATA)
         ***********************************/
        $query = QueryBuilder::for((clone $baseQuery))
            ->when(request()->get('scope'), function ($query, $scope) {
                $query->$scope();
            })
            ->defaultSort('-id')
            ->allowedSorts($columns->map->key->all())
            ->allowedFilters([
                ...$columns->map->key->all(),
                $globalSearch
            ]);

        /***********************************
         * EXPORT OR PAGINATION
         ***********************************/
        if (request()->has('exportToExcel') && request()->wantsJson()) {
            $data['items'] = $query->get();
        } else {
            $data['items'] = $query
                ->paginate(request()->perPage ?? getPaginate())
                ->withQueryString();
        }

        /***********************************
         * STATUS COUNTS (SYNCED WITH TABLE)
         ***********************************/
        $data['statusCounts'] = [
            'all' => (clone $baseQuery)->count(),
            'active' => (clone $baseQuery)->active()->count(),
            'banned' => (clone $baseQuery)->banned()->count(),
        ];

        /***********************************
         * PAGE TITLE
         ***********************************/
        $data['pageTitle'] = "All Users";

        return inertia('Admin/User/Index', [
            'data' => $data,
        ]);
    }

    public function userInfo($id)
{
    $user = User::findOrFail($id);
    
    $data = [
        'moduleTitle' => 'Manage User',
        'earning_wallet' => $user->earning_wallet,
        'deposit_wallet' => $user->deposit_wallet,
        'user' => $user, 
    ];

    return Inertia::render('Admin/User/UserInfo', [
        'data' => $data,
    ]);
}

public function updateUserWallet(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'amount' => 'required|numeric',
        'type' => 'required|in:credit,debit',
        'wallet' => 'required|in:earning_wallet,deposit_wallet',
    ]);
    // $data['pageTitle'] = "Users Info";
    $user = User::findOrFail($request->user_id);
    $admin = auth()->user();
    $amount = $request->amount;
    $transactionType = $request->type;
    $wallet = $request->wallet;

    if (!$admin->is_super_admin) {
        return redirect()->back()->with('error', 'Unauthorized access!');
    }

    $walletNames = [
        'earning_wallet' => 'Earning Wallet',
        'deposit_wallet' => 'Deposit Wallet',
    ];
    $walletDisplayName = $walletNames[$wallet] ?? $wallet;
    $currencySymbol = "$";
    
    if ($transactionType === 'credit') {
        $user->$wallet += $amount;
        $description = "Admin added {$currencySymbol}{$amount} to your {$walletDisplayName}.";
    } elseif ($transactionType === 'debit') {
        if ($user->$wallet < $amount) {
            return redirect()->back()->with('error', 'Insufficient balance!');
        }
        $user->$wallet -= $amount;
        $description = "Admin debited {$currencySymbol}{$amount} from your {$walletDisplayName}.";
    }

    $user->save();

    $transaction = Transaction::create([
        'user_id' => $user->id,
        'amount' => $amount,
        'balance' => $user->$wallet,
        'transaction_id' => Str::random(16),
        'wallet' => $wallet,
        'type' => $transactionType == 'credit' ? 'admin_fund_credit' : 'admin_fund_debit',
        'description' => $description,
    ]);

    return redirect()->back()->with('success', 'Balance successfully updated!');
}
}