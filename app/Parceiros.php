<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parceiros extends Model
{

    public function marca() {
        return $this->belongsTo('App\Marca');
    }
    protected $fillable = ['nome', 'marca', 'cidade', 'fone'];
}
