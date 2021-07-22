@extends('layouts.app')
@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Tambah Karyawan</h3>
                </div>
                <div class="col-md-6">
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Terdapat permasalahan diinputan anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('karyawan.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nama</label>
                            <div class="col-lg-9">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Email</label>
                            <div class="col-lg-9">
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Telephone</label>
                            <div class="col-lg-9">
                                <input type="text" name="telephone" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Password</label>
                            <div class="col-lg-9">
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Ulangi Password</label>
                            <div class="col-lg-9">
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Jabatan</label>
                            <div class="col-lg-9">
                                <select name="role_id" id="role_id" class="form-control">
                                    <option value="">-- Pilih Jabatan --</option>
                                    @foreach ($roles as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">No Karyawan</label>
                            <div class="col-lg-9">
                                <input type="text" name="employe_no" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Alamat</label>
                            <div class="col-lg-9">
                                <textarea class="form-control" style="height:150px" name="address"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Aktif</label>
                            <div class="col-lg-9">
                                <input type="checkbox" name="is_active" value="true" checked> 
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <br />
                        <hr />
                        <a class="btn btn-secondary" href="{{ route('karyawan.index') }}"> Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection