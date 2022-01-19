@extends("layouts.main")

@section("content")
<h1 class="mb-3">{{ $pageTitle }}</h1>

@if ($news->count())

<div class="card mb-3">
    <img src="https://source.unsplash.com/1200x200?{{ $news[0]->category->en_name }}" class="card-img-top" alt="{{ $news[0]->category->name }}">
    <div class="card-body text-center">
      <h3 class="card-title">{{ $news[0]->title }}</h3>

      <p class="text-muted">Category : <a class="text-decoration-none" href="/categories/{{ $news[0]->category->slug }}">{{ $news[0]->category->name }}</a> | Author : <a class="text-decoration-none" href="/authors/{{ $news[0]->author->username }}">{{ $news[0]->author->name }}</a></p>
      <p class="card-text">{{ $news[0]->excerpt }}</p>

      <p class="card-text"><small class="text-muted">{{ $news[0]->created_at->diffForHumans() }}</small></p>

      <a href="/{{ $news[0]->slug }}" class="text-decoration-none btn btn-primary">Read More...</a>
    </div>
</div>

@else
    <p class="text-center fs-4">No Post Found</p>
@endif

<div class="row">
    @foreach ($news->skip(1) as $singleNews)
        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="position-absolute px-3 py-1 bg-dark">
                    <a class="text-decoration-none text-white" href="/categories/{{ $singleNews->category->slug }}">{{ $singleNews->category->name }}</a>
                </div>

                <img src="https://source.unsplash.com/300x200?{{ $singleNews->category->en_name }}" class="card-img-top" alt="{{ $singleNews->category->en_name }}">

                <div class="card-body">
                <h5 class="card-title"><a href="/{{ $singleNews->slug }}" class="text-decoration-none">{{ $singleNews->title }}</a></h5>
                <small>
                    <p class="text-muted mb-2">Author : <a class="text-decoration-none" href="/authors/{{ $singleNews->author->username }}">{{ $singleNews->author->name }}</a> | {{ $singleNews->created_at->diffForHumans() }}</p>
                </small>
                <p class="card-text">{{ $singleNews->excerpt }}</p>
                <a href="/{{ $singleNews->slug }}" class="text-decoration-none btn btn-primary">Read More...</a>
                </div>
            </div>
        </div>
    @endforeach
</div>


    {{-- <article class="mb-2 border-bottom pb-4">
        <h2><a href="/{{ $singleNews->slug }}" class="text-decoration-none">{{ $singleNews->title }}</a></h2>

        <p>Category : <a class="text-decoration-none" href="/categories/{{ $singleNews->category->slug }}">{{ $singleNews->category->name }}</a> | Author : <a class="text-decoration-none" href="/authors/{{ $singleNews->author->username }}">{{ $singleNews->author->name }}</a> | {{ $singleNews->created_at->diffForHumans() }}</p>

        <p>{{ $singleNews->excerpt }}</p>

        <a href="/{{ $singleNews->slug }}" class="text-decoration-none btn btn-primary">Read More...</a>
    </article> --}}

@endsection
