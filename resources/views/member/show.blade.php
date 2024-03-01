@extends('layouts.layout')
@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        {
            font-size: 24px
        ;
            font-weight: bold
        ;
            margin-bottom: 20px
        ;
        }
    </style>

    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
    @if (Session::has('update'))
        <div class="alert alert-info">
            {{ Session::get('update') }}
        </div>
    @endif

    @if (Session::has('destroy'))
        <div class="alert alert-info">
            {{ Session::get('destroy') }}
        </div>
    @endif
    <div class="card-body">

        <br/>
        <br/>
        <div class="tableindex-responsive table table-success table-striped">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Phone Number</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->address }}</td>
                        <td>{{ $member->age }}</td>
                        <td>{{ $member->gender }}</td>
                        <td>{{ $member->phone_number }}</td>
                        <td>
                            <button class="btn btn-success btnEdit" data-id="{{ $member->id }}">Edit</button>
                            <button class="btn btn-danger btnDelete" data-id="{{ $member->id }}"
                                    onclick="return confirm('Are you sure you want to delete this book?')">Delete
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
                        $(".btnEdit").click(function () {
                            var memberId = $(this).data('id');
                            window.location.href = "{{ route('members.edit', ':id') }}".replace(':id', memberId);
                        });

                        $(".btnDelete").click(function () {
                            var memberId = $(this).data('id');
                            if (confirm('Are you sure you want to delete this book?')) {
                                $.ajax({
                                    url: "{{ route('members.destroy', ':id') }}".replace(':id', memberId),
                                    type: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success: function (response) {
                                        console.log(response);
                                        location.reload();
                                        $(this).closest('tr').remove();
                                        alert('Member deleted successfully');
                                    },
                                    error: function (xhr, status, error) {
                                        console.error(xhr.responseText);
                                        alert('Failed to delete Member. Please try again.');
                                    }
                                });
                            }
                        });
                    });
                </script>
@endsection
