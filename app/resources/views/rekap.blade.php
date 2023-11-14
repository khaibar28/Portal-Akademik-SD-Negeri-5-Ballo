@extends('layout/sidebar')
@section('css')
<link rel="stylesheet" href="{{ asset('css/u/rekap.css') }}">
@endsection
@section('content')
<div class="container">
    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col" class="text-center">No.</th>
                <th scope="col" class="text-center">Nama Mata Pelajaran</th>
                <th scope="col" class="text-center">Tugas</th>
                <th scope="col" class="text-center">UH</th>
                <th scope="col" class="text-center">UAS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row" class="text-center">1</td>
                <td scope="row">Matematika</td>
                <td scope="row" class="text-center">90</td>
                <td scope="row" class="text-center">90</td>
                <td scope="row" class="text-center">90</td>
            </tr>
        </tbody>
        </table>
</div>
@endsection