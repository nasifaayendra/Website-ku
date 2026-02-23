@extends('layouts.app')


@section('content')
<!-- Card -->
<div class="card shadow mb-4">
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <!-- Input Product Name -->
            <div class="mb-3">
                <label for="product_name">Nama Produk</label>
                <input class="form-control" id="product_name" type="text" name="product_name"
                 placeholder="Masukan Nama Produk" required>
                @error('product_name')
                    <!-- Error Message -->
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    <!-- End of Error Message -->
                @enderror
            </div>
            <!-- End of Input Product Name-->


            <!-- Input Image -->
            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                <input class="form-control" type="file" id="image" name="image" required>
                @error('image')
                    <!-- Error Message -->
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    <!-- End of Error Message -->
                @enderror
            </div>
            <!-- End of Input Image -->


            <!-- Select Category -->
            <div class="mb-3">
                <label for="category_id">Pilih Kategori</label>
                <select class="form-control" name="category_id" id="category_id" required>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->category }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <!-- Error Message -->
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    <!-- End of Error Message -->
                @enderror
            </div>
            <!-- End of Select Category -->


            <!-- Select Supplier -->
            <div class="mb-3">
                <label for="supplier_id">Pilih Suplier</label>
                <select class="form-control" name="supplier_id" id="supplier_id" required>
                    @foreach ($suppliers as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_supplier }}</option>
                    @endforeach
                </select>
                @error('supplier_id')
                    <!-- Error Message -->
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    <!-- End of Error Message -->
                @enderror
            </div>
            <!-- End of Select Supplier -->


            <!-- Input merk -->
            <div class="mb-3">
                <label for="merk">Merk</label>
                <input class="form-control" id="merk" type="text" name="merk"
                placeholder="Masukan Merk" required>
                @error('merk')
                    <!-- Error Message -->
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    <!-- End of Error Message -->
                @enderror
            </div>
            <!-- End of Input merk -->


            <!-- Input description -->
            <div class="mb-3">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                @error('description')
                    <!-- Error Message -->
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    <!-- End of Error Message -->
                @enderror
            </div>
            <!-- End of Input description -->


            <!-- Button -->
            <div class="mb-3">
                <a href="{{ route('product.index') }}" class="btn btn-dark btn-md">
                    Kembali
                </a>
                <button class="btn btn-danger" type="reset">Reset</button>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
            <!-- End of Button -->
        </form>
        <!-- End of Form -->
    </div>
</div>
<!-- End of Card -->
@endsection
