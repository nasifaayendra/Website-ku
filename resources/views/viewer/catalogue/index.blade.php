@extends('layouts.app')


@section('content')
<!-- Row Katalog -->
<div class="row">
    @forelse ($products as $item)
        <div class="col-md-4">
            <div class="card shadow">
                <img src="{{ asset('/storage/products/'.$item->image) }}" class="card-img-top" style="width: 200px; height: 200px;" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->product_name }}</h5>
                    <p class="card-text">{{ Illuminate\Support\Str::limit($item->description, 100) }}</p>
                    <a href="{{ route('catalogue.show',$item->slug) }}" class="btn btn-primary">Lihat Produk</a>
                </div>
            </div>
        </div>
    @empty
        <!-- Menampilkan pesan jika produk tidak ada -->
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                    Produk belum ada !
            </div>
        </div>
    @endforelse


</div>
<!-- End of Row Katalog -->


<!-- Row Pagination -->
<div class="row">
    <div class="col-md-12">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
<!-- End of Row Pagination -->
@endsection
