<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListPerson extends Model
{
		protected $fillable = [
        'id','list',
    ];

         public function detail_list()
    {
    	return $this->HasMany('App\DetailList','list_id');
    }
}
