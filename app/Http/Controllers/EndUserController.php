<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Arrived;

class EndUserController extends Controller
{
    /**
     * 
     */
    function profile() {
        return view('end_user.profile');
    }
    /**
     * 
     */
    function sea_transport() {
        return view('end_user.sea_transport');
    }
    /**
     * 
     */
    function air_transport() {
        return view('end_user.air_transport');
    }
    /**
     * 
     */
    function arrived() {
        try{
            $arrived = array();
            $arrived = Arrived::whereCustomerCode(Auth::user()->e_code)->get();
            if(count($arrived)){
                $arrived = $arrived->toArray();
            }
        } catch (\Exception $ex){
            Log::error('Error in Customer->index() '. $ex->getMessage(). '\n');
        }
        return view('end_user.arrived',array('all_arrived' => $arrived));
    }
}
