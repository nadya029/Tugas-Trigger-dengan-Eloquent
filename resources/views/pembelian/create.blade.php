@extends('layouts.apps')
@section('title', 'Tambah Pembelian')

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Tambah Pembelian</h2>

        <form action="{{ route('pembelian.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="kode_barang" class="form-label">Kode Barang:</label>
                <input type="text" name="kode_barang" id="kode_barang" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="jumlah" class="form-label">Jumlah:</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pembelian.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
