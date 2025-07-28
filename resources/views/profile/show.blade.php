@extends('layouts.apps')

@section('title', 'Detail Profil')

@section('content')
<div class="container">
    <h2>Detail Profil</h2>
    <div class="card">
        <div class="card-header">
            <h3>{{ $profile->first_name }} {{ $profile->last_name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Alamat:</strong> {{ $profile->address }}</p>
            <p><strong>No Telepon:</strong> {{ $profile->phone }}</p>
            <p><strong>Biografi:</strong> {{ $profile->bio }}</p>
            @if ($profile->profile_picture)
                <p><strong>Gambar Profil:</strong></p>
                <img src="{{ asset('storage/' . $profile->profile_picture) }}" alt="Profile Picture" class="img-fluid" style="max-width: 200px;">
            @endif
            <a href="{{ route('profile.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
