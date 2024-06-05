<?php
namespace App\Http\Interfaces;
interface PlanInterface{
    public function plan_form();
    public function post_plan($request);
    public function plan_data();
    public function edit_form($id);
    public function edit_plan($request);
    public function delete_plan($request);
}