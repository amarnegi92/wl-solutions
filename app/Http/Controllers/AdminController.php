<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * 
     */
    function dashboard()
    {
        return view('admin.dashboard');
    }
    /**
     * 
     */
    function customers()
    {
        return view('admin.customers');
    }
    /**
     * 
     */
    function add_customer()
    {
        return view('admin.add_customer');
    }
    /**
     * 
     */
    function add_package()
    {
        return view('admin.add_package');
    }
    /**
     * 
     */
    function arrived()
    {
        return view('admin.arrived');
    }
    /**
     * 
     */
    function sea_transport()
    {
        return view('admin.sea_transport');
    }
    /**
     * 
     */
    function air_transport()
    {
        return view('admin.air_transport');
    }

}
