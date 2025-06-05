<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use App\Models\Operacao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaginaController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function home()
    {
        $conta = Conta::where('id_user', '=', Auth::user()->id)->first();
        return view('site/home', ['saldo' => $conta->saldo]);
    }

    public function extrato()
    {
        $conta = Conta::where('id_user', '=', Auth::user()->id)->first();
        $banco = Operacao::where('id_conta', '=', $conta->id)->get();
        return view('site/extrato', ['banco' => $banco]);
    }

    public function deposito()
    {
        return view('site/deposito');
    }

    public function saque()
    {
        return view('site/saque');
    }
}
