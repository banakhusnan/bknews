<div class="container-fluid bg-primary-gradient text-white d-flex align-items-between justify-content-center">
    <div class="container my-custom1">
        <div class="row">
            <div class="col-md-6">
                <h1>Hi {{ explode(" ", auth()->user()->name)[0] }}, Adukan Suara Anda Segera!</h1>
                <p>Suaramu adalah awal dari perubahan.</p>
                <a href="#aduan" class="btn btn-primary">Adukan Suara</a>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('img/demo_black.png') }}" width="500px" class=" float-end">
            </div>
        </div>
    </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#96c1ff" fill-opacity="1"
        d="M0,192L48,176C96,160,192,128,288,106.7C384,85,480,75,576,90.7C672,107,768,149,864,181.3C960,213,1056,235,1152,234.7C1248,235,1344,213,1392,202.7L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
    </path>
</svg>