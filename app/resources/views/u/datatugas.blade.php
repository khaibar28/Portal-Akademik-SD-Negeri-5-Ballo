@extends('layout/sidebar')
@section('css')
<link rel="stylesheet" href="{{ asset('css/u/rekap.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <a href="{{ route('addTugas') }}" type="button" class="btn btn-outline-dark ms-4"><i class="fa-solid fa-plus me-2"></i>Tambahkan</a>
        </div>
    </div>
  </div>

    {{-- buatkan if else --}}
  {{-- kalau belum ada data --}}
  <div>
    <center>
        <img src="{{ asset('img/no_data.svg') }}" alt="" class="mt-4">
    </center>
  </div>

  
    {{-- <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col" class="text-center">No.</th>
                <th scope="col" class="text-center">Deskripsi Tugas</th>
                <th scope="col" class="text-center">Deadline</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row" class="text-center">1</td>
                <td scope="row">Buku Cetak Matematika Hal. 59</td>
                <td scope="row" class="text-center">30 Februari 2024</td>
            </tr>
        </tbody>
        </table> --}}
</div>
@endsection