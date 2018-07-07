<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Carro;

class relatController extends Controller
{
    public function relcarros(){
        $carros = Carro::all();

        return \PDF::loadView('admin.relcarros', 
                                        ['carros'=>$carros])->stream();

    }
}
