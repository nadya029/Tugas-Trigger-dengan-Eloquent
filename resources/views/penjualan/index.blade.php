@extends('layouts.apps')
@section('title', 'Daftar Penjualan')

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Daftar Penjualan</h2>

        <a href="{{ route('penjualan.create') }}" class="btn btn-primary mb-3">Tambah Penjualan</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Barang</th>
                    <th>Tanggal Keluar</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualans as $penjualan)
                    <tr>
                        <td>{{ $penjualan->id_barang_keluar }}</td>
                        <td>{{ $penjualan->kode_barang }}</td>
                        <td>{{ $penjualan->tgl_keluar }}</td>
                        <td>{{ $penjualan->jumlah }}</td>
                        <td>
                            <a href="{{ route('penjualan.edit', $penjualan->id_barang_keluar) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('penjualan.destroy', $penjualan->id_barang_keluar) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
