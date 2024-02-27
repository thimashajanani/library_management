@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Book Details Update</div>
                    <div class="card-body">
                        {{--                       <form action="{{ url('students/' . $student->id) }}" method="post" id="updateForm">--}}
                        <form action="{{ route('books.update', $book->id) }}" method="POST" id="updateForm">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" name="title" id="title" value="{{ $book->title}}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="full_name">Author</label>
                                < <input type="text" name="author" id="author" value="{{ $book->author}}"
                                         class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="dob">Quantity</label>
                                <input type="text" name="name" id="name" value="{{ $book->name ?? ''}}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="address">Genre</label>
                                <input type="text" name="name" id="name" value="{{ $book->name ?? ''}}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="contact">Publication Year</label>
                                <input type="text" name="name" id="name" value="{{ $book->name ?? ''}}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">ISBN</label>
                                <input type="text" name="name" id="name" value="{{ $book->name ?? ''}}"
                                         class="form-control">
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
                    url: $('#updateForm').attr('action'),
                    data: formData,
                    success: function (response) {
                        Swal.fire({
                            title: 'Update Success!',
                            text: response.message,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            //
                            window.location.href = "{{route('students.index')}}"
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


