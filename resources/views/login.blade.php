@extends('layout.estrutura')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('conteudo')

    @if ($mensagem = Session::get('erro'))
        {{$mensagem}}
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{$error}} <br>
        @endforeach
        
    @endif
    
    <form action="{{ route('login.auth') }}" method="post">
        @csrf
        <section class="sect-campos">
            <div class="campo">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf">
            </div>

            <div class="campo">
                <label for="senha">SENHA</label>
                <input type="password" name="password" id="senha">
            </div>

        </section>

        <section class="sect-btn">
            <input type="submit" value="Entrar">
        </section>
        </form>
@endsection