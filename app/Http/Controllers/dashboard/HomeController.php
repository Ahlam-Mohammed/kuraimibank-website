<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard.page.index');
    }

    public function region()
    {
        return view('dashboard.page.manage-regions');
    }

    public function servicePoint()
    {
        return view('dashboard.page.manage-service-points');
    }
}
