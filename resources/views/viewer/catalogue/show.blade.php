@extends('layouts.app')


@section('content')
<!-- Table  -->
<div class="card shadow mb-4">
    <div class="card-body">
            <!-- Nama Product -->
            <div class="mb-3">
                <label class="fw-bold"><strong>Nama Produk :</strong></label>
                {{ $product->product_name }}
            </div>
            <!-- End of Nama Product -->


            <!-- Image -->
            <div class="mb-3">
                <label class="fw-bold"><strong>Gambar Produk : </strong><br>
                    <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 150px">
                </label>
            </div>
            <!-- End of  Image -->


            <!-- Select Category -->
            <div class="mb-3">
                <label class="fw-bold"><strong>Kategori : </strong></label>
                {{ $product->category->category }}
            </div>
            <!-- End of Select Category -->


             <!-- Supplier -->
            <div class="mb-3">
                <label class="fw-bold"><strong>Suplier : </strong></label>
                {{ $product->supplier->nama_supplier }}
            </div>
            <!-- End of Supplier -->


            <!-- Input Merk-->
            <div class="mb-3">
                <label class="fw-bold"><strong>Merk : </strong></label>
                {{ $product->merk }}
            </div>
            <!-- End of Input Merk-->


            <!-- Input Description-->
            <div class="mb-3">
                <label><strong>Deskripsi : </strong></label>
                <p>{{ $product->description }}</p>
            </div>
            <!-- End of Input Description-->


            <!-- Button -->
            <div class="mb-3">
                <a href="{{ route('catalogue.index') }}" class="btn btn-dark btn-md">
                    Kembali
                </a>
            </div>
            <!-- End of Button -->
    </div>
</div>
@endsection
