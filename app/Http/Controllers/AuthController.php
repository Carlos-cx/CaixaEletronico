<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Bissolli\ValidadorCpfCnpj\CPF;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'cpf' => 'required',
            'password' => 'required'
        ], [
            'cpf.required' => 'Campo CPF é obrigatório',
            'password.required' => 'Campo Senha é obrigatório'
        ]);

        $validarCpf = new CPF($request->input('cpf'));
        if (!$validarCpf->isValid()) {
            return back()->withErrors(['cpf' => 'CPF inválido.']);
        }

        $credenciais = [
            'cpf' => $request->cpf,
            'password' => $request->password
        ];

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            return redirect(route('site.home'));
        } else {
            return redirect()->back()->withErrors(['cpf' => 'CPF ou Senha incorretos.']);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'min:15', 'max:100'],
            'cpf' => ['required', 'unique:App\Models\User,cpf', 'size:11'],
            'password' => ['required', 'min:4']
        ], [
            'nome.required' => 'Campo Nome é obrigatório',
            'nome.string' => 'Digite um nome Valido',
            'nome.min' => 'Digite um nome Valido',
            'nome.max' => 'Digite um nome Valido',
            'cpf.required' => 'Campo CPF é obrigatório',
            'cpf.unique' => 'Ja existe um registro com esse CPF',
            'cpf.size' => 'Digite um CPF valido',
            'password.required' => 'Campo Senha é obrigatório',
            'password.min' => 'Senha muita curta'
        ]);

        $validarCpf = new CPF($request->input('cpf'));
        if (!$validarCpf->isValid()) {
            return back()->withErrors(['cpf' => 'CPF inválido.']);
        }

        DB::beginTransaction();

        try {
            $credenciais = [
                'nomeCompleto' => $request->nome,
                'cpf' => $request->cpf,
                'password' => bcrypt($request->password)
            ];

            $user = User::create($credenciais);

            $user->banco()->create();

            DB::commit();

            return redirect(route('login'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['erro' => 'Erro ao cadastrar o Usuario | ' . $e->getMessage()]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
