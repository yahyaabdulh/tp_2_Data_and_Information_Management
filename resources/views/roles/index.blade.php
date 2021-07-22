@extends('layouts.app')
@section('content')
<div class="">
    <div class="col-md-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Daftar Jabatan</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('jabatan.create') }}" class="float-right btn btn-success">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p><i>semua daftar jabatan yang melekat pada setiap karyawan</i></p>
                <table class="table table-striped">
                    <tr>
                        <th width="20px" class="text-center">No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th width="280px" class="text-center">Action</th>
                    </tr>
                    @foreach ($roles as $role)
                    <tr>
                        <td class="text-center">{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->note}}</td>
                        <td class="text-center">
                            <form action="{{ route('jabatan.destroy',$role->id) }}" method="POST">
                                <a class="btn btn-primary btn-sm" href="{{ route('jabatan.edit',$role->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>

                {!! $roles->links('pagination::bootstrap-4') !!}

            </div>
        </div>
    </div>
</div>
@endsection