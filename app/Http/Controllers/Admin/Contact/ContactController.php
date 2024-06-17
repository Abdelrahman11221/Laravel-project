<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\ContactInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public $interface;
    
    public function __construct(ContactInterface $interface)
    {
        $this->interface = $interface;
    }

    public function post_contact(Request $request){
        return $this->interface->create_contact($request);
    }

    public function contact_data(){
        return $this->interface->contact_data();
    }

    public function delete_contact(Request $request){
        return $this->interface->delete($request);
    }

    public function user_data($id){
        return $this->interface->user_data($id);
    }
}
