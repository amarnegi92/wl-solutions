<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Order;
use App\Models\User;
use Log;

class OrderController extends Controller
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
        $all_order = array();
        try {
            $all_order = Order::where('status', '!=', config('package.keyState.deleted'))->get()->map(function ($order) {
              $order->customer_code = User::find($order->user_id)->e_code; 
              return $order;
            });
            if (isset($all_order) && count($all_order)) {
                $all_order = $all_order->toArray();
            }
        } catch (\Exception $ex) {
             Log::error('Error in ' . __METHOD__ . ' ' . $ex->getMessage() . '\n');
        }
        return view('admin.orders', array('all_order' => $all_order));
    }

    /**
     * addOrder
     */
    public function addOrder()
    {
        try {
        } catch (\Exception $ex) {
            Log::error('Error in ' . __METHOD__ . ' ' . $ex->getMessage() . '\n');
        }

        $customer_codes = User::pluck('e_code', 'id');

        return view('admin.add_order' , compact('customer_codes'));
    }
    
    
    
    /**
     * postAddOrder
     *   -- Function to add order 
     *
     */
    public function postAddOrder(Request $request)
    {
        try {
            $order = array(
                'order_number' => $request->get('order_number'),
                'order_slug' => slug($request->get('order_number')),
                'conf_date' => $request->get('conf_date'),
                'description' => $request->get('description'),
                'user_id' => $request->get('user_id'),
                
            );
            
            $rules = [
                'order_number' => 'required|unique:orders',
                'conf_date' => 'required',
                'user_id' => 'required|exists:users,id',
            ];
            
            $order_id = $request->get('order_id');
            if ($order_id) {
                $rules['order_number'] = 'required|unique:orders,id,'. $order_id;
            }
            
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return  back()->withErrors($validator)
                        ->withInput();
            }

            $result = ($order_id) ? Order::whereId($order_id)->update($order) 
                :  Order::create($order);

        } catch (\Exception $ex) {
            Log::error('Error in ' .__METHOD__ .' Error is: '. $ex->getMessage() . '\n');
        }

        return redirect()->route('admin.orders');
    }

    /**
    *getEditOrder
    *
    */

    public function getEditOrder($id){
        try{
            $order = Order::whereId($id)->first();
            if(isset($order) ){
                $order = $order->toArray();
            }
            $customer_codes = User::pluck('e_code', 'id');
        } catch (\Exception $ex){
            Log::error('Error in '. __METHOD__ .' '. $ex->getMessage(). '\n');
            dd($ex->getMessage());
        }
       
        return view('admin.add_order',compact('order', 'customer_codes'));
    }

    /**
    * 
    */
    public function deleteOrder($id) {
        try {
            $userData = Order::whereId($id)->first();
            if($userData) {
                $userData->status = config('package.keyState.deleted');
                $userData->save();
            }
        } catch(\Exception $ex) {
            Log::error('Error in ' . __METHOD__ .' '. $ex->getMessage(). '\n');
        }
        
        return redirect()->route('admin.orders');
    }

}
