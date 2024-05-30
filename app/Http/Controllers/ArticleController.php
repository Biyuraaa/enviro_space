<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('pages.articles', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $validatedData = $request->validated();

        $image = $request->file('image');
        if ($request->hasFile('image')) {
            $filename = Str::slug($request->content) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/img', $filename);
            $validatedData['image'] = $filename;
        }

        Article::create($validatedData);



        return redirect()->route('dashboard');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        if (Auth::user()->role == 'admin') {
            return view('dashboard.show', compact('article'));
        } else {
            return view('pages.show', compact('article'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('dashboard.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image') || $validatedData['title'] != $article->title) {
            $image = $request->hasFile('image') ? $request->file('image') : $article->image;
            $filename = Str::slug($validatedData['title']) . '.' . pathinfo($image, PATHINFO_EXTENSION);

            // Delete old image
            if ($article->image) {
                Storage::delete('public/img/' . $article->image);
            }

            // Store new image
            if ($request->hasFile('image')) {
                $image->storeAs('public/img', $filename);
            } else {
                Storage::move('public/img/' . $article->image, 'public/img/' . $filename);
            }

            $validatedData['image'] = $filename;
        }

        $article->update($validatedData);

        return redirect()->route('dashboard')->with('status', 'Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::delete('public/img/' . $article->image);
        }

        $article->delete();

        return redirect()->route('dashboard')->with('status', 'Article deleted successfully!');
    }
}
