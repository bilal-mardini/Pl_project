<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compeleteprofile extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'image_url',
        'experince_title',
        'experince_desc',
        'phone',
        'adress',
        'available_time',
        'consualting_id',
    ];


}
