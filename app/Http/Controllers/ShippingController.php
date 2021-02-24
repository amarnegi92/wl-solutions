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
            $all_package = Arrived::whereStatus(1)->get();
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
            $arrive_id = $request->get('package_id') ? Arrived::whereId($request->get('package_id'))->update($package) 
                :  Arrived::create($package);

        } catch (\Exception $ex) {
            Log::error('Error in Shipping->postAddPackage() ' . $ex->getMessage() . '\n');
        }

        return redirect('admin/arrived');
    }

    /**
    *getEditPackage
    *
    */

    public function getEditPackage($id){
        try{
            $userData = Arrived::whereId($id)->first();
            if(isset($userData) ){
                $userData = $userData->toArray();
            }
        } catch (\Exception $ex){
            Log::error('Error in Shippig->getEditPackage() '. $ex->getMessage(). '\n');
        }
        return view('admin.add_package',array('package' => $userData));
    }

    /**
    * 
    */
    public function deleteArrived($id) {
        try {
            $userData = Arrived::whereId($id)->first();
            if($userData) {
                $userData->status = -1;//config('shipping.status.archive');
                $userData->save();
            }
        } catch(\Exception $ex) {
            Log::error('Error in Customer->getDelete() '. $ex->getMessage(). '\n');
        }
        
        return redirect('admin/arrived');
    }

}
