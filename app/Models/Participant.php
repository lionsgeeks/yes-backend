<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        "civility",
        "name",
        "organisation",
        "category",
        "position",
        "mail",
        "phone",
        "country",
        "logo",
        "invitedToApp",
    ];
}
