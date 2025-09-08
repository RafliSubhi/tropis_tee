<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function beranda()
    {
        $articles = Article::latest()->take(5)->get();
        $profile = Profile::first() ?? new Profile(); // Ensures $profile is never null
        $employees = Employee::all();
        return view('pages.beranda', compact('articles', 'profile', 'employees'));
    }

    public function menu(Request $request)
    {
        $query = Product::query();

        if ($request->has('search') && $request->input('search') != '') {
            $search = $request->input('search');
            $query->where('nama', 'like', '%' . $search . '%');
        }

        $products = $query->latest()->get();
        $profile = Profile::first() ?? new Profile();
        
        return view('pages.menu', compact('products', 'profile'));
    }

    public function testimoni()
    {
        $testimonials = Testimonial::latest()->get();
        return view('pages.testimoni', compact('testimonials'));
    }

    public function storeTestimonial(Request $request)
    {
        $request->validate([
            'nama_pengirim' => 'required|string|max:255',
            'komentar' => 'required|string|max:5000',
        ]);

        Testimonial::create($request->only('nama_pengirim', 'komentar'));

        return back()->with('success', 'Terima kasih atas testimoni Anda!');
    }

    public function profil()
    {
        $profile = Profile::first() ?? new Profile();
        $employees = Employee::all();
        return view('pages.profil', compact('profile', 'employees'));
    }

    public function kontak()
    {
        $profile = Profile::first() ?? new Profile();
        return view('pages.kontak', compact('profile'));
    }

    public function allArticles()
    {
        $articles = Article::latest()->get();
        return view('pages.articles', compact('articles'));
    }

    public function showArticle(Article $article)
    {
        $profile = Profile::first() ?? new Profile();
        return view('pages.article_detail', compact('article', 'profile'));
    }

    public function showEmployee(Employee $employee)
    {
        return view('pages.employee-detail', compact('employee'));
    }
}
