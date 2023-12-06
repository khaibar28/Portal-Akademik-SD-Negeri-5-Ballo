@extends('layout/sidebar')
@section('css')
<link rel="stylesheet" href="{{ asset('css/u/rekap.css') }}">
<link rel="stylesheet" href="{{ asset('css/u/breadcrump.css') }}">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <ul class="breadcrumb">
      <li>{{ $schoolYear->school_year }}<span class="separator"> | </span></li>
      <li>{{ $grade->grade }}<span class="separator"> | </span></li>
      <li>{{ $subject->subject }}<span class="separator"> | </span></li>
    </ul>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
    <div class="col-md-2">
      <a href="{{ route('editrekap') }}" type="button" class="btn btn-warning ms-4">Edit Data</a>
    </div>
  </div>

    <table class="table mt-3">
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

        @foreach($filteredData as $index => $data)
          <tr>
            <td scope="row" class="text-center">{{ $index + 1 }}</td>
            <td scope="row">{{ $data->name }}</td>
            <td scope="row" class="text-center">{{ $data->user_number }}</td>
            <td scope="row" class="text-center">{{ $data->task_score }}</td>
            <td scope="row" class="text-center">{{ $data->UH }}</td>
            <td scope="row" class="text-center">{{ $data->UAS }}</td>
            <td scope="row" class="text-center">
              {{-- perlu diperabiki utk trigger modal + blm buat modal --}}
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal"
                      style=""><img src="{{ asset('img/trash.svg') }}" alt="">
              </button>
            </td>
          </tr>
        @endforeach
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
                      <button type="button" class="btn" data-bs-dismiss="modal"
                          style="border: 1px #3182FB solid">No</button>
                      <button type="submit" class="btn btn-danger">Yes</button>
                  </div>
              </center>
          </div>
      </div>
  </div>
</div>
@endsection
