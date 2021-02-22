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
        $allUsers = $view_data = array();
        try{
            $allUsers = User::whereUserType(2)->get();
            if(!empty($allUsers) && (count($allUsers) > 0) ){
                $allUsers = $allUsers->toArray();
                foreach($allUsers as $user){
                    $address = Address::whereUserId($user['id'])->pluck('address');
                    // dd($address);
                    $view_data[$user['id']] = array(
                        'name' => $user['first_name'],
                        'address' => isset($address[0]) ? $address[0] : '',
                        'mobile' => $user['mobile'],
                        'e_code' => $user['e_code'],
                    );
                }
            }


        } catch (\Exception $ex){
            Log::error('Error in Customer->index() '. $ex->getMessage(). '\n');
            die($ex->getMessage());
        }
        return view('admin.customers',array('users' => $view_data));
        
    }

    public function add(Request $request){
        try{
        if($request->get('user_id')){

        } else {
            $this->validate($request, [
                'customername' => 'required',
                'customermobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'customercode'=>'required',
                'customerpassword' => 'required'
            ]);
        }

        $user = array(
            'first_name' => $request->get('customername'),
            'last_name' => $request->get('customername'),
            'email' => $request->get('customermobile'),
            'e_code' => $request->get('customercode'),
            'password' => Hash::make($request->get('customerpassword')),
            'mobile' => $request->get('customermobile'),
        );
        if(!$request->get('customerpassword')){
            unset($user['password']);
        }
  
        
        //  Store data in database
        if($request->get('user_id')){
            $user_id = User::whereId($request->get('user_id'))->update($user);
        } else {
            $user_id = User::create($user);
        }
        
        // dd($user_id);
        if(isset($user_id->id) && !empty($user_id->id)){
            $address = array(
                'user_id' => $user_id->id,
                'address' => $request->get('address'),
            );
        }
        if($request->get('user_id')){
            $address = array(
                // 'user_id' => $user_id->id,
                'address' => $request->get('address'),
            );
            Address::whereUserId($request->get('user_id'))->update($address);
        } else {
            Address::create($address);
        }
        
        } catch (\Exception $e){
            Log::error('Error in Customer->add'.$e->getMessage() .'\n');
            // dd($e->getMessage() );
        }
        return redirect('admin/customers');
    }

    public function getEdit($id){
        try{
            $userData = User::whereId($id)->first();
            if(isset($userData) ){
                $userData = $userData->toArray();
            }
            $address = Address::whereUserId($id)->pluck('address');
            if(isset($address)){
                $address = $address->toArray();
                $userData['address'] = $address[0];
            }
        } catch (\Exception $ex){
            Log::error('Error in Customer->getEdit() '. $ex->getMessage(). '\n');
        }
        return view('admin.add_customer',array('user' => $userData));
    }
}
