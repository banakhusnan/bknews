@extends('pengaduan.layouts.main')

@section('container')
<div class="container">
    <div class="row mb-6">
        <h1 class="text-center fw-bold mb-5">Suara Mahasiswa</h1>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title mb-0">Card title</h5>
                    <span class="badge bg-danger">Kemahasiswaan</span> |
                    <span class="badge bg-dark">ABhf</span>

                    <p class="card-text my-2">Some quick example text to build on the card title and make up the
                        bulk of
                        the card's content.
                    </p>

                    <small class="text-muted">Pada 13 Mar 2022 . Oleh Anonymous</small><br>
                    <a href="#" class="badge bg-primary text-decoration-none">Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title mb-0">Card title</h5>
                    <span class="badge bg-danger">Kemahasiswaan</span> |
                    <span class="badge bg-dark">ABhf</span>

                    <p class="card-text my-2">Some quick example text to build on the card title and make up the
                        bulk of
                        the card's content.
                    </p>

                    <small class="text-muted">Pada 13 Mar 2022 . Oleh Anonymous</small><br>
                    <a href="#" class="badge bg-primary text-decoration-none">Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title mb-0">Card title</h5>
                    <span class="badge bg-danger">Kemahasiswaan</span> |
                    <span class="badge bg-dark">ABhf</span>

                    <p class="card-text my-2">Some quick example text to build on the card title and make up the
                        bulk of
                        the card's content.
                    </p>

                    <small class="text-muted">Pada 13 Mar 2022 . Oleh Anonymous</small><br>
                    <a href="#" class="badge bg-primary text-decoration-none">Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="aduan" class="container-fluid bg-primary-gradient">
    <div class="container py-5">
        <div class="row">
            <h3 class="fw-bold text-center text-white">Ayo adukan suaramu segera!</h3>
        </div>

        <div class="col-md text-white">
            <form action="" method="post">
                <label for="basic-url" class="form-label">Judul Aduan</label>
                <div class="input-group mb-3">
                    <input type="text" placeholder="" class="form-control" id="basic-url"
                        aria-describedby="basic-addon3">
                </div>

                <label for="basic-url" class="form-label">Kategori</label>
                <div class="input-group mb-3">
                    <select class="form-select" id="inputGroupSelect02">
                        <option value="perkuliahan">Perkuliahan</option>
                        <option value="layanan">Layanan</option>
                    </select>
                </div>

                <label for="basic-url" class="form-label">Kritik</label>
                <div class="input-group mb-3">
                    <textarea type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                        cols="12"></textarea>
                </div>

                <label for="basic-url" class="form-label">Saran</label>
                <div class="input-group mb-3">
                    <textarea type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                        cols="12"></textarea>
                </div>

                <label for="basic-url" class="form-label">Harapan</label>
                <div class="input-group mb-3">
                    <textarea type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                        cols="12"></textarea>
                </div>

                <button class="btn btn-dark" type="submit">Kirim Aduan</button>
            </form>
        </div>
    </div>
</div>
@endsection