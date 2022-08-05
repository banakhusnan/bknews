@extends('dashboard.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">News</h1>
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

<div class="row">
    @foreach ($news as $item)
    <div class="col-md-4 mb-3">
        <a href="" class="text-decoration-none">
            <div class="card overflow-hidden">
                <img src="https://source.unsplash.com/558x300?{{ $item->subcategory->category->name }}"
                    class="card-img-news rounded-bottom-0" alt="...">
                <div class="card-body-news pb-0">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="text-muted">{{ $item->user->name }} | {{ $item->subcategory->category->name }}</p>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
@endsection