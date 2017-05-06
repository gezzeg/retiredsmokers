<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       // 'name', 'email', 'password',
    'email', 'password',
    ];

    /**
     *  
     */
    
    public static function byEmail($email)
    {
        return static::whereEmail($email)->first();
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Returns the profile relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        //return $this->relationShip('foreinKey','localKey');
        //return $this->hasOne('App\Profile','user_id','id'); 
        return $this->hasOne('App\Profile');
    }

    /**
     * Returns the SmokingRecord relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function smokingRecord()
    {
        //return $this->hasOne('App\Profile','user_id');
        return $this->hasMany('App\SmokingRecord');
    }

   /*
   
    public function isAdmin()
    {
        return $this->role->slug == 'admin';
    }

    public function isAuthorized()
    {
        $listing = Listing::find(Request::segment(3));

        return Auth::user()->id == $listing->user_id;
    }

    */

}
