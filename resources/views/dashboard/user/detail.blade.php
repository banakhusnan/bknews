@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="row justify-content-between">
    <div class="col-md-6">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Pengguna</h1>
        </div>
    </div>

    <div class="col-md-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 d-flex">
                    <img src="https://source.unsplash.com/Mv9hjnEUHR4/100x100" width="100" height="100"
                        class="rounded-circle me-3">
                    <div class="d-block py-3">
                        <h4 class="mb-0 fw-bold">{{ ucfirst($user->name) }}</h4>
                        <h5 class="my-0">{{ $user->email }}</h5>
                        <h6 class="my-0">{{ ucfirst($user->role) }}</h6>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <h5 for="ttl">Tempat Tanggal Lahir</h5>
                <p id="ttl">Semarang, 26 Juli 2002</p>
            </div>
        </div>
    </div>
</div>
@endsection