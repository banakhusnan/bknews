@include('layouts.header')

<div class="container">
    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="text-center">
            <h1 class="display-1 fw-bold">404</h1>
            <p class="fs-3"> <span class="text-danger">Opps!</span> Pencarian "{{ request('search') }}" tidak ditemukan.
            </p>
            <p class="lead">
                Pencarian tidak ditemukan.
            </p>
        </div>
    </div>
</div>

@include('layouts.footer')