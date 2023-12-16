@extends('layout/sidebar')
@section('css')
<link rel="stylesheet" href="{{ asset('css/setting.css') }}">
@endsection
@section('content')
<div class="container">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="body d-flex align-items-center">
        <p>Tambahkan Akun</p>
        <a href="{{ route('akun') }}" class="btn btn-primary">Choose</a>
    </div>
    <div class="body d-flex align-items-center">
        <p>Tambahkan Data</p>
        <a href="{{ route('kelas') }}" class="btn btn-primary">Choose</a>
    </div>
    <div class="body d-flex align-items-center">
        <p>Data Akun Murid</p>
        <a href="{{ route('murid') }}" class="btn btn-primary">Choose</a>
    </div>
    <div class="body d-flex align-items-center">
        <p>Data Akun Guru</p>
        <a href="" class="btn btn-primary">Choose</a>
    </div>
</div>
@endsection