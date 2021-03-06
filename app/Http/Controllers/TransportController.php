<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transport;
use App\Models\User;
use Validator;
use Log;

class TransportController extends Controller
{
    public function index() {
        $transports = Transport::get();

        return view('admin.transports', compact('transports'));
    }
    
    public function indexSea() {
        $transport_batches = Transport::whereShipType(config('shipment.transport.sea'))->get();

        return view('admin.new_sea_transport', compact('transport_batches'));
    }

    public function indexAir() {
        $transport_batches = Transport::whereShipType(config('shipment.transport.air'))->get();

        return view('admin.new_air_transport', compact('transport_batches'));
    }

    public function addSea($transport = []) {
         $customer_codes = User::pluck('e_code', 'id');
         return view('admin.add_sea_transport', compact('transport', 'customer_codes'));
    }
    public function addAir($transport = []) {
        $customer_codes = User::pluck('e_code', 'id');
        return view('admin.add_air_transport', compact('transport', 'customer_codes'));
    }

     /**
     * postAddTransport
     */
    public function postAddTransport(Request $request)
    {
        try {
            $transport = array(
                'ctn_qty' => $request->get('ctn_qty'),
                'description' => $request->get('description'),
                'batch_number' => $request->get('batch_number'),
                'volume' => $request->get('volume'),
                'weight' => $request->get('weight'),
                'eta' => $request->get('eta'),
                'container_number' => $request->get('container_number'),
                'received_date' => $request->get('received_date'),
                'user_id' => $request->get('user_id'),
                'ship_type' => $request->get('ship_type'),
                'ship_status' => $request->get('ship_status'),
            );
            
            $rules = [
                'ctn_qty' => 'required',
                'batch_number' => 'required',
                'user_id' => 'required|exists:users,id',
                'ship_status' => 'required',
            ];
            
            $addRules = [];
            if (request()->get('ship_type') == config('shipment.transport.sea')) {
                $addRules = [
                    'volume' => 'required',
                    'container_number' => 'required',
                ];
            } else {
                $addRules = [
                     'weight' => 'required',
                     'received_date' => 'required',
                ];
            }
            $rules = array_merge($rules, $addRules);

            $transport_id = $request->get('transport_id');
            
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return  back()->withErrors($validator)
                        ->withInput();
            }

            $result = ($transport_id) ? Transport::whereId($transport_id)->update($transport) 
                :  Transport::create($transport);

        } catch (\Exception $ex) {
            Log::error('Error in ' .__METHOD__ .' Error is: '. $ex->getMessage() . '\n');
        }

        return ($request->get('ship_type') == config('shipment.transport.sea')) ?
            redirect()->route('admin.transport.sea') : 
            redirect()->route('admin.transport.air');
    }

    public function editTransport($id) {
        $transport = Transport::find($id);
        if ($transport) {
            return ($transport->ship_type == config('shipment.transport.sea')) ? 
            $this->addSea($transport->toArray()) : $this->addAir($transport->toArray());
        } else {
             abort(404);
        }
    }




    public function deleteTransport($type, $id) {
    	Transport::find($id)->delete();

       return ($type == 'air') ?
            redirect('admin/air-transport') : redirect('admin/sea-transport');
    }

}
