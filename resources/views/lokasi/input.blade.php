@extends('layouts.apps')
@section('content')
<div class="container">
    <div class="row col-lg-8 offset-lg-2">
        <div class="card shadow-lg">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="mb-3">
                    <form action="{{ route('lokasi.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-2 mb-3">
                                <label for="kode" class="form-label">Kode Lokasi</label>
                            </div>
                            <div class="col-10">
                                <input type="text" name="kode" class="form-control"
                                    placeholder="kode lokasi"
                                    required>
                            </div>
                            <div class="col-2 mb-3">
                                <label for="lokasi" class="form-label">Nama Lokasi</label>
                            </div>
                            <div class="col-10">
                                <input type="text" name="lokasi" class="form-control"
                                    placeholder="lokasi"
                                    id="lokasi" required>
                            </div>
                            <div class="col-2 mb-3">
                                <label for="gambar" class="form-label">Gambar Lokasi</label>
                            </div>
                            <div class="col-10">
                                <input type="file" name="gambar" class="form-control bg-primary"
                                    placeholder="gambar" id="gambar" required>
                            </div>
                            <div class="col-2 mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                            </div>
                            <div class="col-10">
                                <textarea type="text" name="keterangan" class="form-control"
                                    placeholder="keterangan"> </textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btnsm">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()