<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $table = 'points';
    protected $primaryKey = 'id';
	public $timestamps = true;
    public $incrementing = false;
    protected $fillable = [
        // 'id',
        'date',
        'time',
        'project_id',
        'location_id',
        'user_id',
        // 'event_name',
        'longitude',
        'latitude'
    ];

     /**
     * Get the locations
     */
    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'location_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project',"project_id","id");
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Events', "event_name", "name");
    }
}
