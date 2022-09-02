@extends('auth.main')

@section('card-body')
<img src="{{ url('img/bk-media.png') }}" width="100px" class="img-thumbnail border-0" alt="">
<h3 class="fw-bold mb-3">Reset Password BK Media</h3>

<form action="{{ route('password.update') }}" method="post">
    @csrf
    <input type="hidden" name="token" value="{{ request()->token }}">
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput" class="text-muted">Email address</label>
    </div>
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

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
    <div class="form-floating mb-3">
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

    <button class="btn btn-primary w-100" type="submit">Reset Password</button>
</form>
@endsection