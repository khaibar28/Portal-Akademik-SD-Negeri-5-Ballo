@extends('layout/sidebar')
@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
@section('content')
    <div class="container">
      <h3>Selamat Datang <span>{{ auth()->user()->name }}</span></h3>
      <p class="mt-4">Selamat datang di Portal Akademik SD Negeri 5 Ballo Takalar. Portal Akademik adalah sistem yang memungkinkan civitas akademika  SD Negeri 5 Ballo menerima informasi lebih cepat melalui internet. Sistem ini diharapkan dapat memberikan kemudahan kepada civitas akademika SD Negeri 5 Ballo untuk melakukan aktivitas-aktivitas akademik dan proses belajar mengajar.</p>
      <p class="mt-4">Selamat menggunakan fasilitas ini.</p>
    </div>
@endsection