<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContaController extends Controller
{
    public function deposito(Request $request)
    {
        $request->validate([
            'valor' => 'required|numeric|min:1.0',
        ], [
            'valor.required' => 'Deposito nao efetuado: valor nulo.',
            'valor.numeric' => 'Deposito nao efetuado: valor precisa ser numerico.',
            'valor.min' => 'Deposito nao efetuado: valor incorreto.'
        ]);

        DB::beginTransaction();

        try {
            $conta = Conta::where('id_user', '=', Auth::user()->id)->first();
            $conta->saldo += $request->valor;
            $conta->save();

            $movimentacao = [
                'tipo' => "Depósito",
                'valor' => $request->valor,
            ];

            $conta->operacao()->create($movimentacao);

            DB::commit();
            return redirect()->route('site.home')->with('msg', 'Deposito feito com sucesso.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('site.home')->withInput()->withErrors(['erro' => 'Erro ao depositar | ' . $e->getMessage()]);
        }
    }

    public function saque(Request $request)
    {
        $request->validate([
            'valor' => 'required|numeric|min:1.0',
        ], [
            'valor.required' => 'Saque não efetuado: valor nulo.',
            'valor.numeric' => 'Saque não efetuado: valor precisa ser numerico.',
            'valor.min' => 'Saque não efetuado: valor incorreto.'
        ]);

        DB::beginTransaction();

        try {
            $conta = Conta::where('id_user', '=', Auth::user()->id)->first();

            if ($request->valor > $conta->saldo) {
                return redirect()->route('site.home')->with('msg', 'Erro ao efetuar saque, Saldo insuficiente.');
            }

            $conta->saldo -= $request->valor;
            $conta->save();

            $movimentacao = [
                'tipo' => "Saque",
                'valor' => ($request->valor * (-1)),
            ];

            $conta->operacao()->create($movimentacao);

            DB::commit();
            return redirect()->route('site.home')->with('msg', 'Saque efetuado com Sucesso.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['erro' => 'Erro ao efetuar saque | ' . $e->getMessage()]);
        }
    }
}
