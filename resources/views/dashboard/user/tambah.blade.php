@extends('dashboard.layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between">
    <div class="col-md-6">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Pengguna</h1>
        </div>
    </div>

    <div class="col-md-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Pengguna</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <label for="nama">Nama Lengkap</label>
                <div class="input-group mb-3">
                    <input type="text" name="name" placeholder="Nama Lengkap" class="form-control" id="nama"
                        aria-describedby="basic-addon3">
                </div>

                <label for="email">Email</label>
                <div class="input-group mb-3">
                    <input type="email" name="email" placeholder="email@example.com" class="form-control" id="email"
                        aria-describedby="basic-addon3">
                </div>

                <label for="posisi">Posisi</label>
                <div class="input-group mb-3">
                    <select class="form-select" name="role" id="posisi" aria-label="Example select with button addon">
                        <option value="mahasiswa">Mahasiswa</option>
                        <option value="author">Author</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <label for="image">Password</label>
                <div class="input-group mb-3">
                    <input type="password" name="password" placeholder="Password" class="form-control" id="image"
                        aria-describedby="basic-addon3">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Buat</button>
                <a href="{{ route('news.index') }}" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection