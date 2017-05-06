<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmokingRecord extends Model
{
    
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'user_id', 'smoking_statuses_id','date',
    ];

    //
    //protected $table = 'smoking_records';

	function user(){

		return $this->belongsTo('App\User');

	}

	function smokingStatus(){

		//return $this->hasOne('App\SmokingStatus');
		return $this->belongsTo('App\SmokingStatus','smoking_statuses_id');

	}

}
