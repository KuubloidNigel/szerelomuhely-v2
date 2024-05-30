@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                        You are logged in!
                    </div>       
                @endif
                @if (Auth::user()->role == 'ADMIN')
                    <p>Welcome, ADMIN!<p>
                    <h1>Szerelő Oldalai:</h1>
                    <ul>
                    <li><a href="{{ URL('/MunkaListazas') }}">Munkalapjaim listázása</a></li>
                    </ul>
                    <h1>Munkafelvevő Oldalai:</h1>
                    <ul>
                        <li><a href="{{ URL('/munkalapFelvetel') }}">Új munkalap felvevése</a></li>
                        <li><a href="{{ URL('/MunkalapListazas') }}">Munkalapok listázása</a></li>
                    </ul>
                @elseif (Auth::user()->role == 'szerelo')
                    <p>Welcome, Szerelo!</p> 
                    <ul>
                    <li><a href="{{ URL('/MunkaListazas') }}">Munkalapjaim listázása</a></li>
                    </ul>
                @elseif (Auth::user()->role == 'munkafelvevo')
                    <p>Welcome, Munkafelvevo!</p>
                    <ul>
                        <li><a href="{{ URL('/munkalapFelvetel') }}">Új munkalap felvevése</a></li>
                        <li><a href="{{ URL('/MunkalapListazas') }}">Munkalapok listázása</a></li>
                    </ul>
                @else
                    <p>Problem<p>
                @endif         
            </div>
        </div>
    </div>    
</div>
    
@endsection