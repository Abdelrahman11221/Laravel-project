<?php
namespace App\Http\Interfaces;

interface ContactInterface{
    public function create_contact($request);
    public function contact_data();
    public function delete($request);
    public function user_data($id);
}