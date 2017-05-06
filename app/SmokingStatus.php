<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmokingStatus extends Model
{
    //

	function smokingRecord(){

		//return $this->belongsToMany('App\SmokingRecord');
		return $this->hasMany('App\Record','smoking_statuses_id');

	}



}
