<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailList extends Model
{
	protected $fillable = [
        'id','name','username','list_id'
    ];
      public function detail_list()
    {
    	return $this->belongsTo('App\ListPerson','list_id');
    }
}
