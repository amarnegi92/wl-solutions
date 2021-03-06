<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Arrived;
use App\Models\Order;
use App\Models\Shipment;
use App\Models\Transport;

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
     * 
     */
    function sea_transport()
    {
        // Patch No.   Order No.   Date    Desc.   Status
        try {
            $arrived = array();
            $userBatch = array();
            $arrived = Transport::where('user_id', Auth::user()->id)->where('ship_status', '!=', config('shipment.status.arrived'))->whereShipType(config('shipment.transport.sea'))->get();
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
            $arrived = Arrived::whereCustomerCode(Auth::user()->e_code)->whereStatus(0)->pluck('customer_code', 'order_number');
            if (count($arrived)) {
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
            }
        } catch (\Exception $ex) {
            Log::error('Error in Customer->index() ' . $ex->getMessage() . '\n');
            dd($ex->getMessage());
        }
        return view('end_user.air_transport', array('batch' => $userBatch));
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
    {
        $all_arrived = Transport::where('user_id', Auth::user()->id)->whereShipStatus(config('shipment.status.arrived'))->get();
        return view('end_user.arrived', array('all_arrived' => $all_arrived));
    }
}
