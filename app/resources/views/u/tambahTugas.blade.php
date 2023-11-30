@extends('layout/sidebar')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/u/rekap.css') }}">
@endsection

@section('content')
    <form id="filter" method="POST" action="{{ route('addTugas.store') }}">
        <div class="container">
            @csrf
            <div class="row">
                <div class="mb-3">
                    Deskripsi Tugas<i class="fa-solid fa-asterisk fa-2xs" style="color: #f60000;"></i>
                    <textarea id="summernote" name="task_description"></textarea>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="mb-1">
                    Deadline<i class="fa-solid fa-asterisk fa-2xs" style="color: #f60000;"></i>
                </div>
                <br>
                <div class="col-md-3">
                    <input name='deadline' type="date" id="datepicker" class="form-control border-secondary"
                        placeholder="Input Date and Time" aria-describedby="basic-addon1">
                    {{-- <img src="{{ asset('img/date.svg') }}" alt=""> --}}
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-1">
                    <a href="{{ route('tugas') }}" type="button" class="btn btn-light"
                        style="box-shadow: 0px 4px 4px 0px #00000040; border-radius: 12px; color:#3182FB">Batal</a>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        style="box-shadow: 0px 4px 4px 0px #00000040; border-radius: 12px">Simpan</button>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <center>
                                <div class="mt-3">
                                    <img src="{{ asset('img/alert_biru.svg') }}" alt="">
                                </div>
                                <div class="modal-body p-0">
                                    <p class="m-0 mt-1" style="font-weight: bold; font-size: 15px">Are you sure want to
                                        saving?</p>
                                    <p class="m-0 mt-1" style="font-size: 12px">Are you sure want to saving?</p>
                                </div>
                                <div class="p-3">
                                    <button type="button" class="btn" data-bs-dismiss="modal"
                                        style="border: 1px #3182FB solid">No</button>
                                    <button type="submit" class="btn btn-primary">Yes</button>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Masukkan Deskripsi Tugas',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

    </script>
    <script>
        flatpickr('#datepicker', {
            enableTime: false,
            dateFormat: "d-m-Y"
        });
    </script>
    <script src="assets/vendor/libs/flatpickr/flatpickr.js"></script>
@endsection
