<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SymptomRecord extends Model
{

  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    // 'user_id', 'symptom_record_id','note'
    // ];

    public function user(){
    	$this->belongsTo('App\User');
    }

    // public function symptom(){
    //     $this->belongsTo('App\Symptom');
    // }

    public function symptom(){
        //return $this->belongsTo('App\Symptom','symptom_records_id');
        return $this->belongsTo('App\Symptom','symptom_records_id');
    }
}
