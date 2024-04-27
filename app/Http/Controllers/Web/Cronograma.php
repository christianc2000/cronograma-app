<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Cronograma extends Controller
{
    public function create(){
        return view('web.cronograma.create');
    }
}
