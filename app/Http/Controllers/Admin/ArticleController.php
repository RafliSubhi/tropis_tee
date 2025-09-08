<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:50',
            'berita_lengkap' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:51200',
        ]);

        $path = $request->file('image')->store('articles', 'public');

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path,
            'berita_lengkap' => $request->berita_lengkap,
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(Article $article)
    {
        // Not used for this project
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:50',
            'berita_lengkap' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:51200',
        ]);

        $data = $request->only('title', 'content', 'berita_lengkap');

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($article->image);
            $path = $request->file('image')->store('articles', 'public');
            $data['image'] = $path;
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        Storage::disk('public')->delete($article->image);
        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Berita berhasil dihapus.');
    }
}