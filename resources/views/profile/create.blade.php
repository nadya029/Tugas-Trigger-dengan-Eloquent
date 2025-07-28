@extends('layouts.apps')

@section('title', 'Tambah Profil')

@section('content')
<div class="container">
    <h2>Tambah Profil</h2>
    <form action="{{ route('profile.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="first_name" class="form-label">Nama Depan</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Nama Belakang</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">No Telepon</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>
        <div class="mb-3">
            <label for="bio" class="form-label">Biografi</label>
            <textarea class="form-control" id="bio" name="bio"></textarea>
        </div>
        <div class="mb-3">
            <label for="profile_picture" class="form-label">Gambar Profil</label>
            <input type="file" class="form-control" id="profile_picture" name="profile_picture">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('profile.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
