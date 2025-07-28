@extends('layouts.apps')
@section('title', 'Edit Penjualan')

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Edit Penjualan</h2>
        <form action="{{ route('penjualan.update', $penjualan->id_barang_keluar) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ $penjualan->kode_barang }}" required>
            </div>
            <div class="mb-3">
                <label for="tgl_keluar" class="form-label">Tanggal Keluar</label>
                <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar" value="{{ $penjualan->tgl_keluar }}" required>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $penjualan->jumlah }}" required>
            </div>
            <button type="submit" class="btn btn-warning">Perbarui</button>
            <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
