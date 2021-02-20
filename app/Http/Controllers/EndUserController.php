<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('end_user.arrived');
    }
}
