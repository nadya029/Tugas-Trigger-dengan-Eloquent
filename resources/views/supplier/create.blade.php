@extends('layouts.apps')

@section('title', 'Tambah Supplier')

@section('content')
<div class="container">
    <h2>Tambah Supplier</h2>

    <form action="{{ route('supplier.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kode_supplier" class="form-label">Kode Supplier</label>
            <input type="text" class="form-control" id="kode_supplier" name="kode_supplier" required>
        </div>
        <div class="mb-3">
            <label for="nama_supplier" class="form-label">Nama Supplier</label>
            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" required>
        </div>
        <div class="mb-3">
            <label for="no_tlp" class="form-label">No Telp</label>
            <input type="text" class="form-control" id="no_tlp" name="no_tlp" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('supplier.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
