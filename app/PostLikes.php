<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostLikes extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'POST_LIKE_USER_ID', 'POST_LIKE_POST_ID'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}