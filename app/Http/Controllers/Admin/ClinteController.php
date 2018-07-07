<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClinteController extends Controller
{
    public function form(){
        return view('admin.clientes_form', ['acao'=>1]);
    }
}
