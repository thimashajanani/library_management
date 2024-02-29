@extends('layouts.layout')

@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .table-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>

    <h1 class="table-header">Books</h1>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Quantity</th>
            <th>Genre</th>
            <th>Publication Year</th>
            <th>ISBN</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->quantity }}</td>
                <td>{{ $book->genre }}</td>
                <td>{{ $book->publication_year }}</td>
                <td>{{ $book->isbn }}</td>
                <td>
                    <button type="button" class="btn btn-primary btnView" data-id="{{ $book->id }}">View</button>
                    <button class="btn btn-success btnEdit" data-id="{{ $book->id }}">Edit</button>
                    <button class="btn btn-danger btnDelete" data-id="{{ $book->id }}"
                            data-title="{{ $book->title }}">Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".btnView").click(function () {
                var bookId = $(this).data('id');
                $.ajax({
                    url: "{{ route('books.show', ':id') }}".replace(':id', bookId),
                    type: 'GET',
                    success: function (response) {
                        console.log(response);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $(".btnEdit").click(function () {
                var bookId = $(this).data('id');
                window.location.href = "{{ route('books.edit', ':id') }}".replace(':id', bookId);
            });

            $(".btnDelete").click(function () {
                var bookId = $(this).data('id');
                var bookTitle = $(this).data('title');
                if (confirm('Are you sure you want to delete the book "' + bookTitle + '"?')) {
                    $.ajax({
                        url: "{{ route('books.destroy', ':id') }}".replace(':id', bookId),
                        type: 'DELETE',
                        success: function (response) {
                            console.log(response);
                            location.reload();
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
@endsection
