@extends('layouts.main')

@section('title', $news->judul)
@section('container')
<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="col-md col-lg col-sm">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb fw-bold">
                    <li class="breadcrumb-item"><a href="/" class="link-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="/news/{{ $news->subkategori->kategori->slug }}"
                            class="link-dark">{{
                            $news->subkategori->kategori->nama
                            }}</a></li>
                    <li class="breadcrumb-item"><a
                            href="/news/{{ $news->subkategori->kategori->slug }}?subcategory={{ $news->subkategori->slug }}"
                            class="link-dark">{{
                            $news->subkategori->nama
                            }}</a></li>
                </ol>
            </nav>
            <h2><b>{{ $news->title }}</b></h2>
            <h6 class="mb-3 text-muted">BK News - {{ date('d/m/Y, H:i', strtotime($news->created_at)) }} WIB
            </h6>

            <figure class="figure mb-3">
                @if ($news->image)
                <img src="{{ asset('storage/'.$news->image) }}" class="img-fluid rounded">
                @else
                <img src="{{ asset('img/not-found.jpg') }}" class="img-fluid rounded">
                @endif
                <figcaption class="figure-caption mt-1">A caption for the above image.</figcaption>
            </figure>
        </div>
    </div>
    <div class="row justify-content-between">
        {{-- Description for detail --}}
        <div class="col-md-7 col-lg-7 col-sm-7">
            <h5 class="fs-6">Penulis : <a href="#" class="text-decoration-none">{{ $news->author->user->nama }}</a></h5>
            <p>{!! $news->deskripsi !!}</p>
        </div>

        {{-- Other News --}}
        <div class="col-md-4 col-lg-4 col-sm-4">
            @foreach ($otherNews as $other_news)
            @if ($news->slug != $other_news->slug)
            <a href="/read/{{ $other_news->slug }}" class="text-decoration-none text-black">
                <div class="card-news mb-3 border-0 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://source.unsplash.com/1200x1200?{{ $other_news->subkategori->kategori->nama }}"
                                class="img-fluid-news rounded" alt="{{ $other_news->subkategori->kategori->nama }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body pt-0">
                                <h5 class="card-title">{{ $other_news->judul }}</h5>
                                <p class="card-text">
                                    <small class="text-muted">
                                        {{ $other_news->updated_at->diffForHumans() }}
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection