<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\homeinterface;
use App\Models\team;

class homerepository implements homeinterface {

    public function home(){
        $team = team::get();
        return view('user_assets/home' , compact('team'));
    }

}