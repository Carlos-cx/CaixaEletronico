<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('icons/favicon.jpg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/estrutura.css') }}">
    @yield('css')
</head>
<body>
    <section class="sect-conteudo">
        <footer>
            <h1>BANCO <span class="span-alfa">ALFA</span></h1>
            @yield('name-usuario')
        </footer>

        <main>
            <section class="sect-flash_msg">
                @yield('flash_msg')
            </section>
            
            @yield('conteudo')
        </main>
    </section>

    @yield('script')
    
</body>
</html>