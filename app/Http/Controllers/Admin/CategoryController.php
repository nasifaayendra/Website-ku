<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Judul Halaman 
        $title = 'Data Kategori';

        //Mengambil data dari categories dengan Eloquent Category
        $categories = Category::latest()->paginate(10);

        //Menampilkan view category.index dengan mengirimkan variabel title,categories
        return view('admin.category.index',compact('title','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Judul Halaman 
        $title = 'Tambah Data Kategori';

        //Menampilkan tampilan category.create dengan mengirimkan variabel title
        return view('admin.category.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi request data yang dikirimkan 
        $request->validate([
            'category'          => 'required'
        ]);

        //Masukan data kategori ke dalam database
        $detail = Category::create([
                'category'  => $request->category,
                'slug'      => Str::slug($request->category).'-'.time()
        ]);

        //alihkan ke route category.index
        return redirect()->route('category.index')->with(['succes' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //Judul Halaman 
        $title ='Edit Data Kategori';

        //Mengambil data dari database berdasarkan parameter $id pada url
        $category = Category::findOrFail($id);

        //tampilkan view category.edit dengan variabel title, category
        return view('admin.category.edit',compact('title','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validasi request data yang dikirimkan 
        $request->validate([
            'category'          => 'required'
        ]);

        //Mengecek apakah data dari database berdasarkan parameter $id pada url itu ada
        $category = Category::findOrFail($id);

        //Jika ada data berdasarkan parameter,lakukan update dengan data request terbaru
        $category->update([
                'category'  => $request->category,
                'slug'      => Str::slug($request->category).'-'.time()
        ]);

        //alihkan ke route category.index
        return redirect()->route('category.index')->with(['succes' => 'Data Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Mendapatkan data category berdasarkan parameter ID
        $category = Category::findOrFail($id);

        //Hapus data category tersebut
        $category->delete();

        //alihkan ke route category.index
        return redirect()->route('category.index')->with(['succes' => 'Data Berhasil Dihapus!']);
    }
}
