<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduct = Products::count();
        return view('Dashboard.index', ['totalProduct' => $totalProduct]);
    }
}
