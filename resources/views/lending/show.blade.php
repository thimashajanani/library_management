@extends('layouts.layout')

@section('content')
    <div class="container">
        <h2>Book Lendings</h2>
        <a href="{{ route('lending.create') }}" class="btn btn-success mb-2">Add Book Lending</a>
        <table class="table" id="bookLendingsTable">
            <thead>
            <tr>
                <th>Member ID</th>
                <th>Book ID</th>
                <th>Lending Date</th>
                <th>Return Date</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bookLendings as $bookLending)
                <tr>
                    <td>{{ $bookLending->member_id }}</td>
                    <td>{{ $bookLending->book_id }}</td>
                    <td>{{ $bookLending->lending_date }}</td>
                    <td>{{ $bookLending->return_date }}</td>
                    <td>{{ $bookLending->status }}</td>
                    <td>{{ $bookLending->remarks }}</td>
                    <td>
                        <a href="{{ route('book-lendings.edit', $bookLending->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <button onclick="deleteBookLending({{ $bookLending->id }})" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            loadBookLendings();

            function loadBookLendings() {
                $.ajax({
                    url: "{{ route('lending.index') }}",
                    type: 'GET',
                    success: function (response) {
                        var tableBody = $('#bookLendingsTable tbody');
                        tableBody.empty();
                        response.forEach(function (bookLending) {
                            var row = '<tr>' +
                                '<td>' + bookLending.member_id + '</td>' +
                                '<td>' + bookLending.book_id + '</td>' +
                                '<td>' + bookLending.lending_date + '</td>' +
                                '<td>' + bookLending.return_date + '</td>' +
                                '<td>' + bookLending.status + '</td>' +
                                '<td>' + bookLending.remarks + '</td>' +
                                '<td>' +
                                '<a href="{{ route('lending.edit', ':id') }}" class="btn btn-primary btn-sm">Edit</a>' +
                                '<button onclick="deleteBookLending(' + bookLending.id + ')" class="btn btn-danger btn-sm">Delete</button>' +
                                '</td>' +
                                '</tr>';
                            tableBody.append(row);
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Failed to fetch book lending. Please try again.');
                    }
                });
            }

            window.deleteBookLending = function (id) {
                if (confirm('Are you sure you want to delete this record?')) {
                    $.ajax({
                        url: "{{ url('lending') }}" + '/' + id,
                        type: "DELETE",
                        success: function(response) {
                            alert('Book lending deleted successfully');
                            loadBookLendings(); // Reload book lending after deletion
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            alert('Failed to delete book lending. Please try again.');
                        }
                    });
                }
            };
        });
    </script>
@endsection
