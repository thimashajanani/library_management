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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Member</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('members.store') }}" id="myForm2" >
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="text" name="quantity" id="age" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="number">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Member</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#myForm2').submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    success: function (response) {
                        Swal.fire({
                            title: 'Successfully',
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
                            location.reload();
                        });
                    }
                });
            });
        });
    </script>
@endsection

