<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    public function sub()
    {
        return $this->hasMany('App\SubKriteria', 'id_kriterias', 'id');
    }
}
