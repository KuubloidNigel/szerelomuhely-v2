@extends('auth.layouts')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<form class="ms-auto me-auto mt-5" style="width: 500px; top: 50%; position: relative;" action="{{ route('hozzaadas')}}" method ="POST">
    <h1 class="mb-5 text-center">Munkalap</h1>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput1" name="felvevoNev">
        <label for="floatingInput1">Munkafelvevő neve</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput3" name="szereloAzonosito">
        <label for="floatingInput3">Szerelő azonosito</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput4" name="jarmuRendszam">
        <label for="floatingInput4">Gepjármű rendszáma</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput5" name="jarmuGyartmany">
        <label for="floatingInput5">Gepjármű gyártmánya</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput6" name="jarmuTipus">
        <label for="floatingInput6">Gepjármű típusa</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput7" name="jarmuTulajNev">
        <label for="floatingInput7">Gepjármű tulajdonosának neve</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput8" name = "jarmuTulajCim">
        <label for="floatingInput8">Tulajdonos címe</label>
    </div>
    <select class="form-select mb-3" aria-label="Default select example" name="fizetesiMod">
        <option selected>Fizetési mód:</option>
        <option value="1">Bankkártya</option>
        <option value="2">Készpénz</option>
    </select>
    <button type="submit" class="btn btn-primary">Munkalap létrehozása</button>
</form>

@endsection