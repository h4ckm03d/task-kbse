<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = 'users';
	public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

}
