<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\ScheduleSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Validation\ValidationException;

class StaffController extends Controller
{


    
      /***********************************
     * Start THIS IS A Staff  Controller *
     ***********************************/

    
    /**
     * index
     *
     * @return void
     */

     
    public function index()
    {

        $data['columns'] = $columns = collect([
            ['key' => 'sr', 'label' => 'Sr.', 'sortable' => false, 'searchable' => false],
            ['key' => 'username', 'label' => 'Username', 'sortable' => true, 'searchable' => false, 'show' => true],
            ['key' => 'first_name', 'label' => 'First Name', 'sortable' => true, 'searchable' => false, 'show' => true],
            ['key' => 'last_name', 'label' => 'Last Name', 'sortable' => true, 'searchable' => false, 'show' => true],
            ['key' => 'email', 'label' => 'email', 'sortable' => true, 'searchable' => false, 'show' => true],
            ['key' => 'mobile', 'label' => 'mobile', 'sortable' => true, 'searchable' => false, 'show' => true],
            ['key' => 'role', 'label' => 'Role', 'sortable' => true, 'searchable' => false, 'show' => true],
            ['key' => 'actions', 'label' => 'Action', 'sortable' => true, 'searchable' => false, 'show' => true],

        ]);

        $globalSearch = getGlobalSearchFilter(['username', 'email']);

        $data['items'] = QueryBuilder::for(User::class)
            ->whereHas('roles', function ($q) {
                $q->whereIn('name', ['staff', 'manager']);
            })
            ->with('roles')
            ->defaultSort('id')
            ->allowedSorts($columns->map->key->all())
            ->allowedFilters([...$columns->map->key->all(), $globalSearch])
            ->paginate(request()->perPage ?? getPaginate())
            ->withQueryString();

        $data['roles'] = Role::whereNotIn('name', ['super_admin', 'user'])->get();
        $data['countries'] =  getCountries();


        return inertia('Admin/Staffs/Index', [
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
        $this->validation($request);

        $user = new User();
        $this->saveData($user, $request);

        return redirect()->route('admin.staffs.index')
            ->with('success', 'Staff added successfully');
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    
    public function update(Request $request, $id)
    {
        $this->validation($request);

        $user = user::findOrFail($id);
        $this->saveData($user, $request);

        return redirect()->route('admin.staffs.index')
            ->with('success', 'Staff updated successfully');
    }
    
    /**
     * saveData
     *
     * @param  mixed $user
     * @param  mixed $request
     * @return void
     */
    
    protected function saveData($user, $request)
    {
        $user->email = $request['email'];
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->password = Hash::make($request['password']);
        $user->username = trim($request['username']);
        $user->country = $request['country'];
        $user->mobile = $request['mobile'];
        $user->status = 1;
        $user->save();

        $role = Role::find($request->role_id);
        $user->assignRole($role);

        return $user;
    }
    
    /**
     * validation
     *
     * @param  mixed $request
     * @return void
     */

    protected function validation($request)
    {
        $request->validate([
            'first_name'          => 'required',
            'last_name'          => 'required',
            'email'          => 'required|email',
            'username'          => 'required',
            'password'   => 'required',
            'country'   => 'required',
            'mobile'   => 'required',
            'role_id'   => 'required',
        ]);

        $exist = User::where('email', $request->email)->exists();

        if ($exist) {
            throw ValidationException::withMessages(['email' => 'Email is already exist']);
        }
    }

        /***********************************
     * End THIS IS A Staff  Controller *
     ***********************************/

}
