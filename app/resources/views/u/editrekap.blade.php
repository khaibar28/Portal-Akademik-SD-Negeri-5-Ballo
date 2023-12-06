@extends('layout/sidebar')
@section('css')
<link rel="stylesheet" href="{{ asset('css/u/rekap.css') }}">
<link rel="stylesheet" href="{{ asset('css/u/breadcrump.css') }}">
<style>
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
input[type=number] {
  -moz-appearance: textfield;
}
</style>
@endsection

@section('content')
<form id="filter" method="POST" action="{{ route('rekap.store') }}">
@csrf
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
      @foreach($filteredData as $item)
        <tr>
            <td scope="row" class="text-center">{{ $loop->iteration }}</td>
            <td scope="row">{{ $item->name }}</td>
            <td scope="row" class="text-center">{{ $item->user_number }}</td>
            <td scope="row" class="text-center" style="width: 15%"><input name='task_score[]'class="text-center" type="number" min="0" style="width: 25%" value="{{ $item->task_score }}"></td>
            <td scope="row" class="text-center" style="width: 15%"><input name='UH[]'class="text-center" type="number" min="0" style="width: 25%" value="{{ $item->UH }}"></td>
            <td scope="row" class="text-center" style="width: 15%"><input name='UAS[]' class="text-center" type="number" min="0" style="width: 25%" value="{{ $item->UAS }}"></td>
        </tr>
        <input type='hidden' name='user_number[]' value='{{ $item->user_number }}'>
        @endforeach
    </tbody>
    </table>
</div>
</form>
@endsection
