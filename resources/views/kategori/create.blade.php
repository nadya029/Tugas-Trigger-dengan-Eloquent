@extends('layouts.apps')
@section('title', 'Tambah Kategori')

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Tambah Kategori</h2>
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi_jenis_barang" class="form-label">Deskripsi Jenis Barang</label>
                <textarea class="form-control" id="deskripsi_jenis_barang" name="deskripsi_jenis_barang"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection