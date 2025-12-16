@extends('layout.template')
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('supplier/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <table class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Supplier</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($supplier as $item)
                        <tr>
                            <td>{{ $item->supplier_id }}</td>
                            <td>{{ $item->supplier_kode }}</td>
                            <td>{{ $item->supplier_nama }}</td>
                            <td>{{ $item->supplier_alamat }}</td>
                            <td>
                                <a href="{{ url('/supplier/' . $item->supplier_id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ url('/supplier/' . $item->supplier_id . '/edit') }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form method="POST" action="{{ url('/supplier/' . $item->supplier_id) }}"
                                    class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('js')
@endpush