<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

	protected $fillable = [
        'ig_id','tag_id','code','likes','thumbnail_src','display_src', 'date', 'is_video',  'owner_id', 'caption',
    ];

    protected $dates= ['date'];

    public function getdateLabelAttribute($value='')
    {
    	return $this->date->format('d-m-Y');
    }

    public function tags()
    {
    	return $this->belongsTo('App\Tags','tag_id');
    }
}
