@extends('layouts.app')


@section('content')
<!-- Begin Card -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="category">Masukan Nama Kategori</label>
                <input class="form-control" id="category" type="text" name="category"
                value="{{ old('category',$category->category) }}" placeholder="Masukan Nama Kategori" required>
            </div>
            <div class="mb-3">
                <a href="{{ route('category.index') }}" class="btn btn-dark btn-md">
                    Kembali
                </a>
                <button class="btn btn-danger" type="reset">Reset</button>
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
<!-- End of Card -->
@endsection
