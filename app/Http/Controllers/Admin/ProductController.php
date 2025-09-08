<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('search') && $request->input('search') != '') {
            $search = $request->input('search');
            $query->where('nama', 'like', '%' . $search . '%');
        }

        $products = $query->latest()->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'keterangan' => 'required|string',
            'gambar' => 'required|image|max:51200',
        ]);

        $path = $request->file('gambar')->store('products', 'public');

        Product::create([
            'nama' => $request->nama,
            'price' => $request->price,
            'keterangan' => $request->keterangan,
            'gambar' => $path,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Normalisasi input harga: ganti koma dengan titik
        $request->merge([
            'price' => str_replace(',', '.', $request->input('price', 0))
        ]);

        $request->validate([
            'nama' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'keterangan' => 'required|string',
            'gambar' => 'nullable|image|max:51200',
        ]);

        $data = $request->only('nama', 'price', 'keterangan');

        if ($request->hasFile('gambar')) {
            // Delete old image
            Storage::disk('public')->delete($product->gambar);
            // Store new image
            $path = $request->file('gambar')->store('products', 'public');
            $data['gambar'] = $path;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        // Delete the image from storage
        Storage::disk('public')->delete($product->gambar);

        // Delete the product from the database
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}