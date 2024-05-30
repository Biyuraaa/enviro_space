<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class DashboardController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $articles = Article::all();
            return view('dashboard.index', compact('articles'));
        } else {
            return view('home');
        }
    }
}
