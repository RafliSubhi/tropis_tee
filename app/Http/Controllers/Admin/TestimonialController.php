<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function toggleLike(Testimonial $testimonial)
    {
        $testimonial->disukai_admin = !$testimonial->disukai_admin;
        $testimonial->save();

        return redirect()->route('admin.testimonials.index')->with('success', 'Status testimoni berhasil diubah.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}