<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
// use App\Models\User;
use App\Models\Arrived;
use App\Models\Shipment;
use Illuminate\Support\Facades\Hash;
use Validator;


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
            $all_package = Arrived::where('status', '!=', -1)->get();
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
                'order_number' => $request->get('order_number'),
                'conf_date' => $request->get('conf_date'),
                'customer_code' => $request->get('customer_code'),
                'status' => $request->get('status'),
                'description' => $request->get('description')
            );
            
            $rules = [
                'order_number' => 'required|unique:arrived',
                'conf_date' => 'required',
                'customer_code' => 'required|exists:users,e_code',
                'status' => 'required',
            ];
            
            $package_id = $request->get('package_id');
            if ($package_id) {
                $rules['order_number'] = 'required|unique:arrived,id,'. $package_id;
            }
            
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return  back()->withErrors($validator)
                        ->withInput();
            }

            $arrive_id = ($package_id) ? Arrived::whereId($package_id)->update($package) 
                :  Arrived::create($package);

        } catch (\Exception $ex) {
            Log::error('Error in ' .__METHOD__ .' Error is: '. $ex->getMessage() . '\n');
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
            dd($ex->getMessage());
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

    /**
    *addShipment
    * -- function to add/manage shippment
    */
    public function addShipment(Request $request){
                
            $package_ids = $request->get('packageId');

            $transportBy = config('shipment.transport');
            $shipmentStatus = config('shipment.status');
            
            $rules = [
                'batchtext' => 'required',
                'date' => 'required',
                'optionsRadios' => 'required',
                'status' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return  back()->withErrors($validator)
                        ->withInput();
            }

            if( isset($package_ids) && is_array($package_ids) ){
                foreach ($package_ids as $p_id) {
                    $getPackage = array();
                    $getPackage = Arrived::whereId($p_id)->first();
                    if(isset($getPackage->id)){
                        $batch = array(
                            'batch_number' => $request->get('batchtext'),
                            // 'order_number'=> $request->get('packageId'),
                            // 'arrived_id' => $request->get('packageId'),
                            'date' => $request->get('date'),
                            'ship_type' => $transportBy[$request->get('optionsRadios')],
                            'status' => $shipmentStatus[$request->get('status')],
                            'description' => $request->get('desc'),
                            'order_number' =>  $getPackage->order_number,
                            'arrived_id' => $p_id
                        );
                        
                        Shipment::create($batch);
                        $getPackage->status = 0;
                        $getPackage->save();
                    }
                    
                }
            }

        return redirect('admin/arrived');
    }

}
