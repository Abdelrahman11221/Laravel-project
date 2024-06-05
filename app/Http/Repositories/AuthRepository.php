<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\AuthInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthRepository implements AuthInterface{
    
    public function register_form(){
        return view('user_assets/register');
    }

    public function register($request) {
        // Validate the request
        $validate = Validator::make($request->all(), [
            'username' => 'required|string|min:3',  // Change 'name' to 'username'
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        // Check if validation fails
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        // Create a new Admin with the correct field names
        User::create([
            'name' => $request->username,  // Use $request->username to match the form field
            'email' => $request->email,
            'password' => $request->password, // Hash the password before storing it
            'role' => $request->role
        ]);

        session()->flash('done', 'Registration was successful');
        return redirect()->route('home');
    }

    public function login_form(){
        return view('user_assets/login');
    }

    public function login($request)
    {
        $var = $request->only(['email' , 'password']);
        $validate = Validator::make($request->all() , [
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($var)){
            return redirect(route('home'));
        }
        session()->flash('error' , 'faild login');
        return redirect()->back();

    }

    public function logout(){
        session()->flush();
        Auth::logout();
        return redirect(route('login_form'));
    }
    
}