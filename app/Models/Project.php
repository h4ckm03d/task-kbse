<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $table = 'projects';
	public $timestamps = true;
    protected $fillable = [
        'name'
    ];
}
