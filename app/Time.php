<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Time extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'time'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];


    /*public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->deliver_phone = 1;
            $post->deliver_email = 1;
        });
    }*/

}
