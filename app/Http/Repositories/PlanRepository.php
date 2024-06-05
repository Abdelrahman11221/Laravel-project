<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\PlanInterface;
use App\Models\plan;
use Illuminate\Support\Facades\Validator;

class PlanRepository implements PlanInterface{
    
    public function plan_form()
    {
        return view('admin_assets.design.plan_form');
    }

    public function post_plan($request)
    {
        $validate = Validator::make($request->all() , [
            'title' => 'required|min:3',
            'designs' => 'required|min:3',
            'dashbords' => 'required|min:3',
            'storage' => 'required|min:3',
            'bandwidth' => 'required|min:3',
            'support' => 'required|min:3',
            'price' => 'required|min:3',
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        plan::create([
            'title' => $request->title,
            'designs' => $request->designs,
            'dashbords' => $request->dashbords,
            'storage' => $request->storage,
            'bandwidth' => $request->bandwidth,
            'support' => $request->support,
            'price' => $request->price
        ]);

        session()->flash('done' , 'plan inserted successfully');
        return redirect(route('plan.data'));
    }

    public function plan_data()
    {
        $plan = plan::get();
        return view('admin_assets.design.plan_data' , compact('plan'));
    }

    public function edit_form($id)
    {
        $data = plan::find($id);
        return view('admin_assets.design.update_plan' , compact('data'));
    }

    public function edit_plan($request)
    {
        $plan = plan::find($request->id);

        $plan->update([
            'title' => $request->title,
            'designs' => $request->designs,
            'dashbords' => $request->dashbords,
            'storage' => $request->storage,
            'bandwidth' => $request->bandwidth,
            'support' => $request->support,
            'price' => $request->price
        ]);
        session()->flash('done' , 'plan updated succesfully');
        return redirect(route('plan.data'));
    }

    public function delete_plan($request)
    {
        $delete = plan::find($request->id);
        $delete->delete();
        return redirect(route('plan.data'));
    }
}