<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    protected $table = 'observations';
    protected $fillable = ['user_id', 'specie_id', 'observation','gps_coord1','gps_coord2'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function specie(){
        return $this->belongsTo('App\Models\Specie');
    }
}
