@extends('layouts.apps')
@section('title')
    edit merek
@endsection
@section('content')
    <div class="col-8 offset-2">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Merk</h4>
                <hr>
                <form action="{{ route('merk.update', $merk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="{{ $merk->id }}">
                    <div class="mb-3">
                        <label for="">merk barang</label>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="" placeholder="Masukkan merk barang"
                            name="merk" value="{{ $merk->merk_barang }}">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-warning btn-sm">edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
