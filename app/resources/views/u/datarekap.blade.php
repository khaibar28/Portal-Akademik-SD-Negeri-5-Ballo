@extends('layout/sidebar')
@section('css')
<link rel="stylesheet" href="{{ asset('css/u/rekap.css') }}">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10"></div>
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
              <a href="" onclick="return confirm('Apa anda yakin untuk menghapus?')">
                <img src="{{ asset('img/trash.svg') }}" alt="">
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection