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
                <th scope="col" class="text-center">Tugas</th>
                <th scope="col" class="text-center">Deadline</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($data as $item)
            <tr>
                <td scope="row" class="text-center">{{$loop->iteration}}</td>
                <td scope="row" class="text-center">{{$item->subject->subject}}</td>
                <td scope="row" class="text-center">{{$item->task_score}}</td>
                <td scope="row" class="text-center">{{$item->UH}}</td>
                <td scope="row" class="text-center">{{$item->UAS}}</td>
            </tr>
            @endforeach --}}
        </tbody>
        </table>
</div>
@endsection