@extends('layout/sidebar')
@section('css')
<link rel="stylesheet" href="{{ asset('css/u/rekap.css') }}">
@endsection

@section('content')
<div class="container">
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
    <div class="col-md-3">
            Pilih Mata pelajaran<i class="fa-solid fa-asterisk fa-2xs" style="color: #f60000;"></i> 
            <select class="form-select btn-primary border-secondary" aria-label="Default select example" >
                <option selected disabled>Pilih Mata Pelajaran</option>
                <option value="1">Matematika</option>
                <option value="2">Bhs. Indonesia</option>
                <option value="3">IPA</option>
            </select>
    </div>
    <div class="col-md-2">
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <div class="col-md-2">
      <br>
      <a href="" type="button" class="btn btn-outline-dark ms-4"><i class="fa-solid fa-plus me-2"></i>Tambahkan</a>
    </div>
  </div>

    {{-- buatkan if else --}}
  {{-- kalau belum ada data --}}
  {{-- <div>
    <center>
        <img src="{{ asset('img/no_data.svg') }}" alt="" class="mt-4">
    </center>
  </div> --}}

  
    <table class="table mt-5">
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
        </table>
</div>
@endsection