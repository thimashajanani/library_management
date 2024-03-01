@extends('layouts.layout')

@section('content')
    <div class="container">
        <h2>Edit Book Lending</h2>
        <form id="editForm" data-id="{{ $bookLending->id }}">
            <div class="form-group">
                <label for="member_id">Member ID:</label>
                <input type="text" class="form-control" id="member_id" name="member_id" value="{{ $bookLending->member_id }}">
            </div>
            <div class="form-group">
                <label for="book_id">Book ID:</label>
                <input type="text" class="form-control" id="book_id" name="book_id" value="{{ $bookLending->book_id }}">
            </div>
            <div class="form-group">
                <label for="lending_date">Lending Date:</label>
                <input type="date" class="form-control" id="lending_date" name="lending_date" value="{{ $bookLending->lending_date }}">
            </div>
            <div class="form-group">
                <label for="return_date">Return Date:</label>
                <input type="date" class="form-control" id="return_date" name="return_date" value="{{ $bookLending->return_date }}">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="status" name="status" value="{{ $bookLending->status }}">
            </div>
            <div class="form-group">
                <label for="remarks">Remarks:</label>
                <input type="text" class="form-control" id="remarks" name="remarks" value="{{ $bookLending->remarks }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
