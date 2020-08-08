<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'USER_ID', 'USER_FIRST_NAME', 'USER_LAST_NAME', 'USER_EMAIL',
        'USER_PASSWORD', 'USER_TYPE','USER_STATUS'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}