@extends('layouts.template')

@section('content')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container">
    <h1>{{ $article->title }}</h1>
    <p><strong>Author:</strong> {{ $article->author }}</p>
    <p><strong>Publisher:</strong> {{ $article->publisher }}</p>
    <p><strong>Published At:</strong> {{ $article->created_at }}</p>
    
    @if($article->image)
        <div>
            <img src="{{ asset('storage/' . $article->image) }}" alt="Image" width="300">
        </div>
    @endif
    
    <div>
        <p>{{ $article->content }}</p>
    </div>

    <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to Articles</a>
</div>
@endsection
