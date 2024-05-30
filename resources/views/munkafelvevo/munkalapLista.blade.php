@extends('auth.layouts')

@section('content')

@if (Auth::user()->role == 'szerelo')
    <script type="text/javascript">
        window.location.href = "{{ url('/dashboard') }}";
    </script>
@endif


<div class="container ms-auto me-auto mt-5">
<form class="ms-auto me-auto mt-5" action="{{ route('lista') }}" method="POST">
    @csrf
        <div class="mb-3">
            <label for="search">Kereses Szerelő Azonosítója alapjan</label><br>
            <input type="text" class="form-control" style="width: 100px" name="search" placeholder="ID" value="{{ request('search') }}">
        </div>
        <div class="mb-3">
            <label for="zarte">Csak lezart?</label><br>
            <input type="checkbox" name="zarte" id="zart" value="1" {{ request('zarte') ? 'checked' : '' }}> 
        </div>
        <div class="mb-3">
            <button style="background-color: #e7e7e7; border: none; color: white;" type="submit">Kereses</button>
        </div>
</form>


    <table class="table table-light table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Szerelő azonosító</th>
                <th>Lezárt</th>
                <th>Dátum</th>
                <th>Munkafelvevő azonosító</th>
                <th>Gépjármű rendszám</th>
                <th>Összár</th>
                <th>Fizetési mód</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($munkalapok as $munkalap)
                <tr>
                    <td>{{ $munkalap->id }}</td>
                    <td>{{ $munkalap->szerelo_azonosito }}</td>
                    @if ($munkalap->lezart == 0)
                    <td>Nem</td>
                    @else
                    <td>Igen</td>
                    @endif
                    <td>{{ $munkalap->datum }}</td>
                    <td>{{ $munkalap->munkafelvevo_azonosito }}</td>
                    <td>{{ $munkalap->gepjarmu_rendszam }}</td>
                    <td>{{ $munkalap->osszar }}</td>
                    <td>{{ $munkalap->fizetesi_mod }}</td>  
                    @if ($munkalap->lezart == 0)
                        <td><a href = {{ route('modosit', ['id' => $munkalap->id]) }}>Módosítás</a></td>
                    @else
                        <td>  Nyomtatas </td> 
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

@endsection 