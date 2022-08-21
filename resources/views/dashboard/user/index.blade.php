@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="row justify-content-between">
    <div class="col-md-6">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengguna</h1>
        </div>
    </div>

    <div class="col-md-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="#">Home</a></li>
            </ol>
        </nav>
    </div>
</div>

<!-- Content Row -->
<div class="row">
    <div class="card">
        <div class="card-body">
            @include('includes.flash')
            <!-- DataTales Example -->
            <table id="dataTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Posisi</th>
                        <th>Email</th>
                        <th>Email Status</th>
                        <th>Tanggal Pembuatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->email_verified_at ? 'Verified' : 'Not Verify' }}</td>
                        <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
                        <td>
                            <a href="{{ route('users.show', $user->email) }}" class="btn btn-primary me-1"
                                title="Detail">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="" class="btn btn-danger" title="Hapus">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection