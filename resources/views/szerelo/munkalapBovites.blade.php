@extends('auth.layouts')

@section('content')

@if (Auth::user()->role == 'munkafelvevo')
    <script type="text/javascript">
        window.location.href = "{{ url('/dashboard') }}";
    </script>
@endif

<h1>Munkalap Bovites</h1>
<hr>
<h2>Munkalap Anyagok</h2>
<table>
    <thead>
        <tr>
            <th>Anyag Neve</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($anyagok as $anyag)
            <tr>
                <td>{{ $anyag->nev }}</td>
            </tr>
        @endforeach
        <tr> 
            <td><a href={{route('bovit', ['munkalapID'=> $munkalapID, 'fajta' => 'anyag'])}}>Anyag Hozzáadása</a></td>
        </tr>
    </tbody>
</table>

<hr>
<h2>Munkafolyamatok</h2>
<table>
    <thead>
        <tr>
            <th>Munkafolyamat Neve</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($munkaFolyamatok as $s)
            <tr>
                <td>{{ $s->nev }}</td>
            </tr>
        @endforeach
        <td><a href={{route('bovit', ['munkalapID'=> $munkalapID, 'fajta' => 'munka'])}}>Munkafolyamat Hozzáadása</a></td>
    </tbody>
</table>

<hr>
<h2>Alkatreszek</h2>
<table>
    <thead>
        <tr>
            <th>Alkatrész Neve</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($alkatreszek as $alkatresz)
            <tr>
                <td>{{ $alkatresz->nev }}</td>
            </tr>
        @endforeach
        <td><a href={{route('bovit', ['munkalapID'=> $munkalapID, 'fajta' => 'alkatresz'])}}>Alkatrész Hozzáadása</a></td>
    </tbody>
</table>


@endsection