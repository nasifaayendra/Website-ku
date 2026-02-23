@extends('layouts.app')


@section('content')
<!-- Table  -->
<div class="card shadow mb-4">
    <div class="card-body">
        <!-- Form -->
        <form action="{{ route('supplier.update',$supplier->id) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <!-- Input Name Supplier -->
            <div class="mb-3">
                <label for="name_supplier">Nama Supplier</label>
                <input class="form-control" id="name_supplier" type="text" name="name_supplier"
                value="{{ old('name_supplier',$supplier->name_supplier) }}" placeholder="Masukan Nama Supplier" required>
                @error('name_supplier')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!-- End of Input Name Supplier -->


            <!-- Input City -->
            <div class="mb-3">
                <label for="city">Kota / Kabupaten</label>
                <input class="form-control" id="city" type="text" name="city" placeholder="Masukan Kota / Kabupaten"
                value="{{ old('city',$supplier->city) }}" required>
                @error('city')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!-- End of Input City-->


            <!-- Input Region -->
            <div class="mb-3">
                <label for="region">Provinsi</label>
                <input class="form-control" id="region" type="text" name="region" placeholder="Masukan Provinsi"
                value="{{ old('region',$supplier->region) }}"required>
                @error('region')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!-- End of Input Region -->


            <!-- Input Address -->
            <div class="mb-3">
                <label for="address">Alamat Lengkap</label>
                <textarea class="form-control" id="address" name="address" rows="3">{{ old('address',$supplier->address) }}</textarea>
                @error('address')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!-- End of Input Region -->


            <!-- Button -->
            <div class="mb-3">
                <a href="{{ route('supplier.index') }}" class="btn btn-dark btn-md">
                    Kembali
                </a>
                <button class="btn btn-danger" type="reset">Reset</button>
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
            <!-- End of Button -->
        </form>
        <!-- End of Form -->
    </div>
</div>
@endsection
