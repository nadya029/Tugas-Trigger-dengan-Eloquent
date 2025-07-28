@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@section('content')
    
<div class="col-lg-9 offset-lg-1">
    <a href="{{route('jenis.create')}}" class="btn btn-sm btn-primary mb-2">buat baru</a>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center">list jenis barang</h2>
            <div class="table-responsive">

                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Jenis Barang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        
                        @foreach ($jenisBarangs as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->jenis_barang}}</td>
                            <td><a href="{{ route('jenis.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>| <form
                                action="{{ route('jenis.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE') <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus merk ini?')">Hapus</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          
        </div>
    </div>    
</div>
@endsection
