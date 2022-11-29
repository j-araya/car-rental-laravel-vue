<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="antialiased">
        <div id="app">
            @isset($messages)
                <ul>
                    @foreach ($message as $messages)
                        <li>
                            <h1>{{$message}}</h1>
                        </li>
                    @endforeach
                </ul>
            @endisset
        </div>
    </body>
</html>
