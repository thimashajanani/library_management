@extends('layout')

@section('title', 'Members')

@section('content')
    <h1>Books</h1>
    <a href="{{ route('members.create') }}" class="btn btn-primary mb-3">Add Member</a>
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
        @foreach($members as $member)
            <tr>
                <td>{{ $member->title }}</td>
                <td>{{ $member->author }}</td>
                <td>{{ $member->quantity }}</td>
                <td>{{ $member->genre }}</td>
                <td>{{ $member->publication_year }}</td>
                <td>{{ $member->isbn }}</td>
                <td>
                    <a href="{{ route('$members.show', $member->id) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('$members.edit', $member->id) }}" class="btn btn-success">Edit</a>
                    <form action="{{ route('$members.destroy', $member->id) }}" method="POST" style="display: inline;">
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
