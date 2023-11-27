@extends('layout/sidebar')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/u/rekap.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="mb-3">
            Deskripsi Tugas<i class="fa-solid fa-asterisk fa-2xs" style="color: #f60000;"></i> 
            <div id="summernote"></div>
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
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]]});
                </script>
        </div>
    </div>
</div>
<div class="container">    
    <div class="row">
        <div class="mb-3">
            Deadline<i class="fa-solid fa-asterisk fa-2xs" style="color: #f60000;"></i> 
            <br>
            <div class="col-md-3">
                <input name='deadline' type="date" id="datepicker" class="form-control border-secondary"
                placeholder="Input Date and Time" aria-describedby="basic-addon1">
            </div>

            <script src="https://cdn.jsdelivr.net/npm/flatpickr">
            
            </script> 
                <script>
                    flatpickr('#datepicker', {    
                    enableTime: false, 
                    dateFormat: "d-m-Y"
                });
            </script>
        </div>
    </div>    
</div>    

<script src="assets/vendor/libs/flatpickr/flatpickr.js"></script>
@endsection

