<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;



class ShippingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.arrived');
dd("kddjd");
    }

    /**
    * addPackage
    *   -- Function to return add package form
    *
    */
    public function addPackage(){
        return view('admin.add_package');
    }
}
?>