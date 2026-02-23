@extends('layouts.app')


@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('product.create') }}" class="btn btn-success btn-md">
            Tambah Produk
        </a>
    </div>
    <div class="card-body">
        <!-- Start : Menampilkan pesan sukses atau error -->
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <!-- End : Menampilkan pesan sukses atau error -->
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Supplier</th>
                        <th>Merk</th>
                        <th>Slug</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('/storage/products/'.$item->image) }}" class="rounded" style="width: 150px"></td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->category->category }}</td>
                            <td>{{ $item->supplier->name_supplier }}</td>
                            <td>{{ $item->merk }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>
                             <form action="{{ route('product.destroy',$item->id) }}" method="POST">
                                <a class="btn btn-primary btn-md" href="{{ route('product.edit',$item->id) }}">
                                     Edit
                                </a>
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger btn-md">Hapus</button>
                               </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">Belum ada data produk !</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- Pagination --}}
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
