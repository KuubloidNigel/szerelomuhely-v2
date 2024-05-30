@extends('auth.layouts')

@section('content')

@if (Auth::user()->role == 'munkafelvevo')
    <script type="text/javascript">
        window.location.href = "{{ url('/dashboard') }}";
    </script>
@endif

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<form class="ms-auto me-auto mt-5" style="width: 500px; top: 50%; position: relative;" action="{{ route('adas')}}" method ="POST">
    @csrf
    @if ($fajta == "anyag")
        <h1>Anyag</h1>
    @elseif ($fajta == "munka")
        <h1>Munkafolyamat</h1>
    @else
        <h1>Alkatrész</h1>
    @endif

    <div class="form-floating mb-3">
        <input type="text" class="form-control @error('mennyiseg') is-invalid @enderror" id="floatingInput10" name="mennyiseg" value="{{ old('mennyiseg') }}">
        @if($fajta != "munka")<label for="floatingInput10">Mennyiség</label>
        @else <label for="floatingInput10">Időtartam</label>
        @endif
        @error('mennyiseg')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <select class="form-select mb-3 @error('fizetesiMod') is-invalid @enderror" aria-label="Default select example" name="cucc">
        @foreach ($cucc as $cumo)
        <option value={{$cumo->nev}}>{{$cumo->nev}}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary">Létrehozás</button>
</form>

@endsection
