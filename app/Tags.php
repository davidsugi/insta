<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
  

	protected $fillable = [
        'tag', 'update_internal', 'last_upd',
    ];

    protected $dates= ['last_upd'];

    public function medias()
    {
    	return $this->hasMany('App\Media','tag_id');
    }

    public function getLocalAttribute()
    {
    	$v=$this->update_internal;
    	if($v==1){
    		return "1 jam";
    	}
    	else if($v==2)
    	{
    		return "30 menit";
    	}
    	else if($v==3){
    		return "15 menit";
    	}
        else if($v==4){
            return "tidak pernah";
        }
    }

    public function getLastAttribute()
    {
    	return $this->last_upd->format('d-m-Y h:i');
    }
}
