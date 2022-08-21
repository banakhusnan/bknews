@extends('dashboard.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row p-3">
            <div class="col-md-4">
                @if ($user->image)
                <img src="{{ asset('storage/'.$user->image) }}" id="image"
                    class="img-profile bg-white rounded-circle p-1" height="250x" width="250px">
                @else
                <img src="{{ asset('img/user.png') }}" id="image" class="img-profile bg-white rounded-circle p-1"
                    width="250">
                @endif
            </div>
            <div class="col-md-8 py-3">
                <div class="btn-group dropleft float-end">
                    <button type="button" class="border-0 bg-white text-secondary" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                    <div class="dropdown-menu">
                        <!-- Button trigger modal -->
                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal">
                            Ubah Profile
                        </button>
                    </div>
                </div>

                <h1 class="fw-bold">{{ $user->name }}</h1>
                <h4 class="text-primary">{{ ucfirst($user->role) }}</h4>
                <h6 class="mt-3">E-mail : {{ $user->email }}</h6>
                <h6>No Induk Penulis : {{ $user->no_induk }}</h6>
                <hr>
                <div class="d-block">
                    <h6 class="text-success">Total Berita</h6>
                    <h3 class="fw-bold text-danger">{{ count($news) }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user-profile-information.update') }}" method="post"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf

                    <div class="mb-3">
                        <div id="showImage">
                            @if ($user->image)
                            <img src="{{ asset('storage/'.$user->image) }}" style="width: 100px">
                            @else
                            <img src="{{ asset('img/user.png') }}" class="img-profile bg-white rounded-circle p-1"
                                width="100">
                            @endif
                        </div>
                        <input type="file" name="image" class="form-control mt-2" id="imageUpdate" accept="image/*"
                            aria-describedby="basic-addon3">
                    </div>

                    <label for="name">Nama</label>
                    <div class="mb-3">
                        <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control"
                            aria-describedby="basic-addon3">
                        <small id="inputName" class="text-danger"></small>
                    </div>

                    <label for="author">Author</label>
                    <div class="mb-3">
                        <input type="text" readonly value="{{ $user->role }}" class="form-control"
                            aria-describedby="basic-addon3">
                    </div>

                    <label for="email">Email</label>
                    <div class="mb-3">
                        <input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control"
                            aria-describedby="basic-addon3">
                    </div>

                    <label for="email">No Induk</label>
                    <div class="mb-3">
                        <input type="text" name="no_induk" id="no_induk" value="{{ $user->no_induk }}"
                            class="form-control" aria-describedby="basic-addon3">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="ubah" class="btn btn-primary">Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>

{{-- Javascript --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>

<script>
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').html(`<img src="${e.target.result}" style="width: 200px" id="tampil">`);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpdate").change(function(){
        $('#showImage').html(`<div class="spinner-border text-dark" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>`)
        setTimeout(() => {
            readURL(this);
        }, 2000);
    });
</script>
@endsection