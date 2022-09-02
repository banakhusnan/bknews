@extends('auth.main')

@section('card-body')
<img src="{{ url('img/bk-media.png') }}" width="100px" class="img-thumbnail border-0" alt="">
<h3 class="fw-bold mb-3">Lupa Password BK Media</h3>

<form action="{{ route('password.email') }}" method="post">
    @csrf
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput" class="text-muted">Email address</label>
    </div>
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <button class="btn btn-primary w-100" type="submit">Konfirmasi Email</button>
</form>
@endsection