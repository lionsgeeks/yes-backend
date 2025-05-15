<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register_Map extends Model
{
    use HasFactory;
    protected $table = 'register_maps';

    protected $fillable = [
        'name',
        'email',
        'role',
        'lat',
        'lng'
    ];
public function showable()
{
    return $this->morphTo();
}

    
}
