<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
// use App\Models\User;
use App\Models\Arrived;
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
        $all_package = array();
        try {
            $all_package = Arrived::get();
            if (isset($all_package) && count($all_package)) {
                $all_package = $all_package->toArray();
            }
        } catch (\Exception $ex) {
        }
        return view('admin.arrived', array('all_package' => $all_package));
    }

    /**
     * addPackage
     *   -- Function to return add package form
     *
     */
    public function addPackage()
    {
        try {
        } catch (\Exception $ex) {
            Log::error('Error in Shipping->addPackage() ' . $ex->getMessage() . '\n');
        }
        return view('admin.add_package');
    }

    /**
     * postAddPackage
     *   -- Function to add package 
     *
     */
    public function postAddPackage(Request $request)
    {
        try {
            $package = array(
                'order_number' => $request->get('ordernumber'),
                'conf_date' => $request->get('confdate'),
                'customer_code' => $request->get('customercode'),
                'status' => $request->get('state'),
                'description' => $request->get('desc')
            );
            Arrived::create($package);
        } catch (\Exception $ex) {
            Log::error('Error in Shipping->postAddPackage() ' . $ex->getMessage() . '\n');
        }
    }
}
