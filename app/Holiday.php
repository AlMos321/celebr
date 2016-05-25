<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Holiday extends Model
{
    public $table = "holidays";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cost',
        'description',
        'options',
    ];

}
