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
    /**
     * Display a listing of users
     */
    public function index()
    {
        // Define table columns
        $columns = collect([
            ['key' => 'sr', 'label' => 'Sr.', 'sortable' => false, 'searchable' => false],
            ['key' => 'username', 'label' => 'User', 'sortable' => true, 'searchable' => false, 'show' => true],
            ['key' => 'mobile', 'label' => 'Phone', 'sortable' => true, 'searchable' => false, 'show' => true],
            ['key' => 'wallet', 'label' => 'Wallet Balance', 'sortable' => false, 'searchable' => false, 'show' => true],
            ['key' => 'created_at', 'label' => 'Joined At', 'sortable' => true, 'searchable' => false, 'show' => true],
            ['key' => 'actions', 'label' => 'Action', 'sortable' => false, 'searchable' => false, 'show' => true],
        ]);

        // Base query - exclude admin roles
        $baseQuery = User::query()
            ->doesNotHaveAdminRole()
            ->orWhereDoesntHave('roles');

        // Build main query with filters and sorting
        $query = QueryBuilder::for(clone $baseQuery)
            ->when(request()->get('scope'), function ($query, $scope) {
                $query->$scope();
            })
            ->defaultSort('-id')
            ->allowedSorts($columns->map->key->all())
            ->allowedFilters([
                ...$columns->map->key->all(),
                getGlobalSearchFilter(['username', 'email', 'mobile'])
            ]);

        // Handle export or pagination
        if (request()->has('exportToExcel') && request()->wantsJson()) {
            $items = $query->get();
        } else {
            $items = $query->paginate(request()->perPage ?? getPaginate())->withQueryString();
        }

        // Get status counts
        $statusCounts = [
            'all' => (clone $baseQuery)->count(),
            'active' => (clone $baseQuery)->active()->count(),
            'banned' => (clone $baseQuery)->banned()->count(),
        ];

        // Return Inertia response
        return inertia('Admin/User/Index', [
            'data' => [
                'columns' => $columns,
                'items' => $items,
                'statusCounts' => $statusCounts,
                'pageTitle' => 'All Users',
            ]
        ]);
    }

    /**
     * Show user information
     */
    public function userInfo($id)
    {
        $user = User::findOrFail($id);

        return Inertia::render('Admin/User/UserInfo', [
            'data' => [
                'pageTitle' => 'Manage User',
                'earning_wallet' => $user->earning_wallet,
                'deposit_wallet' => $user->deposit_wallet,
                'user' => $user,
            ]
        ]);
    }

    /**
     * Update user wallet balance (credit/debit)
     */
    public function updateUserWallet(Request $request)
    {
        // Validate request
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0.01',
            'type' => 'required|in:credit,debit',
            'wallet' => 'required|in:earning_wallet,deposit_wallet',
        ]);

        // Find user and admin
        $user = User::findOrFail($request->user_id);
        $admin = auth()->user();

        // Check if admin is super admin
        if (!$admin->is_super_admin) {
            return redirect()->back()->with('error', 'Unauthorized access!');
        }

        $amount = $request->amount;
        $transactionType = $request->type;
        $wallet = $request->wallet;

        // Wallet display names
        $walletNames = [
            'earning_wallet' => 'Earning Wallet',
            'deposit_wallet' => 'Deposit Wallet',
        ];

        $walletDisplayName = $walletNames[$wallet] ?? $wallet;
        $currencySymbol = "$";

        // Process credit/debit
        if ($transactionType === 'credit') {
            $user->$wallet += $amount;
            $description = "Admin added {$currencySymbol}{$amount} to your {$walletDisplayName}.";
        } else {
            // Check for insufficient balance
            if ($user->$wallet < $amount) {
                return redirect()->back()->with('error', 'Insufficient balance!');
            }
            $user->$wallet -= $amount;
            $description = "Admin debited {$currencySymbol}{$amount} from your {$walletDisplayName}.";
        }

        $user->save();

        // Create transaction record
        Transaction::create([
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

    /**
     * Ban/Unban user
     */
    public function status(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user->status == 1) {
            // Ban user
            $request->validate([
                'reason' => ['required', 'string', 'max:255'],
            ]);
            $user->status = 0;
            $user->ban_reason = $request->reason;
            $user->save();
            return back()->with('success', 'User Banned successfully');
        } else {
            // Unban user
            $user->status = 1;
            $user->ban_reason = null;
            $user->save();
            return back()->with('success', 'User Unbanned successfully');
        }
    }
}