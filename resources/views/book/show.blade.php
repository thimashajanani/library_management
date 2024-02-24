@extends('layout')

@section('title', 'Books')

@section('content')
    <h1>Books</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add Book</a>
    <table class="table">
        <thead>
        <tr>
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
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->quantity }}</td>
                <td>{{ $book->genre }}</td>
                <td>{{ $book->publication_year }}</td>
                <td>{{ $book->isbn }}</td>
                <td>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-success">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
