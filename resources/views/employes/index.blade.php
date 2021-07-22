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
                        <h3>Daftar Karyawan</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('karyawan.create') }}" class="float-right btn btn-success">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p><i>semua daftar karyawan atau user yang mempunyai akses ke aplikasi</i></p>
                <table class="table table-striped">
                    <tr>
                        <th width="20px" class="text-center">No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Telephone</th>
                        <th>Login Terakhir</th>
                        <th width="280px" class="text-center">Action</th>
                    </tr>
                    @foreach ($employes as $employee)
                    <tr>
                        <td class="text-center">{{ ++$i }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->role_name}}</td>
                        <td>{{ $employee->email}}</td>
                        <td>{{ $employee->address}}</td>
                        <td>{{ $employee->telephone}}</td>
                        <td>{{ $employee->last_login}}</td>
                        <td class="text-center">
                            <form action="{{ route('karyawan.destroy',$employee->id) }}" method="POST">
                                <a class="btn btn-primary btn-sm" href="{{ route('karyawan.edit',$employee->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>

                {!! $employes->links('pagination::bootstrap-4') !!}

            </div>
        </div>
    </div>
</div>
@endsection