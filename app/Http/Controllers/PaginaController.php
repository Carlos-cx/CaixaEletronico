<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function home()
    {
        return view('home');
    }

    public function estrutura()
    {
        return view('layout/estrutura');
    }
}
