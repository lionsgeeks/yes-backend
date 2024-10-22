<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'message',
        'mark_as_read'
    ];
}
