@extends('layout/sidebar')
@section('css')
<link rel="stylesheet" href="{{ asset('css/setting.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="body d-flex align-items-center">
        <p>Tambahkan Akun</p>
        <button class="btn btn-primary">Choose</button>
    </div>
    <div class="body d-flex align-items-center">
        <p>Tambahkan Data</p>
        <button class="btn btn-primary">Choose</button>
    </div>
    <div class="body d-flex align-items-center">
        <p>Data Akun Murid</p>
        <button class="btn btn-primary">Choose</button>
    </div>
    <div class="body d-flex align-items-center">
        <p>Data Akun Guru</p>
        <button class="btn btn-primary">Choose</button>
    </div>
</div>
@endsection