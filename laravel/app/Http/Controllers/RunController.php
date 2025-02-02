<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class RunController extends Controller
{
    public function runService(Request $request)
    {
        $class = $request->input('class');
        $classPath = 'App\\Services\\' . $class;

        return (new $classPath)->handle();
    }
}
