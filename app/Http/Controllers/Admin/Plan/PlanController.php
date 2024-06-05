<?php

namespace App\Http\Controllers\Admin\Plan;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\PlanInterface;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public $interface;
    public function __construct(PlanInterface $interface)
    {
        $this->interface = $interface;
    }

    public function plan_form(){
        return $this->interface->plan_form();
    }

    public function post_plan(Request $request){
        return $this->interface->post_plan($request);
    }

    public function plan_data(){
        return $this->interface->plan_data();
    }

    public function edit_form($id){
        return $this->interface->edit_form($id);
    }

    public function plan_edit(Request $request){
        return $this->interface->edit_plan($request);
    }

    public function delete_plan(Request $request){
        return $this->interface->delete_plan($request);
    }
}
