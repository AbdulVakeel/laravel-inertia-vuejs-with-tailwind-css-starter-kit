<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\QueryBuilder\QueryBuilder;

class ManageUserController extends Controller
{


     /***********************************
     * Start THIS IS A  Manage User - Controller *
     ***********************************/

    
    /**
     * ManageUserController
     *
     * @return void
     */


    public function index() {

        $data['columns'] = $columns = collect([
            ['key' => 'sr', 'label' => 'Sr.', 'sortable' => false, 'searchable' => false],
            ['key' => 'username', 'label' => 'USER ID ', 'sortable' => true, 'searchable' => false, 'show' => true],
            ['key' => 'first_name', 'label' => 'First Name ', 'sortable' => true, 'searchable' => false, 'show' => true],
            ['key' => 'last_name', 'label' => 'Last Name ', 'sortable' => true, 'searchable' => false, 'show' => true],
            ['key' => 'email', 'label' => 'Email', 'sortable' => true, 'searchable' => false, 'show' => true],
            ['key' => 'mobile', 'label' => 'Phone', 'sortable' => true, 'searchable' => false, 'show' => true],
            ['key' => 'created_at', 'label' => 'Joined At', 'sortable' => true, 'searchable' => false, 'show' => true],
        ]);
        $globalSearch = getGlobalSearchFilter(['username', 'email', 'mobile']);

        $query = QueryBuilder::for(User::class)
            ->defaultSort('-id')
            ->allowedSorts($columns->map->key->all())
            ->allowedFilters([...$columns->map->key->all(), $globalSearch]);

        if (request()->has('exportToExcel') && request()->wantsJson()) {
            return $query->get();
        } else {
            $data['items'] =  $query->paginate(request()->perPage ?? getPaginate())->withQueryString();
        }


        $data['pageTitle'] = "All Users";

        return inertia('Admin/User/Index', [
            'data' => $data,
        ]);
    }
    
     /***********************************
     * End THIS IS A  ManageUser  Controller *
     ***********************************/
   
}
