<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    protected $table = 'species';
    protected $fillable = ['name'];

    public function observations(){
        return $this->hasMany('App\Models\Observation');
    }
}
