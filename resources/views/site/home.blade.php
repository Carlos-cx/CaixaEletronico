@extends('layout.estrutura')

@section('title', 'Inicio')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

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

@section('name-usuario', auth()->user()->nomeCompleto)

@section('conteudo')
    <div class="div-dados">
        <p>
            Saldo Disponível
            <span id="saldo" data-format="brl">{{$saldo}}</span>
        </p>

        <button id="btn-saldo-visivel">
            <img id="imgVisivelOn" src="{{ asset('icons/visibilityOn.png') }}" alt="">
            <img id="imgVisivelOff" src="{{ asset('icons/visibilityOff.png') }}" alt="">
        </button>
    </div>

    <ul class="lista-btn">
        <li class="item-btn"><a href="{{ route('site.extrato') }}">Extrato</a></li>
        <li class="item-btn"><a href="{{ route('site.deposito') }}">Depositar</a></li>
        <li class="item-btn"><a href="{{ route('site.saque') }}">Sacar</a></li>
        <li class="item-btn"><a href="{{ route('auth.logout') }}">Sair</a></li>
    </ul>
@endsection

@section('script')
    <script src="{{ asset('js/formaterNumber.js')}}"></script>
    <script src="{{asset('js/ocultarSaldo.js')}}"></script>
@endsection

