<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    
    public function index()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        try {
            request()->validate([
                'mobile' => 'required',
                'password' => 'required',
            ]);
     
            $credentials = $request->only('mobile', 'password');

            $remember = $request->get('remember');
            if (Auth::attempt($credentials, $remember)) {
                // Authentication passed...
                return redirect()->route('admin/dashboard');
            }
        } catch(Exception $ex) {
            die($ex->getMessage());
        }
        
        return Redirect::route("admin/login")->withSuccess('Oppes! You have entered invalid credentials');
    }
    
    public function dashboard()
    {
 
      if(Auth::check()){
        return view('dashboard');
      }
       return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }
     
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
