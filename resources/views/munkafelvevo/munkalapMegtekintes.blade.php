@extends('auth.layouts')

@section('content')

@vite(['resources/css/app.css', 'resources/js/app.js'])

@if (Auth::user()->role == 'szerelo')
    <script type="text/javascript">
        window.location.href = "{{ url('/dashboard') }}";
    </script>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<form class="ms-auto me-auto mt-5" style="width: 500px; top: 50%; position: relative;" action="{{ route('frissites') }}" method="POST">
    @csrf
    <h1 class="mb-5 text-center">Munkalap</h1>
    <div class="form-floating mb-3">
        <input disabled type="text" class="form-control" id="floatingInput1" value="{{ $munkalap->munkafelvevo_azonosito ?? '' }}" name="felvevoNev">
        <label for="floatingInput1">Munkafelvevő azonosító</label>
    </div>
    <div class="form-floating mb-3">
        <input disabled type="text" class="form-control" id="floatingInput3" value="{{ $munkalap->szerelo_azonosito ?? '' }}" name="szereloAzonosito">
        <label for="floatingInput3">Szerelő azonosító</label>
    </div>
    <div class="form-floating mb-3">
        <input disabled type="text" class="form-control" id="floatingInput4" value="{{ $munkalap->gepjarmu_rendszam ?? '' }}" name="jarmuRendszam">
        <label for="floatingInput4">Gepjármű rendszáma</label>
    </div>
    <div class="form-floating mb-3">
        <input disabled type="text" class="form-control" id="floatingInput5" value="{{ $gepjarmu->gyartmany ?? '' }}" name="jarmuGyartmany">
        <label for="floatingInput5">Gepjármű gyártmánya</label>
    </div>
    <div class="form-floating mb-3">
        <input disabled type="text" class="form-control" id="floatingInput6" value="{{ $gepjarmu->tipus ?? '' }}" name="jarmuTipus">
        <label for="floatingInput6">Gepjármű típusa</label>
    </div>
    <div class="form-floating mb-3">
        <input disabled type="text" class="form-control" id="floatingInput7" value="{{ $tulaj->nev ?? '' }}" name="jarmuTulajNev">
        <label for="floatingInput7">Gepjármű tulajdonosának neve</label>
    </div>
    <div class="form-floating mb-3">
        <input disabled type="text" class="form-control" id="floatingInput8" value="{{ $tulaj->cim ?? '' }}" name="jarmuTulajCim">
        <label for="floatingInput8">Tulajdonos címe</label>
    </div>
    <select disabled class="form-select mb-3" aria-label="Default select example" name="fizetesiMod">
        <option value="kartya" {{ $munkalap->fizetesi_mod == 'kartya' ? 'selected' : '' }}>Bankkártya</option>
        <option value="keszpenz" {{ $munkalap->fizetesi_mod == 'keszpenz' ? 'selected' : '' }}>Készpénz</option>
    </select>
</form>
<button onclick="print()" class="mx-auto btn btn-primary">Nyomtatás</button>


@endsection