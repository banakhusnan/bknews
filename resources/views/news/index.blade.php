@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <div class="row mb-4 g-0 justify-content-center">
        <!-- Featured blog post-->
        @foreach ($data as $key => $news)
        @if ($key < 2) <div class="col-md-6">
            <a href="/read/{{ $news->slug }}">
                <div class="card overflow-hidden">
                    <img src="https://source.unsplash.com/558x300?{{ $news->subcategory->category->name }}"
                        class="card-img-news" alt="Hot News">
                    <div class="card-img-overlay rounded-0 rounded-bottom text-white"
                        style="background-color: rgba(0, 0, 0, 0.5)">
                        <h5 class="card-title">{{ $news->title }}</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p class="card-text">Last updated at {{ $news->updated_at->diffForHumans() }}</p>
                    </div>
                </div>
            </a>
    </div>
    @endif
    @endforeach
</div>
<div class="row">
    <!-- Blog entries-->
    <div class="col-lg-8">
        <!-- Nested row for non-featured blog posts-->
        <div class="row">
            @foreach ($data as $key => $news)
            @if ($key >= 2 && $key < 6) <div class="col-lg-6">
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
                                    class="link-danger text-decoration-none">{{
                                    $news->subcategory->name }}</a> .
                                {{ date('F d, Y', strtotime($news->created_at)) }}
                            </div>
                        </div>
                    </div>
                </a>
        </div>
        @endif
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
    <div class="card mb-4" style="height: 500px">
        <div class="card-header">Side Widget</div>
        <div class="card-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur vitae laboriosam
            voluptatem eaque, repudiandae atque modi consectetur! Omnis, at ullam odio quis cum vitae autem quos sed
            sequi modi voluptatibus quia, eius magnam, in earum pariatur ipsum labore. Libero qui assumenda beatae ullam
            doloremque facilis! Possimus nihil voluptatum ea aspernatur ex illum recusandae animi dolorum aperiam
            nostrum perferendis fuga totam repudiandae sint quae molestias officiis voluptate, tenetur laboriosam sed
            optio. Beatae velit quibusdam provident dolorum! Molestiae odit vero facilis iusto, fuga libero tempore
            dolorem excepturi repellendus, aliquam alias adipisci corrupti.</div>
    </div>
</div>
</div>

<div class="row">
    @foreach ($data as $key => $news)
    @if ($key >= 6)
    <div class="col-md-3">
        <!-- Blog post-->
        <a href="/read/{{ $news->slug }}" class="text-decoration-none text-black">
            <div class="card-news mb-4 border">
                <div class="overflow-hidden">
                    <img class="card-img-news"
                        src="https://source.unsplash.com/555x300?{{ $news->subcategory->category->name }}"
                        alt="{{ $news->subcategory->category->name }}" />
                </div>
                <div class="card-body-news">
                    <h2 class="card-title h4">{{ $news->title }}</h2>
                    <div class="small text-muted">
                        <a href="/news/{{ $news->subcategory->category->slug }}?subcategory={{ $news->subcategory->slug }}"
                            class="link-danger text-decoration-none">{{
                            $news->subcategory->name }}</a> .
                        {{ date('F d, Y', strtotime($news->created_at)) }}
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
    @endforeach
</div>

{{ $data->links() }}
</div>
@endsection