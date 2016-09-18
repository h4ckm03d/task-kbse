<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $table = 'points';
    protected $primaryKey = 'id';
	public $timestamps = true;
    public $incrementing = false;

     /**
     * Get the locations
     */
    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Events', "event_name", "name");
    }
}
