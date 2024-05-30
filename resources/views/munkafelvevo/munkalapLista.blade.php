@extends('auth.layouts')

@section('content')

<div class="container ms-auto me-auto mt-5">
<form class="ms-auto me-auto mt-5" action="{{ route('lista') }}" method="POST">
    @csrf
        <div class="mb-3">
            <label for="search">Kereses ID alapjan</label><br>
            <input type="text" name="search" placeholder="ID" value="{{ request('search') }}">
        </div>
        <div class="mb-3">
            <label for="zarte">Csak lezart?</label><br>
            <input type="checkbox" name="zarte" id="zart" value="1" {{ request('zart') ? 'checked' : '' }}> 
        </div>
        <div class="mb-3"
            <button style="  background-color: #e7e7e7; border: none; color: white;" type="submit">Kereses</button>
        </div>
</form>

<p>
    @if ($search)
        Eredmények erre: {{ $search }}
    @else
        Minden munkalap
    @endif
</p>


    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>szerelo_azonosito</th>
                <th>lezart</th>
                <th>datum</th>
                <th>munkafelvelo_azonosito</th>
                <th>gepjarmu_rendszam</th>
                <th>osszar</th>
                <th>fizetesimod</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($munkalapok as $munkalap)
                <tr>
                    <td>{{ $munkalap->id }}</td>
                    <td>{{ $munkalap->szerelo_azonosito }}</td>
                    <td>{{ $munkalap->lezart }}</td>
                    <td>{{ $munkalap->datum }}</td>
                    <td>{{ $munkalap->munkafelvevo_azonosito }}</td>
                    <td>{{ $munkalap->gepjarmu_rendszam }}</td>
                    <td>{{ $munkalap->osszar }}</td>
                    <td>{{ $munkalap->fizetesi_mod }}</td>  
                    <td><a href = {{ route('modosit', ['id' => $munkalap->id]) }}>Módosítás</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

@endsection 