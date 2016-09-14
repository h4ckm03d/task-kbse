<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Events extends Model {

	protected $table = 'events';
    protected $primaryKey = 'name';
	public $timestamps = true;
    public $incrementing = false;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

}