@extends('auth.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form action="{{ route('authenticate') }}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="azonosito" class="col-md-4 col-form-label text-md-end text-start">Azonosito</label>
                        <div class="col-md-6">
                          <input type="azonosito" class="form-control @error('azonosito') is-invalid @enderror" id="azonosito" name="azonosito" value="{{ old('azonosito') }}">
                            @if ($errors->has('azonosito'))
                                <span class="text-danger">{{ $errors->first('azonosito') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                        <div class="col-md-6">
                          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Login">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection