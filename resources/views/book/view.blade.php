@extends('layouts.app')

@section('content')
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
                                                <li class="list-group-item"><strong>Title:</strong> {{ $member->title}}</li>
                                                <li class="list-group-item"><strong>Author:</strong> {{ $member->author }}</li>
                                                <li class="list-group-item"><strong>Genre:</strong> {{ $member->quantity }}</li>
                                                <li class="list-group-item"><strong>Publication Year</strong> {{ $member->genre }}</li>
                                                <li class="list-group-item"><strong>ISBN </strong> {{ $member->publication_year }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
