@extends('layout.estrutura')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('title', 'Cadastrar')

@if ($errors->any())
    @section('flash_msg')
        @foreach ($errors->all() as $error)
            {{$error}} <br>
        @endforeach
    @endsection
@endif 

@section('conteudo')
    <form action="{{ route('auth.register') }}" method="post">
        @csrf
        <section class="sect-campos">
            <div class="campo">
                <label for="nome">Nome Completo</label>
                <input type="text" name="nome" id="nome">
            </div>

            <div class="campo">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" maxlength="11">
            </div>

            <div class="campo">
                <label for="senha">SENHA</label>
                <input type="password" name="password" id="senha">
            </div>
        </section>

        <section class="sect-conta">
                <p>Ja tem uma Conta? <a href="{{ route('login')}}">Fazer Login</a></p>
        </section>

        <section class="sect-btn">
            <input type="submit" value="Cadastrar">
        </section>
        </form>
@endsection