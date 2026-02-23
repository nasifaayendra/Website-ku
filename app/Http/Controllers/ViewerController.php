<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ViewerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Judul Halaman
        $title = 'Data Produk';

        //Mengambil data dari tabel product dengan Eloquent Category
        //Serta kita ambil data category dan supplier yang berelasi dengan function with
        $products = Product::with('category','supplier')->latest()->paginate(12);

        //Tampilkan view catalogue.index dengan mengirimkan variabel title,suppliers
        return view('viewer.catalogue.index',compact('title','products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Judul Halaman 
        $title = 'Detail Produk';

        //Mengambil data product dari database berdasarkan parameter $id pada url
        $product = Product::where('slug',$id)->get()->first();

        if ($product !=null) {
            //Tampilkan view product.edit dengan variabel title,product
            return view('viewer.catalogue.show',compact('title','product'));
        } else {
            abort('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
