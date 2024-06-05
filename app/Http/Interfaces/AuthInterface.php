<?php
namespace App\Http\Interfaces;
interface AuthInterface{
    public function register_form();
    public function register($request);

    public function login_form();
    public function login($request);
    
    public function logout();
}