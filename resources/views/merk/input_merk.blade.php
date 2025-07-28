@extends('layouts.apps')
@section('title')
    buat merek
@endsection
@section('content')
    <div class="container">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
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

                        <form action="{{ route('merk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <label for="merk" class="form-label">Nama Merk</label>
                            <input type="text" name="merk" class="form-control" placeholder="masukan nama merek"
                                required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection()
