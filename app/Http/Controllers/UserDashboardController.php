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



        return inertia('User/Dashboard/UserDashboard', [
     
        ]);
    }


    /***********************************
     * End THIS IS A User Dashboard  Controller *
     ***********************************/
}
