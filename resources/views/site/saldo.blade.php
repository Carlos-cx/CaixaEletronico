@extends('layout.estrutura')

@section('css')
    <link rel="stylesheet" href=" {{ asset('css/movimentacao.css') }}">
@endsection

@section('title', 'Saldo')

@section('conteudo')
    <p>Seu saldo atual é: <span data-format="brl">{{$saldo}}</span></p>
    <a href="{{ route('site.home')}}">
        <input class="btn" id="voltar" type="button" value="Inicio">
    </a>
@endsection

@section('script')
    <script src="{{ asset('js/formaterNumber.js')}}"></script>
@endsection
