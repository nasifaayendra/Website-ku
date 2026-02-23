@extends('layouts.app')


@section('content')
<!-- Card  -->
<div class="card shadow mb-4">
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <!-- Input Name Supplier -->
            <div class="mb-3">
                <label for="nama_supplier">Nama Supplier</label>
                <input class="form-control" id="nama_supplier" type="text" name="nama_supplier" placeholder="Masukan Nama Supplier" required>
                @error('nama_supplier')
                    <!-- Error Message -->
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    <!-- End of Error Message -->
                @enderror
            </div>
            <!-- End of Input Name Supplier -->
            <!-- Input City -->
            <div class="mb-3">
                <label for="city">Kota / Kabupaten</label>
                <input class="form-control" id="city" type="text" name="city" placeholder="Masukan Kota / Kabupaten" required>
                @error('city')
                    <!-- Error Message -->
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    <!-- End of Error Message -->
                @enderror
            </div>
            <!-- End of Input City-->
            <!-- Input Region -->
            <div class="mb-3">
                <label for="region">Provinsi</label>
                <input class="form-control" id="region" type="text" name="region" placeholder="Masukan Provinsi" required>
                @error('region')
                    <!-- Error Message -->
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    <!-- End of Error Message -->
                @enderror
            </div>
            <!-- End of Input Region -->
            <!-- Input Address -->
            <div class="mb-3">
                <label for="address">Alamat Lengkap</label>
                <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                @error('address')
                    <!-- Error Message -->
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    <!-- End of Error Message -->
                @enderror
            </div>
            <!-- End of Input Region -->
            <!-- Button -->
            <div class="mb-3">
                <a href="{{ route('supplier.index') }}" class="btn btn-dark btn-md">
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
<!-- End of Card  -->
@endsection
