<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laratrust\LaratrustFacade as Laratrust;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard based on user role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Laratrust::hasRole('admin')) return $this->adminDashboard();
        if (Laratrust::hasRole('member')) return $this->memberDashboard();
    }

    private function adminDashboard()
    {
        return view('dashboard.admin');
    }

    private function memberDashboard()
    {
        return view('dashboard.member');
    }
}
