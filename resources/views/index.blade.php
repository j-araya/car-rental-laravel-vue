
    @extends('master')
    
    @section('title', 'Renta de carros | Pernia y Araya')
    
    @section('content')

        <h1>Alquiler de carros</h1>
    
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
    @endsection