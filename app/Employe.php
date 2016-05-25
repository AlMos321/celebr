<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Employe extends Model
{
    public $table = "employes";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cos',
        'name',
        'email',
        'phone',
        'salary'
    ];

}
