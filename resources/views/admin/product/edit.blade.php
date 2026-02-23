@extends('layouts.app')


@section('content')
<!-- Card -->
<div class="card shadow mb-4">
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <!-- Input Product Name -->
            <div class="mb-3">
                <label for="product_name">Nama Produk</label>
                <input class="form-control" id="product_name" type="text" name="product_name"
                value="{{ old('product_name',$product->product_name) }}" placeholder="Masukan Nama Produk" required>
                @error('product_name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!-- End of Input Product Name -->


            <!-- Input Image -->
            <div class="mb-3">
                <label>Gambar terkini : <br>
                    <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 150px"></label><br>
                <label for="image" class="form-label">Ganti Gambar</label>
                <input class="form-control" type="file" id="image" name="image">
                @error('image')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!-- End of Input Image -->


            <!-- Select Category -->
            <div class="mb-3">
                <label for="category_id">Pilih Kategori</label>
                <select class="form-control" name="category_id" id="category_id" required>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}" @if ( $item->id == $product->category_id ) selected @endif>
                            {{ $item->category }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!-- End of Select Category -->


            <!-- Select Supplier -->
            <div class="mb-3">
                <label for="supplier_id">Pilih Suplier</label>
                <select class="form-control" name="supplier_id" id="supplier_id" required>
                    @foreach ($suppliers as $item)
                        <option value="{{ $item->id }}" @if ( $item->id == $product->supplier_id ) selected @endif>
                            {{ $item->name_supplier }}
                        </option>
                    @endforeach
                </select>
                @error('supplier_id')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!-- End of Select Supplier -->


            <!-- Input Merk-->
            <div class="mb-3">
                <label for="merk">Merk</label>
                <input class="form-control" id="merk" type="text" name="merk"
                value="{{ old('merk',$product->merk) }}" placeholder="Masukan Merk" required>
                @error('merk')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!-- End of Input Merk-->


            <!-- Input Description-->
            <div class="mb-3">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description',$product->description) }}
                </textarea>
                @error('description')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!-- End of Input Description-->


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
@endsection
