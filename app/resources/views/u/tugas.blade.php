@extends('layout/sidebar')
@section('css')
<link rel="stylesheet" href="{{ asset('css/u/rekap.css') }}">
@endsection

@section('content')
<div class="container">
    <form action="{{ route('submittugas') }}" method="POST" id="filterForm">
        @csrf
    <div class="row">
        <div class="col-md-3">
            Tahun Ajaran/Semester<i class="fa-solid fa-asterisk fa-2xs" style="color: #f60000;"></i> 
            <select class="form-select btn-primary border-secondary" aria-label="Default select example" >
                <option selected disabled>Pilih Tahun Pelajaran</option>
                @foreach($schoolYears as $item)
                <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>
    <div class="col-md-2">
            Kelas<i class="fa-solid fa-asterisk fa-2xs" style="color: #f60000;"></i>
            <select class="form-select btn-primary border-secondary" aria-label="Default select example" >
                <option selected disabled>Pilih Kelas</option>
                @foreach($grades as $item)
                <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
    </div>
    <div class="col-md-3">
            Pilih Mata pelajaran<i class="fa-solid fa-asterisk fa-2xs" style="color: #f60000;"></i> 
            <select class="form-select btn-primary border-secondary" aria-label="Default select example" >
                <option selected disabled>Pilih Mata Pelajaran</option>
                @foreach($subjects as $item)
                <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </select>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-2">
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
      {{-- <a href="{{ route('addTugas') }}" type="button" class="btn btn-outline-dark ms-4"><i class="fa-solid fa-plus me-2"></i>Tambahkan</a> --}}

    </div>
  </div>
</form>

    {{-- buatkan if else --}}
  {{-- kalau belum ada data --}}
  <div>
    <center>
        <img src="{{ asset('img/no_data_tugas.svg') }}" alt="" class="mt-4">
    </center>
  </div>
</div>
@endsection