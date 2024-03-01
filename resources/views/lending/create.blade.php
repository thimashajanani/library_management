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
        <h2>Create Book Lending</h2>
        <form id="createForm">
            <div class="form-group">
                <label for="member_id">Member ID:</label>
                <select class="form-control" id="member_id" name="member_id">
                    <!-- Members will be loaded dynamically via AJAX -->
                </select>
            </div>
            <div id="bookFields">
                <div class="form-group">
                    <label for="book_id">Book 1:</label>
                    <select class="form-control book-select" name="book_ids[]" required>
                        <!-- Books will be loaded dynamically via AJAX -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="book_id">Book 2:</label>
                    <select class="form-control book-select" name="book_ids[]">
                        <!-- Books will be loaded dynamically via AJAX -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="book_id">Book 3:</label>
                    <select class="form-control book-select" name="book_ids[]">
                        <!-- Books will be loaded dynamically via AJAX -->
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="lending_date">Lending Date:</label>
                <input type="date" class="form-control" id="lending_date" name="lending_date" required>
            </div>
            <div class="form-group">
                <label for="return_date">Return Date:</label>
                <input type="date" class="form-control" id="return_date" name="return_date" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="status" name="status" required>
            </div>
            <div class="form-group">
                <label for="remarks">Remarks:</label>
                <input type="text" class="form-control" id="remarks" name="remarks">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function () {
            // Load members
            $.ajax({
                url: "{{ route('members.index') }}",
                type: "GET",
                success: function (response) {
                    var memberSelect = $('#member_id');
                    $.each(response, function (index, member) {
                        memberSelect.append('<option value="' + member.id + '">' + member.id + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching members: " + error);
                }
            });

            // Load books
            $.ajax({
                url: "{{ route('books.index') }}",
                type: "GET",
                success: function (response) {
                    $('.book-select').empty(); // Clear existing options
                    $('.book-select').append('<option value="" disabled selected>Select a book</option>');
                    $.each(response, function (index, book) {
                        $('.book-select').append('<option value="' + book.id + '">' + book.title + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching books: " + error);
                }
            });

            // Handle form submission
            $('#createForm').submit(function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('lendings.store') }}",
                    type: "POST",
                    data: formData,
                    success: function (response) {
                        // Show sweet alert message upon success
                        if (response.success) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'Book lending created successfully',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        } else {
                            console.error("Error creating book lending: " + response.error);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Error creating book lending: " + error);
                    }
                });
            });
        });
    </script>
@endsection
