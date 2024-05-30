@extends('auth.layouts')

@section('content')

@if (Auth::user()->role == 'munkafelvevo')
    <script type="text/javascript">
        window.location.href = "{{ url('/dashboard') }}";
    </script>
@endif



@endsection