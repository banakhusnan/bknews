@extends('dashboard.layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between">
    <div class="col-md-6">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Berita</h1>
        </div>
    </div>

    <div class="col-md-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item user-select-none active">Home</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Content Row -->
<div class="row">
    <div class="card">
        <div class="card-body btn-tambah">
            @include('includes.flash')
            <!-- DataTales Example -->
            <table id="dataTable" class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Author</th>
                        <th>Dibuat</th>
                        <th>Diubah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $item)
                    <tr>
                        <td><img src="https://source.unsplash.com/75x45?{{ $item->subcategory->category->name }}"
                                width="75" height="45">
                        </td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                        <td>{{ $item->updated_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('news.show', $item->slug) }}" class="btn btn-primary me-1" title="Detail">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="judul">Judul</label>
                    <div class="mb-3">
                        <input type="text" name="title" id="title" class="form-control" id="judul"
                            aria-describedby="basic-addon3">
                        <small id="inputTitle" class="text-danger"></small>
                    </div>

                    <label for="kategori">Kategori</label>
                    <div class="mb-3">
                        <select class="custom-select" name="subcategory_id" id="kategori">
                            @foreach ($subcategory as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <label for="image">Image</label>
                    <div class="mb-3">
                        <div id="showImage">
                            {{-- Show Image before upload --}}
                        </div>
                        <input type="file" name="image" class="form-control mt-2" id="image" accept="image/*"
                            aria-describedby="basic-addon3">
                        <small id="inputImage" class="text-danger"></small>
                    </div>

                    <label for="description">Deskripsi</label>
                    <div class="mb-3">
                        <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                        <trix-editor input="description"></trix-editor>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="tambah" class="btn btn-primary">Tambah</button>
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
    let disabledInput = true;

    function validate() {
        $('#tambah').attr('disabled', true)

        $('#title').on('keydown',function(){
            if($(this)[0].selectionEnd < 255) {
                $('#inputTitle').html(``)
                disabledInput = false;
            } else {
                $('#inputTitle').html(`Judul melebihi 255 karakter`)
                disabledInput = true;
            }
        });
    }

    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').html(`<img src="${e.target.result}" style="width: 200px" id="tampil">`);
            }
            reader.readAsDataURL(input.files[0]);
        }
        
        // Validate
        if(input.files[0].size < 2097152) {
            $('#inputImage').html(``)
            disabledInput = false;
        } else {
            $('#inputImage').html(`Ukuran gambar lebih dari 2 Mb`)
            disabledInput = true;
        }
    }
    $(document).ready(function(){
        validate()
        $("#image").change(function(){
            $('#showImage').html(`<div class="spinner-border text-dark" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>`)
            setTimeout(() => {
                readURL(this)
                disabledInput == false ? $('#tambah').attr('disabled', false) : $('#tambah').attr('disabled', true)
            }, 2000);
        });
    });
</script>
@endsection