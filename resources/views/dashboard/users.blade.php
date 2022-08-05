@extends('dashboard.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Users</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
        </button>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Akun</th>
                <th scope="col">Role</th>
                <th scope="col">Email</th>
                <th scope="col">Status Email</th>
                <th scope="col">Since</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->email_verified_at != null ? 'Verified' : 'Not Verified' }}</td>
                <td>{{ $user->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection