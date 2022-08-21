@extends('auth.main')

@section('card-body')
<div class="mb-4 user-select-none">
    <img src="{{ url('img/bk-media.png') }}" width="100px" class="img-thumbnail border-0" alt="">
    <h3 class="fw-bold">Registrasi Akun BK Media</h3>
    <p>Buat akun BK Media, agar bisa mengakses layanan-layanan BK Media</p>
</div>

<div id="form">
    <form action="{{ route('register') }}" method="POST">
        @csrf


        <div class="input-group mb-3">
            <label class="text-start me-2 fw-bold">Registrasi sebagai :</label>
            <div class="input-group">
                <input type="radio" name="role" id="mahasiswa" class="me-2" value="mahasiswa">
                <label for="mahasiswa">Mahasiswa</label>
                <input type="radio" name="role" class="mx-2" id="author" value="author">
                <label for="author">Author/Penulis</label>
            </div>
        </div>

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
        <div class="form-floating mb-1">
            <input type="text" class="form-control" id="floatingInput" placeholder="123456" name="no_induk">
            <label for="floatingInput" class="text-muted">Nomor Induk <label id="label">Mahasiswa</label></label>
            <p class="text-start mb-0 user-select-none">
                <small class="text-primary" id="labelNotif">Masukan no induk menggunakan (.)</small>
            </p>
            @if ($error = $errors->get('no_induk'))
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
            <input type="password" class="form-control" id="floatingInput" placeholder="Password" name="password">
            <label for="floatingInput" class="text-muted">Password</label>
            @if ($error = $errors->get('password'))
            <small class="text-danger float-start">
                @foreach ($error as $e)
                {{ $e }}
                @endforeach
            </small>
            @endif
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingInput" placeholder="Konfirmasi Password"
                name="password_confirmation">
            <label for="floatingInput" class="text-muted">Konfirmasi Password</label>
            @if ($error = $errors->get('password_confirmation'))
            <small class="text-danger float-start">
                @foreach ($error as $e)
                {{ $e }}
                @endforeach
            </small>
            @endif
        </div>

        <button class="btn btn-primary w-100 my-3" id="registrasi" type="submit">Registrasi</button>
    </form>
</div>
<a href="{{ route('login') }}" class="text-decoration-none">Kembali Ke Login</a>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@endsection