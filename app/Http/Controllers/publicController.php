<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class publicController extends Controller
{
    public function show_beranda_publik()
    {
        return view('publik.beranda-publik');
    }
}
