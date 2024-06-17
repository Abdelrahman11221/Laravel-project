<?php
namespace App\Http\Repositories;

use App\Http\Interfaces\ContactInterface;
use App\Models\contact;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ContactRepository implements ContactInterface{
    public function create_contact($request)
    {
        $validate = Validator::make($request->all() , [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:admins,email',
            'message' =>'required'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'user_id' => $request->user_id
        ]);
        session()->flash('done' , 'message sent successfully');
        return redirect()->back();
    }

    public function contact_data()
    {
        $contact = contact::get();
        return view('admin_assets.design.contact_data' , compact('contact'));
    }

    public function delete($request)
    {
        $contact = contact::find($request->id);
        $contact->delete();
        return redirect()->back();
    }

    public function user_data($id)
    {
        $user = User::find($id);
        return view('admin_assets.design.user_data' , compact('user'));
    }
}