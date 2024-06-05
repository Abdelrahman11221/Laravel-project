<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\AdminAuthInterface;
// use App\Models\admin;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminAuthRepository implements AdminAuthInterface{
    public function login_form(){
        return view('admin_assets/auth/login');
    }

    public function register_form()
    {
        return view('admin_assets/auth/register');
    }

    public function register($request) {
        // Validate the request
        $validate = Validator::make($request->all(), [
            'username' => 'required|string|min:3',  // Change 'name' to 'username'
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6'
        ]);

        // Check if validation fails
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        // Create a new Admin with the correct field names
        Admin::create([
            'name' => $request->username,  // Use $request->username to match the form field
            'email' => $request->email,
            'password' => $request->password // Hash the password before storing it
        ]);

        session()->flash('done', 'Registration was successful');
        return redirect()->route('admin.home');
    }

    public function login($request)
    {
        $var = $request->only(['email' , 'password']);
        $validate = Validator::make($request->all() , [
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($var)){
            return redirect()->route('admin.home');
        }
        session()->flash('error' , 'faild login');
        return redirect()->back();
    }

    public function logout(){
        session()->flush();
        Auth::logout();
        return redirect()->route('admin.login');
    }
}