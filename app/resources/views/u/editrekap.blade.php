@extends('layout/sidebar')
@section('css')
<link rel="stylesheet" href="{{ asset('css/u/rekap.css') }}">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2">
      <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-warning ms-4" style="box-shadow: 0px 4px 4px 0px #00000040;
            border-radius: 12px">Konfirmasi</button>
    </div>
  </div>
  
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <center>
            <div class="mt-3">
              <img src="{{ asset('img/alert_biru.svg') }}" alt="">
            </div>
        <div class="modal-body p-0">
            <p class="m-0 mt-1" style="font-weight: bold; font-size: 15px">Are you sure want to confirm?</p>
            <p class="m-0 mt-1" style="font-size: 12px">Are you sure want to continue?</p>
        </div>
        <div class="p-3">
                <button type="button" class="btn" data-bs-dismiss="modal" style="border: 1px #3182FB solid">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
        </center>
      </div>
    </div>
  </div>

  {{-- buatkan if else --}}
  {{-- kalau belum ada data --}}
  {{-- <div>
    <center>
        <img src="{{ asset('img/no_data.svg') }}" alt="" class="mt-4">
    </center>
  </div> --}}

  {{-- kalau sudah ada data --}}
  <table class="table mt-3">
    <thead>
        <tr>
            <th scope="col" class="text-center">No.</th>
            <th scope="col" class="text-center">Nama Siswa</th>
            <th scope="col" class="text-center">NIS</th>
            <th scope="col" class="text-center">Tugas</th>
            <th scope="col" class="text-center">UH</th>
            <th scope="col" class="text-center">UAS</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row" class="text-center">1</td>
            <td scope="row">Dzacky</td>
            <td scope="row" class="text-center">12345678</td>
            <td scope="row" class="text-center"><input type="text" style="width: 20%"></td>
            <td scope="row" class="text-center"><input type="text" style="width: 20%"></td>
            <td scope="row" class="text-center"><input type="text" style="width: 20%"></td>
        </tr>
    </tbody>
    </table>
</div>
@endsection