<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;

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
}
