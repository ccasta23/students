<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testing Laravel</title>
</head>
<body>
    <h1>Aprendiendo Laravel</h1>
    <h2>Temas principales</h2>
    <ul>
        <li>Rutas</li>
        <li>Plantillas Blade</li>
    </ul>
    @isset($title)
        <h2>{{$title}}</h2>
        @if (str_starts_with($title, 'Clase'))
            <p>Se cumplió la condición</p>
        @endif
    @endisset

    @isset($topics)
        <h2>Principal topics</h2>
        <ul>
        @foreach($topics as $key => $value)
            <li>{{$key}} = {{$value}}</li>
        @endforeach
        </ul>
    @endisset

</body>
</html>
