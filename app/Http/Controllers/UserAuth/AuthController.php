<?php

namespace App\Http\Controllers\UserAuth;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\AuthInterface;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public $interface;

    public function __construct(AuthInterface $interface)
    {
        $this->interface = $interface;
    }

    public function register_form()
    {
        return $this->interface->register_form();
    }

    public function register(Request $request){
        return $this->interface->register($request);
    }

    public function login_form(){
        return $this->interface->login_form();
    }

    public function login(Request $request){
        return $this->interface->login($request);
    }

    public function logout(){
        return $this->interface->logout();
    }
}
