@extends('layouts.app')
@section('content')
    <div class="">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Dashboard</h3>
                </div>
                <div class="card-body" style="height: 800px;">
                    <h5>Selamat datang di halaman dashboard, <strong>{{ Auth::user()->name }}</strong></h5>
                </div>
            </div>
        </div>
    </div>
@endsection


