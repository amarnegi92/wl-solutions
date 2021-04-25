<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Arrived;
use App\Models\Order;
use App\Models\Shipment;
use App\Models\Transport;
use App\Models\User;
use Validator;
use Redirect;

class EndUserController extends Controller
{
    /**
     *
     */
    function profile()
    {
        return view('end_user.profile');
    }

    /**
     * postProfile
     */
    public function postProfile(Request $request) {
        try {
            $new_password = $request->get('change_password');
            if (trim($new_password)) {
                $rules = [
                    'change_password' => 'required|min:6|max:16',
                ];

                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    return back()->withErrors($validator);
                }
                $new_password = bcrypt($new_password);
                User::find(Auth::id())->update(['password' => $new_password]);
                return redirect()->route('profile')->with('message', __('The password changed successfully'));
            }
        } catch (Exception $ex) {

        }
        return redirect()->route('profile')
            ->withErrors(array('error' => __('Nothing got affected.')));

    }

    /**
     *
     */
    function sea_transport()
    {
        // Patch No.   Order No.   Date    Desc.   Status
        try {
            $arrived = array();
            $userBatch = array();
            $arrived = Transport::where('user_id', Auth::user()->id)->where('ship_status', '!=', config('shipment.status.arrived'))->where('ship_status', '!=', config('shipment.status.delivered'))->whereShipType(config('shipment.transport.sea'))->get();
            /*if (count($arrived)) {
                $arrived = $arrived->toArray();
                $shipments = Shipment::whereIn('order_number', array_keys($arrived))->whereShipType(2)->get();
                if (count($shipments)) {
                    $shipments = $shipments->toArray();
                    foreach ($shipments as $value) {
                        $userBatch[$value['batch_number']]['order_number'][] = $value['order_number'];
                        $userBatch[$value['batch_number']]['date'] = $value['date'];
                        $userBatch[$value['batch_number']]['description'] = $value['description'];
                        $userBatch[$value['batch_number']]['status'] = $value['status'];
                    }
                }
            }*/
        } catch (\Exception $ex) {
            Log::error('Error in Customer->index() ' . $ex->getMessage() . '\n');
            dd($ex->getMessage());
        }

        return view('end_user.sea_transport', array('batch' => $arrived));
    }

    /**
     *
     */
    function air_transport()
    {
        try {
            $arrived = array();
            $userBatch = array();
            $arrived = Transport::where('user_id', Auth::user()->id)->where('ship_status', '!=', config('shipment.status.arrived'))->where('ship_status', '!=', config('shipment.status.delivered'))->whereShipType(config('shipment.transport.air'))->get();
            /*if (count($arrived)) {
                $arrived = $arrived->toArray();
                $shipments = Shipment::whereIn('order_number', array_keys($arrived))->whereShipType(1)->get();
                if (count($shipments)) {
                    $shipments = $shipments->toArray();

                    foreach ($shipments as $value) {
                        $userBatch[$value['batch_number']]['order_number'][] = $value['order_number'];
                        $userBatch[$value['batch_number']]['date'] = $value['date'];
                        $userBatch[$value['batch_number']]['description'] = $value['description'];
                        $userBatch[$value['batch_number']]['status'] = $value['status'];
                    }
                }
            }*/
        } catch (\Exception $ex) {
            Log::error('Error in Customer->index() ' . $ex->getMessage() . '\n');
            dd($ex->getMessage());
        }
        return view('end_user.air_transport', array('batch' => $arrived));
    }

    /**
     *
     */
    function orders()
    {
        try {
            $orders = array();
            $orders = Order::where('user_id', Auth::user()->id)
                ->whereNotIn('status', [config('package.keyState.shipped')])->get();
            if (count($orders)) {
                $orders = $orders->toArray();
            }
        } catch (\Exception $ex) {
            Log::error('Error in Customer->index() ' . $ex->getMessage() . '\n');
        }
        return view('end_user.orders', array('all_orders' => $orders));
    }

    /**
     *
     */
    function arrived()
    {   $shipmentStatus = config('shipment.status');
        $all_arrived = Transport::where('user_id', Auth::user()->id)
                ->whereIn('ship_status', [$shipmentStatus['arrived'], $shipmentStatus['delivered']])->get();
        return view('end_user.arrived', array('all_arrived' => $all_arrived));
    }
}
