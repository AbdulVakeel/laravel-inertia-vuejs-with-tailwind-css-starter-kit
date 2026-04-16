<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class RoleController extends Controller
{
    
      /***********************************
     * Start THIS IS A Role  Controller *
     ***********************************/

    /**
     * index
     *
     * @return void
     */

     
    public function index()
    {

        $data['columns'] = $columns = collect([
            ['key' => 'sr', 'label' => 'Sr.', 'sortable' => false,],
            ['key' => 'name', 'label' => 'Role Name', 'sortable' => true,],
            ['key' => 'actions', 'canBeHidden' => false],
        ]);

        $globalSearch = getGlobalSearchFilter(['name']);

        $data['items'] = QueryBuilder::for(Role::class)
            ->defaultSort('id')
            ->allowedSorts($columns->map->key->all())
            ->allowedFilters([...$columns->map->key->all(), $globalSearch])
            ->paginate(request()->perPage ?? getPaginate())
            ->withQueryString();

        return inertia('Admin/Role/Index', [
            'data' => $data,
        ]);
    }
    
    /**
     * create
     *
     * @return void
     */

     
    public function create()
    {
        $data['item'] = new Role();
        $data['permissions'] = Permission::all();
        return inertia('Admin/Role/Edit', [
            'data' => $data,
        ]);
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    
    public function store(Request $request)
    {
        (new Role)->addRecord();

        return redirect()->route('admin.role.index')
            ->with('success', 'Permissions granted to role successfully.');
    }

    
    /**
     * edit
     *
     * @param  mixed $role
     * @return void
     */
    
    public function edit(Role $role)
    {
        $data['item'] = $role->load('permissions');
        $data['permissions'] = Permission::all();
        return inertia('Admin/Role/Edit', [
            'data' => $data,
        ]);
    }

    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $role
     * @return void
     */


    public function update(Request $request, Role $role)
    {
        $role->updateRecord();

        return redirect()->route('admin.role.index')
            ->with('success', 'Permissions granted to role successfully.');
    }

       /***********************************
     * End THIS IS A Role  Controller *
     ***********************************/

}
