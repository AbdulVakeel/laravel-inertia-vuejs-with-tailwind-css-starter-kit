<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class HomeController extends Controller
{

    public function index()
{

    $data['moduleTitle'] = 'Home';

     return Inertia::render('Home', [
        'data' => $data,
    ]);
}

}
