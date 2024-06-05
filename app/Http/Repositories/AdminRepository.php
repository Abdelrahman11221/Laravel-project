<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\AdminInterface;

class AdminRepository implements AdminInterface{
    
    public function index()
    {
        return view('admin_assets/index');
    }

}
