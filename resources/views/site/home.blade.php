@extends('layout.estrutura')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('Usuario', auth()->user()->nomeCompleto)

@if ($errors->any())
    @section('flash_msg')
        @foreach ($errors->all() as $error)
            {{$error}} <br>
        @endforeach
    @endsection
@endif

@if ($mensagem = Session::get('msg'))
    @section('flash_msg')
        {{$mensagem}}
    @endsection
@endif

@section('conteudo')
    <ul class="lista-btn">
        <li class="item-btn"><a href="{{ route('site.saldo') }}">Consultar Saldo</a></li>
        <li class="item-btn"><a href="{{ route('site.extrato') }}">Extrato</a></li>
        <li class="item-btn"><a href="{{ route('site.deposito') }}">Depositar</a></li>
        <li class="item-btn"><a href="{{ route('site.saque') }}">Sacar</a></li>
        <li class="item-btn"><a href="{{ route('auth.logout') }}">Sair</a></li>
    </ul>
@endsection