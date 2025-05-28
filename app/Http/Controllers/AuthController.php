<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Bissolli\ValidadorCpfCnpj\CPF;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $request->validate([
            'cpf' => ['required'],
            'password' => ['required']
        ], [
            'cpf.required' => 'Campo CPF é obrigatório',
            'password.required' => 'Campo Senha é obrigatório'
        ]);

        $credenciais = [
            'cpf' => $request->cpf,
            'password' => $request->password
        ];

        $validarCpf = new CPF($request->input('cpf'));
        if (!$validarCpf->isValid()) {
            return back()->withErrors(['cpf' => 'CPF inválido.']);
        }

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            return redirect('home');
        } else {
            return redirect()->back()->withErrors(['cpf' => 'CPF ou Senha incorretos.']);
        }
    }
}
