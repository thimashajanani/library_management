<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookLending;
use Illuminate\Http\Request;

class BookLendingController extends Controller
{
    public function index()
    {
        $bookLendings = BookLending::all();
        return response()->json($bookLendings);
    }

    public function create()
    {
        $books= Book::all();
//        dd($books);
        return view('lending.create',['books'=>$books]);
    }

    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_ids' => 'required|array|max:3',
            'book_ids.*' => 'required|exists:books,id',
            'lending_date' => 'required|date',
            'return_date' => 'required|date',
            'status' => 'required',
            'remarks' => 'nullable',
        ]);

        try {
            // Start a database transaction
            DB::beginTransaction();

            // Create BookLending instance
            $bookLending = BookLending::create([
                'member_id' => $validatedData['member_id'],
                'lending_date' => $validatedData['lending_date'],
                'return_date' => $validatedData['return_date'],
                'status' => $validatedData['status'],
                'remarks' => $validatedData['remarks'],
            ]);

            // Attach selected books to the book lending
            $bookLending->books()->attach($validatedData['book_ids']);

            // Commit the transaction
            DB::commit();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Rollback the transaction in case of any exception
            DB::rollback();

            // Handle any exceptions
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function show(BookLending $bookLending)
    {
        return view('lending.show', compact('bookLending'));
    }

    public function edit(BookLending $bookLending)
    {
        return view('lending.edit', compact('bookLending'));
    }

    public function update(Request $request, BookLending $bookLending)
    {
        $bookLending->update($request->all());
        return response()->json(['success' => true]);
    }

    public function destroy(BookLending $bookLending)
    {
        $bookLending->delete();
        return response()->json(['success' => true]);
    }
}
