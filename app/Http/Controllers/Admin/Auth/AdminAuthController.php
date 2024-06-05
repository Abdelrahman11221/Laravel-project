<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\AdminAuthInterface;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public $interface;
    public function __construct(AdminAuthInterface $interface)
    {
        $this->interface = $interface;
    }

    public function login_form(){
        return $this->interface->login_form();
    }

    public function register_form(){
        return $this->interface->register_form();
    }

    public function register(Request $request){
        return $this->interface->register($request);
    }

    public function login(Request $request){
        return $this->interface->login($request);
    }

    public function logout(){
        return $this->interface->logout();
    }
}
