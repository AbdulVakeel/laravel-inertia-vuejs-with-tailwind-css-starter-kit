<?php

namespace App\Http\Controllers;

class UserDashboardController extends Controller
{

    /***********************************
     * Start THIS IS A User Dashboard  Controller *
     ***********************************/


    /**
     * dashboardUser
     *
     * @return void
     */


    public function dashboardUser()
    {
        $user = auth()->user();
        $data['user'] = $user->load('referrer');


        return inertia('User/Dashboard/UserDashboard', [
            'data' => $data,
        ]);
    }


    /***********************************
     * End THIS IS A User Dashboard  Controller *
     ***********************************/
}
