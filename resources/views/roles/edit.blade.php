@extends('layouts.app')
@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3>Edit Jabatan</h3>
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
            <form action="{{ route('jabatan.update', $roles->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nama</label>
                            <div class="col-lg-9">
                                <input type="text" name="name" value="{{ $roles->name }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Diskripsi</label>
                            <div class="col-lg-9">
                                <textarea class="form-control" style="height:150px" name="note">{{ $roles->note }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <br />
                        <hr />
                        <a class="btn btn-secondary" href="{{ route('jabatan.index') }}"> Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection