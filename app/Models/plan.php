<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'title',
        'designs',
        'dashbords',
        'storage',
        'bandwidth',
        'support',
        'price'
        ];


        // public function allUsers(){
        //     return $this->hasMany(user::class , 'plan_id' , 'id');
        // }
        
}
