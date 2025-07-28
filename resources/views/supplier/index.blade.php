@extends('layouts.apps')

@section('title', 'Daftar Supplier')

@section('content')
<div class="container">
    <h2>Daftar Supplier</h2>
    <a href="{{ route('supplier.create') }}" class="btn btn-primary mb-3">Tambah Supplier</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode Supplier</th>
                <th>Nama Supplier</th>
                <th>No Telp</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->kode_supplier }}</td>
                    <td>{{ $supplier->nama_supplier }}</td>
                    <td>{{ $supplier->no_tlp }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>{{ $supplier->alamat }}</td>
                    <td>
                        <a href="{{ route('supplier.show', $supplier->id_supplier) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('supplier.edit', $supplier->id_supplier) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('supplier.destroy', $supplier->id_supplier) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus supplier ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
