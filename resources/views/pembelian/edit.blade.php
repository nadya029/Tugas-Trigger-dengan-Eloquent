@extends('layouts.apps') 
@section('title', 'Edit Pembelian')

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Edit Pembelian</h2>
        <form action="{{ route('pembelian.update', $pembelian->id_barang_masuk) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ $pembelian->kode_barang }}" required>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ $pembelian->jumlah }}" required>
            </div>
            <button type="submit" class="btn btn-warning">Perbarui</button>
            <a href="{{ route('pembelian.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
