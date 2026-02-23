<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Judul Halaman 
        $title = 'Data Produk';

        // Mengambil id user yang sedang login
        $id = Auth::user()->id;

        // Mengambil data dari tabel product dengan relasi category & supplier
        $products = Product::where('user_id', $id)
            ->with('category', 'supplier')
            ->latest()
            ->paginate(10);

        // Tampilkan view product.index
        return view('admin.product.index', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Data Produk';
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('admin.product.create', compact('title', 'categories', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|min:3',
            'image'        => 'required|image|mimes:jpeg,jpg,png|max:1000',
            'category_id'  => 'required',
            'supplier_id'  => 'required',
        ]);

        $id = Auth::user()->id;

        // Upload image
        $image = $request->file('image');
        $image->storeAs('products', $image->hashName());

        // Simpan data
        Product::create([
            'user_id'       => $id,
            'image'         => $image->hashName(),
            'product_name'  => $request->product_name,
            'category_id'   => $request->category_id,
            'supplier_id'   => $request->supplier_id,
            'slug'          => Str::slug($request->product_name) . '-' . time(),
            'merk'          => $request->merk,
            'description'   => $request->description,
        ]);

        return redirect()->route('product.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit Data Produk';
        $categories = Category::all();
        $suppliers = Supplier::all();
        $product = Product::findOrFail($id);

        return view('admin.product.edit', compact('title', 'categories', 'suppliers', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_name' => 'required|min:3',
            'image'        => 'nullable|image|mimes:jpeg,jpg,png|max:1000',
            'category_id'  => 'required',
            'supplier_id'  => 'required',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::delete('products/' . $product->image);

            // Upload new image
            $image = $request->file('image');
            $image->storeAs('products', $image->hashName());

            $product->update([
                'image'         => $image->hashName(),
                'product_name'  => $request->product_name,
                'category_id'   => $request->category_id,
                'supplier_id'   => $request->supplier_id,
                'slug'          => Str::slug($request->product_name) . '-' . time(),
                'merk'          => $request->merk,
                'description'   => $request->description,
            ]);
        } else {
            $product->update([
                'product_name'  => $request->product_name,
                'category_id'   => $request->category_id,
                'supplier_id'   => $request->supplier_id,
                'slug'          => Str::slug($request->product_name) . '-' . time(),
                'merk'          => $request->merk,
                'description'   => $request->description,
            ]);
        }

        return redirect()->route('product.index')->with(['success' => 'Data Berhasil Di Update!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        Storage::delete('products/' . $product->image);
        $product->delete();

        return redirect()->route('product.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
