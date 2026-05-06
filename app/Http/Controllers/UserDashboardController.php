<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Inertia\Inertia;

class UserDashboardController extends Controller
{
    /***********************************
     * User Dashboard Controller
     ***********************************/

    /**
     * Dashboard
     */
    public function dashboardUser()
    {
        $user = auth()->user();

        $data['pageTitle']      = "Dashboard";
        $data['deposit_wallet'] = $user->deposit_wallet ?? 0;
        $data['earning_wallet'] = $user->earning_wallet ?? 0;

        return Inertia::render('User/Dashboard/UserDashboard', [
            'data' => $data,
            'user' => $user,
        ]);
    }

    /**
     * FAQ Page
     */
    public function faq()
    {
        $data['faqs'] = Faq::orderBy('id', 'asc')->get();

        return Inertia::render('User/Faq/Index', [
            'data' => $data,
        ]);
    }

    /***********************************
     * End User Dashboard Controller
     ***********************************/
}