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
                <th scope="col" class="text-center">Nama Siswa</th>
                <th scope="col" class="text-center">NIS</th>
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
                    <button type="button" class="btn delete-btn" data-user-number="{{ $data->user_number }}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="{{ asset('img/trash.svg') }}" alt="">
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="{{ asset('img/alert_merah.svg') }}" alt="">
                    </div>
                    <p class="mt-3" style="font-weight: bold; font-size: 15px;">Are you sure you want to delete?</p>
                    <p style="font-size: 12px;">Data that has been deleted cannot be restored.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <!-- Formulir untuk penghapusan -->
                    <form id="delete-form" method="POST" action="{{ route('delete-student') }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="user_number" id="user-number-input">
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteButtons = document.querySelectorAll('.delete-btn');
        var deleteForm = document.getElementById('delete-form');
        var userNumberInput = document.getElementById('user-number-input');

        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var userNumber = this.getAttribute('data-user-number');
                userNumberInput.value = userNumber;
            });
        });
    });
</script>
@endsection
