<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function web(Request $request){
        $view = 'web/demos/'.$request->web;
        return view($view);
    }


}
