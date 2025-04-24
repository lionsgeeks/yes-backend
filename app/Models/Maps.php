<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maps extends Model
{
    protected $fillable = [
        'name', 'description', 'url', 'people_working', 'email','logo', 'lat', 'lng' ,'is_approved', 'category' , 'type','option'

    ];
    


}
