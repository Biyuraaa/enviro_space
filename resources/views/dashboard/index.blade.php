@extends('layouts.template')

@section('content')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
  .container {
    margin-top: 60px;
}

.article-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.article-table th, .article-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.article-table th {
    background-color: #6f872d;
    font-weight: bold;
}

.article-table tr:nth-child(even) {
    background-color: #fff;
    color: black
}

.article-table tr:hover {
    background-color: #f1f1f1;
}

.article-table img {
    max-width: 100px;
    height: auto;
}

</style>
<div class="container">
    <h1>Articles</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary my-3">Create Article</a>
    <table class="article-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->content }}</td>
                    <td>
                        @if($article->image)
                            <img src="{{ asset('img/' . $article->image) }}" alt="Image" width="100">
                            @else
                            <img src="{{ asset('img/banjir3.jpeg') }}" alt="No Image" width="100">
                        @endif
                    </td>
                    <td>{{ $article->author }}</td>
                    <td>{{ $article->publisher }}</td>
                    <td>{{ $article->created_at }}</td>
                    <td>
                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info text-white">Show</a>
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary text-white">Edit</a>
                        <form action="{{ route('articles.destroy', $article->id) }}" class="btn btn-danger text-white" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="bg-transparent text-white">Delete</button>
                      </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
