@extends('auth.main')

@section('card-body')

<div class="mb-3 user-select-none">
    <img src="{{ url('img/bk-media.png') }}" width="100px" class="img-thumbnail border-0" alt="">
    <h3 class="fw-bold">Masuk BK Media</h3>
    <p>Login dengan BK Media untuk menggunakan layanan-layanan dari BK Media.</p>

    <small>Masuk melalui : </small>
    <button type="button" class="btn btn-primary mx-1 rounded-circle" title="Facebook">
        <i class="fa-brands fa-facebook-f"></i>
    </button>

    <button type="button" class="btn btn-danger mx-1 rounded-circle" title="Google">
        <i class="fab fa-google"></i>
    </button>
</div>

<form action="{{ route('login') }}" method="post">
    @csrf
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput" class="text-muted">Email address</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword" class="text-muted">Password</label>
    </div>

    <!-- Checkbox -->
    <div class="form-check d-flex justify-content-start my-3">
        <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
        <label class="form-check-label ms-2" for="form1Example3">Remember password </label>
    </div>

    <button class="btn btn-primary w-100" type="submit">Masuk</button>

    <p class="mt-2">
        <a href="{{ route('password.request') }}" class="text-decoration-none">Lupa Password?</a>
    </p>
</form>


<p class="mt-3">
    Belum punya akun BK Media? <a href="{{ route('register') }}" class="text-decoration-none">Buat disini</a>
</p>
@endsection