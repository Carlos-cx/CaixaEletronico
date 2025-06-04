@extends('layout.estrutura')

@section('css')
    <link rel="stylesheet" href="{{asset('css/movimentacao.css')}}">
@endsection

@section('title', 'Sacar')

@section('Usuario', auth()->user()->nomeCompleto)

@if ($errors->any())
    @section('flash_msg')
        @foreach ($errors->all() as $error)
            {{$error}} <br>
        @endforeach
    @endsection
@endif

@section('conteudo')
    <form action="{{ route('update.saque') }}" method="post" id="form">
        @csrf
        <div class="div-valor">
            <label for="valor">Valor do saque:</label>
            <input class="formater-valor" type="text" name="valor" id="valor" maxlength="11">
        </div>

        <div class="div-btn">
            <input class="btn" id="submit" type="submit" value="Sacar">
            <a href="{{ route('site.home')}}">
                <input class="btn" id="voltar" type="button" value="Inicio">
            </a>
        </div>
    </form>
@endsection

@section('script')
    <script src="{{ asset('js/formaterNumber.js') }}"></script>
@endsection