<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shows extends Model
{
    protected $fillable = ['pending', 'approve'];

    public function showable()
    {
        return $this->morphTo();
    }
}
