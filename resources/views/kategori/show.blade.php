@extends('layouts.apps')
@section('title', 'Detail Kategori')

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Detail Kategori</h2>
        <p><strong>Nama Kategori:</strong> {{ $kategori->nama_kategori }}</p>
        <p><strong>Deskripsi Jenis Barang:</strong> {{ $kategori->deskripsi_jenis_barang }}</p>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection