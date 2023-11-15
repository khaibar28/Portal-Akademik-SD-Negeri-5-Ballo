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
      <a href="{{ route('editrekap') }}" type="button" class="btn btn-warning ms-4">Edit Data</a>
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
  <table class="table mt-5">
    <thead>
        <tr>
            <th scope="col" class="text-center">No.</th>
            <th scope="col" class="text-center">Nama Siswa</th>
            <th scope="col" class="text-center">NIS</th>
            <th scope="col" class="text-center">Tugas</th>
            <th scope="col" class="text-center">UH</th>
            <th scope="col" class="text-center">UAS</th>
            <th scope="col" class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="row" class="text-center">1</td>
            <td scope="row">Dzacky</td>
            <td scope="row" class="text-center">12345678</td>
            <td scope="row" class="text-center">90</td>
            <td scope="row" class="text-center">90</td>
            <td scope="row" class="text-center">90</td>
            <td scope="row" class="text-center"><a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn"><img src="{{ asset('img/trash.svg') }}" alt=""></a></td>
        </tr>
    </tbody>
    </table>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <center>
              <div class="mt-3">
                <img src="{{ asset('img/alert_merah.svg') }}" alt="">
              </div>
          <div class="modal-body p-0">
              <p class="m-0 mt-1" style="font-weight: bold; font-size: 15px">Are you sure want to delete?</p>
              <p class="m-0 mt-1" style="font-size: 12px">Data that has been deleted cannot be restored</p>
          </div>
          <div class="p-3">
                  <button type="button" class="btn" data-bs-dismiss="modal" style="border: 1px #3182FB solid">No</button>
                  <button type="submit" class="btn btn-danger">Yes</button>
              </div>
          </center>
        </div>
      </div>
    </div>
</div>
@endsection