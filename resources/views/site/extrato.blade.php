@extends('layout.estrutura')

@section('title', 'Extrato')
    
@section('css')
    <link rel="stylesheet" href="{{ asset('css/extrato.css')}}">
@endsection

@section('conteudo')
    <table class="table">
        <tr>
            <th>Data</th>
            <th>Tipo</th>
            <th>Valor</th>
        </tr>
        @foreach ($banco as $item)
            <tr>
                <td>
                    {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                </td>
                <td>{{$item->tipo}}</td>
                <td class="column-valor" data-format="brl">{{$item->valor}}</td>
            </tr>
        @endforeach
    </table>

    <div class="div-btn">
        <a href="{{ route('site.home')}}">
            <input class="btn" type="button" value="Inicio">
        </a>
    </div>

@endsection

@section('script')
    <script src="{{ asset('js/formaterNumber.js')}}"></script>
@endsection