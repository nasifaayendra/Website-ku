<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Judul Halaman 
        $title = 'Data Supplier';

        //Mengambil data dari tabel categories dengan Eloquent
        $suppliers = Supplier::latest()->paginate(10);

        //Tampilkan view supplier.index dengan mengirimkan variabel title,suppliers
        return view('admin.supplier.index',compact('title','suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Judul Halaman
        $title = 'Tambah Data Supplier';

        //Tampilkan view supplier.create dengan mengirimkan variabel title
        return view('admin.supplier.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi request data yang dikirimkan
        $request->validate([
            'nama_supplier' => 'required|min:3',
            'city'          => 'required|min:3',
            'region'        => 'required|min:3',
            'address'        => 'required|min:3',
        ]);

        //Masukan data supplier ke dalam database
        $insert = Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'city'          => $request->city,
            'region'        => $request->region,
            'address'        => $request->address,
        ]);

        //alihkan ke route supplier.index
        return redirect()->route('supplier.index')->with(['success' =>'Data Berhasil Disimpan!']);
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
        $title = 'Edit Data Supplier';

        //Mengambil data dari database berdasarkan parameter $id pada url
        $supplier = Supplier::findOrFail($id);

        //Tampilkan view supplier.edit dengan variabel title,supplier
        return view('admin.supplier.edit',compact('title','supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validasi request data yang dikirimkan
        $request->validate([
            'nama_supplier' => 'required|min:3',
            'city'          => 'required|min:3',
            'region'        => 'required|min:3',
            'address'        => 'required|min:3',
        ]);

        //Masukan data supplier ke dalam database
        $supplier = Supplier::findOrFail($id);
        $supplier->update([
       'nama_supplier' => $request->nama_supplier,
       'city'          => $request->city,
       'region'        => $request->region,
        'address'       => $request->address,
        ]);


        //alihkan ke route supplier.index
        return redirect()->route('supplier.index')->with(['success' =>'Data Berhasil Di Update!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Mendapatkan data supplier berdasarkan parameter ID
        $supplier = Supplier::findOrFail($id);

        //Hapus data supplier tersebut
        $supplier->delete();

        //alihkan ke route supplier.index
        return redirect()->route('supplier.index')->with(['success' =>'Data Berhasil Dihapus!']);
    }
}
