@extends('layout.estrutura')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('conteudo')
    <section class="sect-btn">
        <div class="div-btn">
            <button id="btn-consultar_saldo">Consultar Saldo</button>
        </div>

        <div class="div-btn">
            <button id="btn-extrato">Extrato</button>
        </div>

        <div class="div-btn">
            <button id="btn-depositar">Depositar</button>
        </div>

        <div class="div-btn">
            <button id="btn--sacar">Sacar</button>
        </div>

        <div class="div-btn">
            <button id="btn-sair">Sair</button>
        </div>
        
    </section>
@endsection