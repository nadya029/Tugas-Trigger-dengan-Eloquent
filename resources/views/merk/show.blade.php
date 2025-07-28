@extends('layouts.apps')

@section('title', 'Detail Merk')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Detail Merk</h3>
        </div>
        <div class="card-body">
            <p><strong>Brand:</strong> {{ $merk->merk_barang }}</p>
            <a href="{{ route('merk.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection