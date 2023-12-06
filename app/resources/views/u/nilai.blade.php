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
        @foreach ($schoolYears as $school_year)
        <option value={{ $school_year }}>{{ $school_year }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-2">
      Kelas<i class="fa-solid fa-asterisk fa-2xs" style="color: #f60000;"></i>
      <select class="form-select btn-primary border-secondary" aria-label="Default select example" >
        <option selected disabled>Pilih Kelas</option>
       @foreach ($grades as $grade)
        <option value={{ $grade }}>{{ $grade }}</option>
       @endforeach
        </select>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-2"></div>
    <div class="col-md-2">
      <br>
      @can('admin')
      <button type="submit" class="btn btn-primary ms-2">Konfirmasi</button>
      @endcan
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
