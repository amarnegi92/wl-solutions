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

    public function deleteTransport($id){
    	$getTranspoart = Shipment::whereId($id)->first();
    	if(isset($getTranspoart->arrived_id) && !empty($getTranspoart->arrived_id)){
    		Arrived::whereId($getTranspoart->arrived_id)->update(array('status' => 5));
    		$getTranspoart->status = 3;
    		$getTranspoart->save();
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
