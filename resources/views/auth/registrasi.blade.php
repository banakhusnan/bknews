@extends('auth.main')

@section('card-body')
<div class="mb-4 user-select-none">
    <img src="{{ url('img/bk-media.png') }}" width="100px" class="img-thumbnail border-0" alt="">
    <h3 class="fw-bold">Registrasi Akun BK Media</h3>
    <p>Buat akun BK Media, agar bisa mengakses layanan-layanan BK Media</p>
</div>

<form action="{{ route('register') }}" method="POST">
    @csrf

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Nama Lengkap" name="name">
        <label for="floatingInput" class="text-muted">Nama Lengkap</label>
        @if ($error = $errors->get('name'))
        <small class="text-danger float-start mb-1">
            @foreach ($error as $e)
            {{ $e }}
            @endforeach
        </small>
        @endif
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput" class="text-muted">Email</label>
        @if ($error = $errors->get('email'))
        <small class="text-danger float-start mb-1">
            @foreach ($error as $e)
            {{ $e }}
            @endforeach
        </small>
        @endif
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword" class="text-muted">Password</label>
        @if ($error = $errors->get('password'))
        <small class="text-danger float-start">
            @foreach ($error as $e)
            {{ $e }}
            @endforeach
        </small>
        @endif
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="password-confirm" placeholder="Password"
            name="password_confirmation">
        <label for="floatingPassword" class="text-muted">Konfirmasi Password</label>
        @if ($error = $errors->get('password_confirmation'))
        <small class="text-danger float-start">
            @foreach ($error as $e)
            {{ $e }}
            @endforeach
        </small>
        @endif
    </div>

    <button class="btn btn-primary w-100 my-3" type="submit">Registrasi</button>
</form>

<a href="{{ route('login') }}" class="text-decoration-none">Kembali Ke Login</a>
@endsection