@extends('layouts.app')


@section('content')
<!-- Card -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <!-- Input category -->
            <div class="mb-3">
                <label for="category">Masukan Nama Kategori</label>
                <input class="form-control" id="category" type="text" name="category" placeholder="Masukan Nama Kategori" required>
                @error('category')
                    <!-- Error Message -->
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    <!-- End of Error Message -->
                @enderror
            </div>
            <!-- End of Input category -->


            <!-- Button -->
            <div class="mb-3">
                <a href="{{ route('category.index') }}" class="btn btn-dark btn-md">
                    Kembali
                </a>
                <button class="btn btn-danger" type="reset">Reset</button>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
            <!-- End of Button -->
        </form>
    </div>
</div>
<!-- End of Card -->
@endsection
