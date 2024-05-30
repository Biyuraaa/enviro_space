<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $request->title . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/'), $filename);

            // Update $validatedData with the image filename
            $validatedData['image'] = $filename;
        }

        Article::create($validatedData);

        return redirect()->route('dashboard');
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
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $request->title . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/'), $filename);

            // Update $validatedData with the image filename
            $validatedData['image'] = $filename;
        }

        $article->update($validatedData);

        return redirect()->route('dashboard');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        DB::beginTransaction();
        try {
            if ($article->image && file_exists(public_path('assets/images/' . $article->image))) {
                unlink(public_path('img/' . $article->image));
            }
            $article->delete();
            DB::commit();

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            DB::rollback();
            // handle the exception here, maybe return with an error message
        }
    }
}
