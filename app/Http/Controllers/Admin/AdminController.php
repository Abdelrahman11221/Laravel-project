<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\AdminInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $interface;

    public function __construct(AdminInterface $interface)
    {
        $this->interface = $interface;
    }

    public function index(){
        return $this->interface->index();
    }
}
