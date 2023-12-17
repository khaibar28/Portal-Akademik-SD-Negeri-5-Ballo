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
        <li>{{ $grade->grade }}<span class="separator"></span></li>
      </ul>
    </div>
  </div>

  <table class="table mt-3">
    <thead>
      <tr>
        <th scope="col" class="text-center">No.</th>
        <th scope="col" class="text-center">Nama Guru</th>
        <th scope="col" class="text-center">NIP</th>
        <th scope="col" class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($filteredData as $index => $data)
      <tr>
        <td scope="row" class="text-center">{{ $index + 1 }}</td>
        <td scope="row" class="text-center">{{ $data->name }}</td>
        <td scope="row" class="text-center">{{ $data->user_number }}</td>
        <td scope="row" class="text-center">
          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $index }}">
            <img src="{{ asset('img/trash.svg') }}" alt="">
          </button>
        </td>
      </tr>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal_{{ $index }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="text-center">
                <img src="{{ asset('img/alert_merah.svg') }}" alt="">
              </div>
              <p class="mt-3" style="font-weight: bold; font-size: 15px;">Apakah Anda yakin ingin menghapus?</p>
              <p style="font-size: 12px;">Data yang dihapus tidak dapat dikembalikan.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
              <!-- Formulir untuk penghapusan -->
              <form method="POST" action="{{ route('delete-teacher') }}">
                @csrf
                @method('DELETE')
                <input type="hidden" name="user_number" value="{{ $data->user_number }}">
                <button type="submit" class="btn btn-danger">Ya</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
