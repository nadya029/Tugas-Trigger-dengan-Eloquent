@extends('layouts.app')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@section('content')
    <div class="col-8 offset-2">
        <h4>Edit Merk</h4>
        <hr>
        <form action="{{ route('jenis.update', $jenis->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="id" value="{{ $jenis->id }}">
            <div class="mb-3">
                <label for="">merk barang</label>
                <input type="text" class="form-control" id="" placeholder="Masukkan merk barang" name="jenis"
                    value="{{ $jenis->jenis_barang }}">
            </div>
            <div>
                <button type="submit" class="btn btn-warning btn-sm">edit</button>
            </div>

        </form>
    </div>
@endsection
