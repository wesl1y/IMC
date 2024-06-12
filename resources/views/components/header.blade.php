
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titlePage }}</title>
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
    <header>
        <div id="div-title">
            <h1 id="title">{{ $titlePage }}</h1>
        </div>
        <nav>
            <ul>
                <li><a href="{{$nav1}}">{{ $titleNav1 }}</a></li>
                <li><a href="{{$nav2}}">{{ $titleNav2 }}</a></li>
                <li><a href="{{$nav3}}">{{ $titleNav3 }}</a></li>
                
            </ul>
        </nav>
    </header>
