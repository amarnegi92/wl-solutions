<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;
use Validator;

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
            $allUsers = User::whereUserType(config('user.customer'))->get();

            if(!empty($allUsers) && (count($allUsers) > 0) ){
                $allUsers = $allUsers->toArray();
                foreach($allUsers as $user){
                    $address = Address::whereUserId($user['id'])->pluck('address');
                    $view_data[$user['id']] = array(
                        'name' => $user['name'],
                        'address' => isset($address[0]) ? $address[0] : '',
                        'mobile' => $user['mobile'],
                        'e_code' => $user['e_code'],
                        'status' => $user['status']
                    );
                }
            }


        } catch (\Exception $ex){
            Log::error('Error in Method ' .__METHOD__ .'. Error: ' .$ex->getMessage() .'\n');
            die($ex->getMessage());
        }
        return view('admin.customers',array('users' => $view_data));
        
    }

    public function add(Request $request){
        try{
            $rules = [
                'customername' => 'required|max:50',
                'mobile' => 'required|unique:users|max:10|min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
                'e_code'=>'required|unique:users|max:10',
                'customerpassword' => 'required|min:6|max:10'
            ];

            if($request->get('user_id')){
                $rules['customerpassword'] = 'sometimes|nullable|min:6|max:10';
                $rules['mobile'] = 'required|unique:users,mobile,' . $request->get('user_id')
                        . '|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10';
                $rules['e_code'] = 'required|unique:users,e_code,' . $request->get('user_id') .'|max:10';
            }

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return  back()->withErrors($validator)
                        ->withInput();
            }

            $user = array(
                'name' => $request->get('customername'),
                'email' => $request->get('mobile'),
                'e_code' => $request->get('e_code'),
                'mobile' => $request->get('mobile'),
                'status' => $request->get('status') ?? config('user.status.active')
            );

            if (!empty($request->get('customerpassword'))) {
                $user['password'] = Hash::make($request->get('customerpassword'));
            }

            //  Store data in database
            $user_id = $request->get('user_id') ? User::whereId($request->get('user_id'))->update($user) 
                :  User::create($user);

            if(isset($user_id->id) && !empty($user_id->id)){
                $address = array(
                    'user_id' => $user_id->id,
                    'address' => $request->get('address'),
                );
            }

            if ($request->get('user_id')){
                $address = array(
                    // 'user_id' => $user_id->id,
                    'address' => $request->get('address'),
                );
                Address::whereUserId($request->get('user_id'))->update($address);
            } else {
                Address::create($address);
            }
        
        } catch (\Exception $ex){
            Log::error('Error in Method ' .__METHOD__ .'. Error: ' .$ex->getMessage() .'\n');
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
            Log::error('Error in Method ' .__METHOD__ .'. Error: ' .$ex->getMessage() .'\n');
        }
        return view('admin.add_customer',array('user' => $userData));
    }

    public function getDelete($id) {
        try {
            $userData = User::whereId($id)->first();
            if($userData) {
                $userData->status = config('user.status.inactive');
                $userData->save();
            }
        } catch(\Exception $ex) {
            Log::error('Error in Customer->getDelete() '. $ex->getMessage(). '\n');
        }
        
        return redirect()->route('customers.list');
    }

}
