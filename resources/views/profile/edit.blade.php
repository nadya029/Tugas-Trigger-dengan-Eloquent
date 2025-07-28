@extends('layouts.apps')

@section('title', 'Edit Profil')

@section('content')
<div class="container">
    <h2>Edit Profil</h2>
    <form action="{{ route('profile.update', $profile->id_profile) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="first_name" class="form-label">Nama Depan</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $profile->first_name }}" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Nama Belakang</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $profile->last_name }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $profile->address }}">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">No Telepon</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $profile->phone }}">
        </div>
        <div class="mb-3">
            <label for="bio" class="form-label">Biografi</label>
            <textarea class="form-control" id="bio" name="bio">{{ $profile->bio }}</textarea>
        </div>
        <button type="submit" class="btn btn-warning">Perbarui</button>
        <a href="{{ route('profile.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
