@extends('layouts.main')

@section('title', $title[1] ? $title[0] .' | '. $title[1]->name : $title[0])
@section('container')
<div class="container">
    {{-- Nav --}}
    <div class="row my-4">
        <nav class="nav p-1 align-items-center">
            <a class="nav-link fs-4 disabled user-select-none border-end border-danger text-dark fw-bold-500"
                aria-current="page" href="#">{{ $title[0] }}</a>
            @foreach ($nav as $subcategory)
            <a class="nav-link fs-6 link-dark fw-bold ms-2 {{ request('subcategory') == $subcategory->slug ? 'bg-bkn text-white rounded' : '' }}"
                aria-current="page"
                href="/news/{{ $subcategory->category->slug }}?subcategory={{ $subcategory->slug }}">
                {{ $subcategory->name }}
            </a>
            @endforeach
        </nav>
    </div>

    {{-- News Categories --}}
    <div class="row {{ request('subcategory') ? 'mt-4' : '' }}">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @foreach ($category as $news)
                <div class="col-lg-6">
                    <!-- Blog post-->
                    <a href="/read/{{ $news->slug }}" class="text-decoration-none text-black">
                        <div class="card-news mb-4 border-0">
                            <div class="overflow-hidden">
                                <img class="card-img-news"
                                    src="https://source.unsplash.com/555x300?{{ $news->subcategory->category->name }}"
                                    alt="{{ $news->subcategory->category->name }}" />
                            </div>
                            <div class="card-body-news p-0 mt-2">
                                <h2 class="card-title h4">{{ $news->title }}</h2>
                                <div class="small text-muted">
                                    <a href="/news/{{ $news->subcategory->category->slug }}?subcategory={{ $news->subcategory->slug }}"
                                        class="text-danger text-decoration-none">{{ $news->subcategory->name
                                        }}</a> .
                                    {{ date('F d, Y', strtotime($news->created_at)) }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">Web Design</a></li>
                                <li><a href="#!">HTML</a></li>
                                <li><a href="#!">Freebies</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">JavaScript</a></li>
                                <li><a href="#!">CSS</a></li>
                                <li><a href="#!">Tutorials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">Side Widget</div>
                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to
                    use, and feature the Bootstrap 5 card component!</div>
            </div>
        </div>
    </div>
</div>
@endsection