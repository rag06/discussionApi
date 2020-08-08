<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcribers extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'SUBSCRIBER_USERID', 'SUBSCRIBER_CHANNEL_ID'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}