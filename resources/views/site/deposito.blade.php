@extends('layout.estrutura')

@section('css')
    <link rel="stylesheet" href="{{asset('css/movimentacao.css')}}">
@endsection

@section('title', 'Depositar')

@if ($errors->any())
    @section('flash_msg')
        @foreach ($errors->all() as $error)
            {{$error}} <br>
        @endforeach
    @endsection
@endif

@section('conteudo')
    <form action="{{ route('update.deposito') }}" method="post" id="form">
        @csrf
        <div class="div-valor">
            <label for="valor">Valor do deposito:</label>
            <input class="formater-valor" type="text" name="valor" id="valor" maxlength="11">
        </div>

        <div class="div-btn">
            <input class="btn" id="submit" type="submit" value="Depositar">
            <a href="{{ route('site.home')}}">
                <input class="btn" id="voltar" type="button" value="Inicio">
            </a>
        </div>
    </form>
@endsection

@section('script')
    <script src="{{ asset('js/formaterNumber.js')}}"></script>
@endsection