@extends('layout')

@section('title', 'Book Details')

@section('content')
    <h1>Book Details</h1>
    <table class="table">
        <tr>
            <th>Title</th>
            <td>{{ $book->title }}</td>
        </tr>
        <tr>
            <th>Author</th>
            <td>{{ $book->author }}</td>
        </tr>
        <tr>
            <th>Quantity</th>
            <td>{{ $book->quantity }}</td>
        </tr>
        <tr
