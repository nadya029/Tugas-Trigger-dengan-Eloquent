@extends('layouts.apps')
@section('title')
list lokasi
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{ route('lokasi.create') }}" class="btn btn-primary btn-sm
mb-3">tambah</a>
        <h2 class="card-title">Daftar Lokasi</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kode Lokasi</th>
                        <th>Nama Lokasi</th>
                        <th>Gambar Lokasi</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lokasis as $lokasi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $lokasi->kode }}</td>
                        <td>{{ $lokasi->nama_lokasi }}</td>
                        <td>
                            <img src="{{ asset('gambar/thumbnails/' . $lokasi->gambar_lokasi) }}"
                                alt="{{ $lokasi->nama_lokasi }}" class="img-thumbnail" width="50px"
                                height="auto"
                                type="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true"
                                data-bs-title="<img src='{{ asset('gambar/' . $lokasi->gambar_lokasi)
}}' width='350px' height='auto'>" />
                        </td>
                        <td>{{ $lokasi->keterangan }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('lokasi.edit', $lokasi->id) }}"
                                    class="btn btn-warning btn-sm">edit</a>
                                <form action="{{ route('lokasi.destroy', $lokasi->id) }}"
                                    method="POST"
                                    style="display:inline-block;">
                                    @csrf @method('DELETE') <button type="submit" class="btn btn-danger
btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus merkini?')">Hapus</button>
                                </form>
                                <a href="{{ route('lokasi.show', $lokasi->id) }}" class="btn btn-primary btn-sm">show</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
@stop