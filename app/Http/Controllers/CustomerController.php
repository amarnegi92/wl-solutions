<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;



class CustomerController extends Controller
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
        $allUsers = array();
        try{
            $allUsers = User::whereUserType(2)->get();
            if(!empty($allUsers) && (count($allUsers) > 0) ){
                $allUsers = $allUsers->toArray();
            }

        } catch (\Exception $ex){
            Log::error('Error in Customer->index() '. $ex->getMessage(). '\n');
            die($ex->getMessage());
        }
        return view('admin.customers',array('users' => $allUsers));
        
    }

    public function add(Request $request){
        try{
            // Form validation
            
        $this->validate($request, [
            'customername' => 'required',
            'customermobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'customercode'=>'required',
            'customerpassword' => 'required'
         ]);

        $user = array(
            'first_name' => $request->get('customername'),
            'last_name' => $request->get('customername'),
            'email' => $request->get('customermobile'),
            'e_code' => $request->get('customercode'),
            'password' => Hash::make($request->get('customerpassword')),
            'mobile' => $request->get('customermobile'),
        );
        //  Store data in database
        $user_id = User::create($user);
        if(isset($user_id->id) && !empty($user_id->id)){
            $addrerss = array(
                'user_id' => $user_id->id,
                'address' => $request->get('address'),
            );
            Address::create($address);
        }
        dd($user_id->id);
        } catch (\Exception $e){
            Log::error('Error in Customer->add'.$e->getMessage() .'\n');
            die($e->getMessage());
        }
        return view('/admin/customers');
    }

    public function getEdit($id){
        try{
            $userData = User::whereId($id);
        } catch (\Exception $ex){
            Log::error('Error in Customer->getEdit() '. $ex->getMessage(). '\n');

        }
    }
}
