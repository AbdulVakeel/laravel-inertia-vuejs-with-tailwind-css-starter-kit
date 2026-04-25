<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\QueryBuilder\QueryBuilder;

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
        ]);

        $globalSearch = getGlobalSearchFilter(['username', 'email', 'mobile']);

        /***********************************
         * BASE QUERY (IMPORTANT FIX)
         * admin exclude everywhere
         ***********************************/
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
}