<?php

namespace App;

class EventsModel extends Eloquent {

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
        'description',
    ];

}