@extends('layout/sidebar')
@section('css')
<link rel="stylesheet" href="{{ asset('css/u/rekap.css') }}">
@endsection
@section('content')
<div class="container">
  <form action="" method="POST">
  <div class="row">
    <div class="col-md-3">
      Tahun Ajaran/Semester<i class="fa-solid fa-asterisk fa-2xs" style="color: #f60000;"></i> 
      <select class="form-select btn-primary border-secondary" aria-label="Default select example" >
        <option selected disabled>Pilih Tahun Pelajaran</option>
        <option value="1">2023/Ganjil</option>
        <option value="2">2023/Genap</option>
        <option value="3">2022/Ganjil</option>
      </select>
    </div>
    <div class="col-md-2">
      Kelas<i class="fa-solid fa-asterisk fa-2xs" style="color: #f60000;"></i>
      <select class="form-select btn-primary border-secondary" aria-label="Default select example" >
        <option selected disabled>Pilih Kelas</option>
        <option value="1">Satu</option>
        <option value="2">Dua</option>
        <option value="3">Tiga</option>
        <option value="4">Empat</option>
        <option value="5">Lima</option>
        <option value="6">Enam</option>
      </select>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-2"></div>
    <div class="col-md-2">
      <br>
      <button type="submit" class="btn btn-primary ms-2">Konfirmasi</button>
    </div>
  </div>
  <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col" class="text-center">No.</th>
                <th scope="col" class="text-center">Nama Siswa</th>
                <th scope="col" class="text-center">Nilai</th>
                <th scope="col" class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row" class="text-center">1</td>
                <td scope="row">Dzacky</td>
                <td scope="row" class="text-center">90</td>
                <td scope="row" class="text-center">Cumlaude</td>
                
            </tr>
        </tbody>
        </table>

</form>
</div>
@endsection