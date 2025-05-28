@extends('layout.estrutura')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('conteudo')
    <form action="/" method="post">
            <section class="sect-campos">
                <div class="campo">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf">
                </div>

                <div class="campo">
                    <label for="senha">SENHA</label>
                    <input type="password" name="senha" id="senha">
                </div>

            </section>

            <section class="sect-btn">
                <input type="submit" value="Entrar">
            </section>
        </form>
@endsection