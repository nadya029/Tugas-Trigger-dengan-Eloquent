@extends('layouts.apps')

@section('title')
Tambah Penjualan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Form Tambah Penjualan</h2>

        <!-- Tambahkan notifikasi error di sini -->
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <!-- Akhir dari notifikasi error -->

        <form action="{{ route('penjualan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <select name="kode_barang" class="form-control" required>
                    <option value="">Pilih Barang</option>
                    @foreach ($barangs as $barang)
                        <option value="{{ $barang->kode_barang }}">{{ $barang->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tgl_keluar">Tanggal Keluar</label>
                <input type="date" name="tgl_keluar" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection