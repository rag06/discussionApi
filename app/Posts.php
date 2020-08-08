<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'POST_ID', 'POST_NAME', 'POST_TEXT', 'POST_CHANNEL_ID', 'POST_USER_ID', 'POST_STATUS'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}