<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class IconsController extends Controller
{
    public function index()
    {
        $icons = Lang::get('easyadmin::icons');
        return view('all-icons', ['icons' => $icons]);
    }
}
