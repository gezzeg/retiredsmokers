<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'title', 
    'content',
    'status',
    'privacy',
    'user_id'
    ];


    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function getStatusAttribute($value)
    {
        return ucwords($value);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = strtolower($value);
    }

    public function getPrivacyAttribute($value)
    {
        return ucwords($value);
    }

    public function setPrivacyAttribute($value)
    {
        $this->attributes['privacy'] = strtolower($value);
    }

    /**
     * Scope a query to only include draft articles.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublish($query)
    {
        return $query->where('status', '=', 'publish');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', '=', 'draft');
    }

    public function scopePublic($query)
    {
        return $query->where('privacy', '=', 'public');
    }    

    public function scopePrivate($query)
    {
        return $query->where('privacy', '=', 'private');
    }


}
