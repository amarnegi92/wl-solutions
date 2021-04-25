<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;
use App\Models\Arrived;

class SeaTransportController extends Controller
{
    public function index() {
        $sea_transport_batches = Shipment::whereShipType(config('shipment.transport.sea'))->get();

        return view('admin.sea_transport', compact('sea_transport_batches'));
    }

    public function indexAir() {
        $sea_transport_batches = Shipment::whereShipType(config('shipment.transport.air'))->get();

        return view('admin.air_transport', compact('sea_transport_batches'));
    }

    public function deleteTransport($type, $id, $sanitized_order_number){
    	$getTranspoart = Shipment::whereId($id)->first();
    	if(isset($getTranspoart->arrived_id) && !empty($getTranspoart->arrived_id)){
    		Arrived::where(['sanitized_order_number' => $sanitized_order_number])
                        ->update(array('status' => config('package.keyState.arrived')));
    		$getTranspoart->delete();
    	}
        if ($type == 'air') {
            return redirect('admin/air-transport');
        }
    	return redirect('admin/sea-transport');
    }

    public function changeShipmentStatus() {
        $response = ['success' => false];
        try {
            $id = request()->get('id');
            $order_num = request()->get('order_num');
            $status = request()->get('status');
            $updated = Shipment::where(['id' => $id, 'order_number' => $order_num])->update(['status' => $status]);
            if ($updated) {
                $response = ['success' => true];
            }
        } catch (\Exception $ex) {

        }
        return response()->json($response);
    }
}
