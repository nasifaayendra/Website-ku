@extends('layouts.app')


@section('content')
<!-- Begin Card -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('supplier.create') }}" class="btn btn-success btn-md">
            Tambah Supplier
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
                        <th>Nama Supplier</th>
                        <th>Kota</th>
                        <th>Provinsi</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suppliers as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_supplier }}</td>
                            <td>{{ $item->city }}</td>
                            <td>{{ $item->region }}</td>
                            <td>{{ $item->address }}</td>
                            <td>
                               <form action="{{ route('supplier.destroy',$item->id) }}" method="POST">
                                  <a class="btn btn-primary btn-md" href="{{ route('supplier.edit',$item->id) }}">
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
                            <td colspan="6">Belum ada data supplier</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Pagination -->
            {{ $suppliers->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
