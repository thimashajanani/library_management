@extends('layouts.layout')
@section('content')

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Book Details Update</div>
                    <div class="card-body">
                        <form id="updateForm" action="{{ route('books.update', $book->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" value="{{ $book->title }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" name="author" id="author" value="{{ $book->author }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="text" name="quantity" id="quantity" value="{{ $book->quantity }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="genre">Genre</label>
                                <input type="text" name="genre" id="genre" value="{{ $book->genre }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="publication_year">Publication Year</label>
                                <input type="date" name="publication_year" id="publication_year" value="{{ $book->publication_year }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" name="isbn" id="isbn" value="{{ $book->isbn }}" class="form-control">
                            </div>
                            <button type="button" id="updateButton" class="btn btn-primary mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $('#updateButton').click(function () {
                var formData = $('#updateForm').serialize();
                $.ajax({
                    type: 'POST',
                    url : $('#updateForm').attr('action'),
                    data: formData,
                    success: function (response) {
                        Swal.fire({
                            title: 'Update Success!',
                            text: response.message,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.href = "{{route('books.index')}}"
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while updating data.',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            });
        });
    </script>
@endsection
