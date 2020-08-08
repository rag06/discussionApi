<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'REPLY_ID', 'POST_ID', 'REPLY_TEXT', 'REPLY_USER_ID', 'REPLY_STATUS'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}