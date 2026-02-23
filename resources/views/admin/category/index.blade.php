@extends('layouts.app')


@section('content')
<!-- Card -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('category.create') }}" class="btn btn-success btn-md">
            Tambah Kategori
        </a>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Slug</th>
                        <th>Aksi</th>
                    </tr>
</thead>
                <tbody>
                    @forelse ($categories as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->slug }}</td>
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
                            <td colspan="4">Belum ada data kategori</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Pagination -->
            {{ $categories->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
<!-- End of Card -->
@endsection
