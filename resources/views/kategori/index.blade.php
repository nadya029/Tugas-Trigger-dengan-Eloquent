@extends('layouts.apps')
@section('title', 'Daftar Kategori')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="card">
    <div class="card-body">
        <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm mb-3">Tambah Kategori</a>
        <h2 class="card-title">Daftar Kategori</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi Jenis Barang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->nama_kategori }}</td>
                        <td>{{ $k->deskripsi_jenis_barang }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                                </form>
                                <a href="{{ route('kategori.show', $k->id) }}" class="btn btn-primary btn-sm">Show</a>
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