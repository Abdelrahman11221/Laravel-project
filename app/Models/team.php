<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'job_title',
        'description',
        'img'
    ];


    public function getImageAttribute($value){
        return 'images/team/' . $value;
    }
}
