<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\homeinterface;
use Illuminate\Http\Request;

class homecontroller extends Controller
{
    public $interface;

    public function __construct(homeinterface $interface)
    {
        $this->interface = $interface;
    }

    public function home(){
        return $this->interface->home();
    }

}
