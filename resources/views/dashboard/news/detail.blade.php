@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div id="body">
    {{-- {{ dd($news) }} --}}
    <div class="d-sm-flex align-items-center justify-content-between">
        <div class="col-md-6">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Detail Berita</h1>
            </div>
        </div>

        <div class="col-md-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb user-select-none">
                    <li class="breadcrumb-item"><a href="{{ route('news.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Berita</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="card mb-3">
            <div class="body-card p-4">
                <div class="row">
                    <div class="col-md-10 col-sm-10 col-lg-10">
                        <h6 class="text-muted user-select-none">{{ $news->subcategory->name }} / {{
                            $news->subcategory->category->name }}
                        </h6>
                        <h2 id="title"><b>{{ $news->title }}</b></h2>
                        <h6 class="mb-3 text-muted">BK News - telah diupdate {{ date('d/m/Y, H:i',
                            strtotime($news->updated_at)) }} WIB
                        </h6>
                    </div>
                    <div class="col-sm col-md col-lg mt-3 me-3">
                        <div class="btn-group dropleft float-end">
                            <button type="button" class="border-0 bg-white text-secondary" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                <!-- Button trigger modal -->
                                <button type="button" class="dropdown-item" data-toggle="modal"
                                    data-target="#staticBackdrop">
                                    Ubah
                                </button>
                                <form action="{{ route('news.destroy', $news->slug) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="dropdown-item">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        @if ($news->image)
                        <img src="{{ asset('storage/'.$news->image) }}" style="max-height: 350px; overflow:hidden"
                            class="img-fluid rounded">
                        @else
                        <img src="{{ asset('img/not-found.jpg') }}" style="max-height: 350px; overflow:hidden"
                            title="Image Not Found">
                        @endif
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md col-lg">
                        {!! $news->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('news.update', $news->slug) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <label for="judul">Judul</label>
                    <div class="input-group mb-3">
                        <input type="text" name="title" id="title" class="form-control" id="judul"
                            value="{{ $news->title }}" aria-describedby="basic-addon3">
                    </div>

                    <label for="kategori">Kategori</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" name="subcategory_id" id="inputGroupSelect01">
                            @foreach ($subcategory as $category)
                            @if ($news->subcategory_id == $category->id)
                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <label for="image">Image</label>
                    <div class="mb-3">
                        <div id="showImage">
                            @if ($news->image)
                            <img src="{{ asset('storage/'.$news->image) }}" width="100px">
                            @endif
                        </div>
                        <input type="file" name="image" class="form-control mt-2" id="image" accept="image/*"
                            aria-describedby="basic-addon3">
                    </div>

                    <label for="description">Deskripsi</label>
                    <div class="mb-3">
                        <input id="description" value="{{ $news->description }}" type="hidden" name="description"
                            value="{{ old('description') }}">
                        <trix-editor input="description"></trix-editor>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Ubah Berita</button>
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
    $("#image").change(function(){
        $('#showImage').html(`<div class="spinner-border text-dark" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>`)
        setTimeout(() => {
            readURL(this);
        }, 2000);
    });
</script>
@endsection