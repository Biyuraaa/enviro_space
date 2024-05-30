@extends('layouts.main')


@section('content')
<style>
    .container {
    margin-top: 20px;
}

.article-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.article-item {
    display: flex;
    flex-direction: row;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
}

.article-image {
    margin-right: 20px;
}

.article-image img {
    max-width: 100px;
    height: auto;
    border-radius: 8px;
}

.article-content {
    flex: 1;
}

.article-content h2 {
    margin-top: 0;
    font-size: 1.5em;
    color: #333;
}

.article-content p {
    font-size: 1em;
    color: #666;
    line-height: 1.6;
}

.article-content .btn {
    margin-top: 10px;
}

hr {
    border: none;
    border-top: 1px solid #ddd;
    margin: 20px 0;
}

</style>
<div class="container" style="margin-top: 100px">
    <h1>Daftar Artikel Ekosistem</h1>
    <div class="article-list">
        @foreach ($articles as $article)
            <div class="article-item">
                <div class="article-image">
                    @if ($article->image)
                    <img src="{{ asset('img/' . $article->image) }}" alt="Image" width="100">
                    @else
                    <img src="{{ asset('img/banjir3.jpeg') }}" alt="No Image" width="100">
                    @endif
                </div>
                <div class="article-content">
                    <h2>{{ $article->title }}</h2>
                    <p>{{ $article->content }}</p>
                    <a href="{{ route('articles.show', $article) }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
</div>
@endsection
