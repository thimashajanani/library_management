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
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Book Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card bg-light mb-3">
                                    <div class="card-header">Book Details</div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><strong>Title:</strong> {{ $book->title}}</li>
                                                <li class="list-group-item"><strong>Author:</strong> {{ $book->author }}</li>
                                                <li class="list-group-item"><strong>Quantity:</strong> {{ $book->quantity }}</li>
                                                <li class="list-group-item"><strong>Genre</strong> {{ $book->genre }}</li>
                                                <li class="list-group-item"><strong>Publication Year </strong> {{ $book->publication_year }}</li>
                                                <li class="list-group-item"><strong>ISBN </strong> {{ $book->isbn }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
