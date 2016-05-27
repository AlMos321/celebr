<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Shop extends Model
{
    public $table = "shops";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'addres',
        'description',
        'hol_id',
    ];

}
