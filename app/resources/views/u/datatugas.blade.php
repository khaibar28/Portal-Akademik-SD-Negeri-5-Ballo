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
                <li>{{ $schoolYear }}<span class="separator"> | </span></li>
                <li>{{ $grade }}<span class="separator"> | </span></li>
                <li>{{ $subject }}<span class="separator"> | </span></li>
            </ul>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2">
            <a href="{{ route('addTugas') }}" type="button" class="btn btn-outline-dark ms-4"><i class="fa-solid fa-plus me-2"></i>Tambahkan</a>
        </div>
    </div>

    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col" class="text-center">No.</th>
                <th scope="col" class="text-center">Deskripsi Tugas</th>
                <th scope="col" class="text-center">Deadline</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($filteredData as $index => $data)
            <tr>
                <td scope="row" class="text-center">{{ $index + 1 }}</td>
                <td scope="row">{{ strip_tags($data->task_description)}} </td>
                <td scope="row" class="text-center">{{ $data->deadline}} </td>
                <td scope="row" class="text-center">
                    <a href="{{ route('edittugas', $data->id) }}" class="btn"><img src="{{ asset('img/edit.svg') }}" alt=""></a>
                    <button type="button" class="btn delete-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        data-task-id="{{ $data->id }}" style=""><img src="{{ asset('img/trash.svg') }}" alt=""></button>
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
                        <button type="submit" form="delete-form" class="btn btn-danger">Yes</button>
                    </div>
                </center>
            </div>
        </div>
    </div>

    <form id="delete-form" method="POST" action="{{ route('delete-tugas', ['id' => 1]) }}" class="m-0 p-0">
        @csrf
        @method('DELETE')
        <input type="hidden" name="task_id" id="task-id-input">
    </form>
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteButtons = document.querySelectorAll('.delete-btn');
        var deleteForm = document.getElementById('delete-form');
        var taskIdInput = document.getElementById('task-id-input');

        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                 var taskId = this.getAttribute('data-task-id');
                taskIdInput.value = taskId;
                $('#exampleModal').modal('hide'); // Menutup modal setelah mengisi nilai task ID
                });
        });
    });
</script>
@endsection
