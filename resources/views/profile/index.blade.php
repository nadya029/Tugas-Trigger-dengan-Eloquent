@extends('layouts.apps')

@section('title', 'Daftar Profil')

@section('content')
<div class="container">
    <h2>Daftar Profil</h2>
    <a href="{{ route('profile.create') }}" class="btn btn-primary mb-3">Tambah Profil</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profiles as $profile)
                <tr>
                    <td>{{ $profile->id_profile }}</td>
                    <td>{{ $profile->first_name }}</td>
                    <td>{{ $profile->last_name }}</td>
                    <td>{{ $profile->address }}</td>
                    <td>
                        <a href="{{ route('profile.show', $profile->id_profile) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('profile.edit', $profile->id_profile) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('profile.destroy', $profile->id_profile) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus profil ini?');">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
