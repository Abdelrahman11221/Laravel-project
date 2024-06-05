<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\homeinterface;

class homerepository implements homeinterface {

    public function home(){
        return view('user_assets/home');
    }

}