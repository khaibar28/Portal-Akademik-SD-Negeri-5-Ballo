@extends('layout/sidebar')
@section('css')
<link rel="stylesheet" href="{{ asset('css/u/rekap.css') }}">
@endsection

@section('content')
<div class="container">
  <form id="filterForm" method="POST" action="{{ route('submitFilter') }}">
    @csrf
    <div class="row">
      <div class="col-md-3">
        Tahun Ajaran/Semester<i class="fa-solid fa-asterisk fa-2xs" style="color: #f60000;"></i> 
        <select name='school_year' class="form-select btn-primary border-secondary" aria-label="Default select example" >
          <option selected disabled>Pilih Tahun Pelajaran</option>
          @foreach ($schoolYears as $school_year)
          <option value="{{ $school_year }}"> {{ $school_year }} </option>
          @endforeach
        </select>
      </div>
      <div class="col-md-2">
        Kelas<i class="fa-solid fa-asterisk fa-2xs" style="color: #f60000;"></i>
        <select name='grade' class="form-select btn-primary border-secondary" aria-label="Default select example" >
          <option selected disabled>Pilih Kelas</option>
          @foreach ($grades as $grade)
          <option value="{{ $grade }}">{{ $grade }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-3">
        Pilih Mata pelajaran<i class="fa-solid fa-asterisk fa-2xs" style="color: #f60000;"></i> 
        <select name='subject' class="form-select btn-primary border-secondary" aria-label="Default select example" >
          <option selected disabled>Pilih Mata Pelajaran</option>
          @foreach ($subjects as $subject)
          <option value="{{ $subject }}">{{ $subject }}</option>
          @endforeach
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
  </form>

  {{-- Tampilkan data jika sudah ada --}}
  @if(isset($filteredData) && count($filteredData) > 0)
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
              <a href="" onclick="return confirm('Apa anda yakin untuk menghapus?')">
                <img src="{{ asset('img/trash.svg') }}" alt="">
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    {{-- Tampilkan pesan jika data belum ada --}}
    <div>
      <center>
        <img src="{{ asset('img/no_data.svg') }}" alt="" class="mt-4">
      </center>
    </div>
  @endif
</div>
@endsection