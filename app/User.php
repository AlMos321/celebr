<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'surname',
        'deliver_phone',
        'deliver_email',
        'is_admin',
        'facebook_id',
        'vk_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static $rules = array(
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6|max:10',
    );


    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->deliver_phone = 1;
            $post->deliver_email = 1;
        });

        static::updating(function ($post) {
            if((strlen($post->password) >= 6 && strlen($post->password) <= 10)){
                $post->password = bcrypt($post->password);
            }
        });
    }

}
