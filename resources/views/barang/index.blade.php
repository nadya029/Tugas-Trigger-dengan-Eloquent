@extends('layouts.apps')

@section('title', 'Daftar Barang')

@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{ route('barang.create') }}" class="btn btn-primary btn-sm mb-3">Tambah Barang</a>
        <h2 class="card-title">Daftar Barang</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID Barang</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                        <th>Merk</th>
                        <th>Supplier</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $barang)
                    <tr>
                        <td>{{ $barang->id }}</td>
                        <td>{{ $barang->kode_barang }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->stok }}</td>
                        <td>{{ $barang->kategoris->nama_kategori ?? 'Tidak ada'}}</td>
                        <td>{{ $barang->merk->merk_barang ?? 'Tidak ada'}}</td>
                        <td>{{ $barang->supplier->nama_supplier ?? 'Tidak ada Data' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                                </form>
                                <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-primary btn-sm">Show</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection