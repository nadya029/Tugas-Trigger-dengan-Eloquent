@extends('layouts.apps')
@section('title', 'Daftar Pembelian')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">
    <div class="card-body">
        <a href="{{ route('pembelian.create') }}" class="btn btn-primary btn-sm mb-3">Tambah Pembelian</a>
        <h2 class="card-title">Daftar Pembelian</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID Barang Masuk</th>
                        <th>Kode Barang</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembelians as $pembelian)
                    <tr>
                        <td>{{ $pembelian->id_barang_masuk }}</td>
                        <td>{{ $pembelian->kode_barang }}</td>
                        <td>{{ $pembelian->jumlah }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('pembelian.edit', $pembelian->id_barang_masuk) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pembelian.destroy', $pembelian->id_barang_masuk) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
</script>
@stop
