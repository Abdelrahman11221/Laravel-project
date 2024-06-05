<?php
namespace App\Http\Interfaces;
interface AdminAuthInterface{
    public function login_form();
    public function register_form();
    public function register($request);
    public function login($request);
    public function logout();
}