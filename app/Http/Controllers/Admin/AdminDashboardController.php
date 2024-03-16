<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;


class AdminDashboardController extends Controller
{


     /***********************************
     * Start THIS IS A  Admin Dashboard Controller *
     ***********************************/

    
    /**
     * dashboard
     *
     * @return void
     */


    public function dashboard() {

        $users = User::get();
        $users = User::doesNotAdminUser()->orWhereDoesntHave('roles')->get();
        $data['banned_users'] = $users->where('status', 0)->count();
        $data['all_users']             = $users->count();
        $data['verify_users']          = $users->where('status', 1)->where('ev', 1)->count();
        $data['email_unverified_users']  = $users->where('ev', 0)->count();
        $data['email_verified_users']  = $users->where('ev', 1)->count();

        return inertia('Admin/Dashboard/AdminDashboard', [
            'data' => $data,

        ]);
    }
    
     /***********************************
     * End THIS IS A  Admin Dashboard Controller *
     ***********************************/
   
}
