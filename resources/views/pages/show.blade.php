@extends('layouts.main')

@section('content')
<style>
  .container {
    margin-top: 100px;
    border: 1px solid white;
    color: black;
    padding: 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

}

h1 {
    font-size: 2em;
    margin-bottom: 10px;
    color: black;
}

p {
    font-size: 1.1em;
    color: black;
    line-height: 1.6;
}

img.img-fluid {
    margin-top: 20px;
    border-radius: 8px;
}

.mt-3 {
    margin-top: 20px;
}

.btn-primary {
    margin-top: 20px;
}

</style>
<div class="container">
    <h1>{{ $article->title }}</h1>
    <p><strong>Author:</strong> {{ $article->author }}</p>
    <p><strong>Publisher:</strong> {{ $article->publisher }}</p>
    <p><strong>Published At:</strong> {{ $article->created_at->format('d M Y') }}</p>
    
    @if($article->image)
        <div>
            <img src="{{ asset('storage/' . $article->image) }}" alt="Image" class="img-fluid" style="max-width: 100%; height: auto;">
        </div>
        @else
        <img src="{{ asset('img/banjir3.jpeg') }}" alt="No Image" class="img-fluid" style="max-width: 100%; height: auto;">
    @endif
    
    <div class="mt-3">
        <p>{{ $article->content }}</p>
    </div>

    <a href="{{ url('/articles') }}" class="btn btn-primary">Back to Articles</a>
</div>
@endsection