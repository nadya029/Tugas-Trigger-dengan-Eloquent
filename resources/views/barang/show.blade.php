@extends('layouts.apps')

@section('title', 'Detail Barang')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Detail Barang</h3>
        </div>
        <div class="card-body">
            <p><strong>Kode Barang:</strong> {{ $barang->kode_barang }}</p>
            <p><strong>Nama Barang:</strong> {{ $barang->nama_barang }}</p>
            <p><strong>Stok:</strong> {{ $barang->stok }}</p>
            <p><strong>Kategori:</strong> {{ $barang->kategori->nama_kategori }}</p>
            <p><strong>Merk:</strong> {{ $barang->merk->merk }}</p>
            <div class="mt-3">
                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection