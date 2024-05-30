@extends('auth.layouts')

@section('content')

@if (Auth::user()->role == 'szerelo')
    <script type="text/javascript">
        window.location.href = "{{ url('/dashboard') }}";
    </script>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<form class="ms-auto me-auto mt-5" style="width: 500px; top: 50%; position: relative;" action="{{ route('hozzaadas')}}" method ="POST">
    @csrf
    <h1 class="mb-5 text-center">Munkalap</h1>

    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('felvevoAzonosító') is-invalid @enderror" id="floatingInput1" name="felvevoAzonosito" value="{{ old('felvevoAzonosító') }}">
        <label for="floatingInput1">Munkafelvevő Azonosítója</label>
        @error('felvevoAzonosító')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('szereloAzonosito') is-invalid @enderror" id="floatingInput3" name="szereloAzonosito" value="{{ old('szereloAzonosito') }}">
        <label for="floatingInput3">Szerelő azonosito</label>
        @error('szereloAzonosito')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('jarmuRendszam') is-invalid @enderror" id="floatingInput4" name="jarmuRendszam" value="{{ old('jarmuRendszam') }}">
        <label for="floatingInput4">Gepjármű rendszáma</label>
        @error('jarmuRendszam')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('jarmuGyartmany') is-invalid @enderror" id="floatingInput5" name="jarmuGyartmany" value="{{ old('jarmuGyartmany') }}">
        <label for="floatingInput5">Gepjármű gyártmánya</label>
        @error('jarmuGyartmany')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('jarmuTipus') is-invalid @enderror" id="floatingInput6" name="jarmuTipus" value="{{ old('jarmuTipus') }}">
        <label for="floatingInput6">Gepjármű típusa</label>
        @error('jarmuTipus')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('jarmuTulajNev') is-invalid @enderror" id="floatingInput7" name="jarmuTulajNev" value="{{ old('jarmuTulajNev') }}">
        <label for="floatingInput7">Gepjármű tulajdonosának neve</label>
        @error('jarmuTulajNev')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('jarmuTulajCim') is-invalid @enderror" id="floatingInput8" name="jarmuTulajCim" value="{{ old('jarmuTulajCim') }}">
        <label for="floatingInput8">Tulajdonos címe</label>
        @error('jarmuTulajCim')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <select class="form-select mb-3 @error('fizetesiMod') is-invalid @enderror" aria-label="Default select example" name="fizetesiMod">
        <option selected>Fizetési mód:</option>
        <option value="kartya">Bankkártya</option>
        <option value="keszpenz">Készpénz</option>
    </select>
    @error('fizetesiMod')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn btn-primary">Munkalap létrehozása</button>
</form>

@endsection
