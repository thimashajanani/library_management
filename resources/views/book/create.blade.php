@extends('layouts.style')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Book</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('books.store') }}" method="POST" id="myForm">>
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" id="author" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="text" name="quantity" id="quantity" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <input type="text" name="genre" id="genre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="publication_year">Publication Year</label>
                            <input type="number" name="publication_year" id="publication_year" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input type="text" name="isbn" id="isbn" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('style')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#myForm').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    success: function (response) {
                        Swal.fire({
                            title: 'Sucessfully',
                            text: response.message,
                            icon: 'success',
                            showCancelButton: true,
                            confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                            cancelButtonClass: 'btn btn-danger w-xs mt-2',
                            buttonsStyling: false,
                            showCloseButton: true
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            html: '<div class="mt-3">' + '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop" colors="primary:#f06548,secondary:#f7b84b" style="width:120px;height:120px"></lord-icon>' + '<div class="mt-4 pt-2 fs-15">' + '<h4>' + JSON.parse(xhr.responseText).message + ' !</h4>' + '</div>' + '</div>',
                            showCancelButton: true,
                            showConfirmButton: false,
                            cancelButtonClass: 'btn btn-primary w-xs mb-1',
                            cancelButtonText: 'Dismiss',
                            buttonsStyling: false,
                            showCloseButton: true
                        }).then(() => {
                            // location.reload();
                        });
                    }
                });
            });
        });
    </script>
@endsection
