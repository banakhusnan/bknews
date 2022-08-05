@extends('auth.main')

@section('title', 'Verifikasi Email')
@section('card-body')
@if ($message = session('resend'))
<div class="alert alert-success" role="alert">
    {{ $message }}
</div>
@endif

<div class="text-start">
    <h1>{{ __('Verifikasi Email') }}</h1>
    {{ __('Demi keamanan akun anda, diharap verifikasi email anda terlebih dahulu. Cek Email kamu!') }}
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-link m-0 p-0">{{ __('Klik disini jika belum menerima email dari kami')
            }}</button>
    </form>
</div>
@endsection