<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channels extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'CHANNEL_ID', 'CHANNEL_NAME', 'CHANNEL_ADMIN_ID', 'CHANNEL_STATUS'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}