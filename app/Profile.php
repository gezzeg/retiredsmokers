<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    protected $fillable = [
        'dob',
        'smoked',
        'lat',
        'lng',
        'city',
        'country',
        'postcode',
        'phone',
        // All the field that can be mass assigned
    ];

	public function user()
	{
		//return $this->belongsTo('App\User','id');
        return $this->belongsTo('App\User');   
	}

}
