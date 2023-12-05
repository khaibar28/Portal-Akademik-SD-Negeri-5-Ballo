@extends('layout/sidebar')
@section('css')
<link rel="stylesheet" href="{{ asset('css/u/rekap.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            Kelas<i class="fa-solid fa-asterisk fa-2xs" style="color: #f60000;"></i>
            <select name='grade' class="form-select btn-primary border-secondary" aria-label="Default select example" >
              <option selected disabled>Pilih Kelas</option>
              {{-- @foreach ($dataClass as $item)
              <option value="{{ $item }}">Kelas {{ $item }}</option>
              @endforeach --}}
            </select>
          </div>
          <div class="col-md-2">
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
    <table class="table mt-2">
        <thead>
            <tr>
                <th scope="col" class="text-center">No.</th>
                <th scope="col" class="text-center">Tugas</th>
                <th scope="col" class="text-center">Deadline</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row" class="text-center">1</td>
                <td scope="row" class="text-center">Tugas 1</td>
                <td scope="row" class="text-center">Besok</td>
            </tr>
        </tbody>
        </table>
</div>
@endsection