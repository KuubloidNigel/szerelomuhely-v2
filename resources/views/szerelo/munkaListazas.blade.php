@extends('auth.layouts')

@section('content')

@if (Auth::user()->role == 'munkafelvevo')
    <script type="text/javascript">
        window.location.href = "{{ url('/dashboard') }}";
    </script>
@endif

<table class="table table-light table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dátum</th>
                <th>Munkafelvevő azonosító</th>
                <th>Gépjármű rendszám</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($munkalapok as $munkalap)
                @if ($munkalap->lezart == 0)
                <tr>
                    <td>{{ $munkalap->id }}</td>
                    <td>{{ $munkalap->datum }}</td>
                    <td>{{ $munkalap->munkafelvevo_azonosito }}</td>
                    <td>{{ $munkalap->gepjarmu_rendszam }}</td>

                    <td><a href={{ route('bovito' , ['id' => $munkalap->id]) }}></a></td>

                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



@endsection