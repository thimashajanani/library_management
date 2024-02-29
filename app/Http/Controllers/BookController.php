<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('book.show', compact('books'));
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(Request $request)
    {
        try {
            $bookData = $request->only([
                'title', 'author', 'quantity', 'genre', 'publication_year', 'isbn'
            ]);
            $book = Book::create($bookData);
            return response()->json(['success' => true, 'message' => 'Book is Successfully Added!', 'book_id' => $book->id]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'error' => $exception->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $book = Book::findOrFail($id);
            return response()->json($book);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Book not found']);
        }
    }

    public function edit($id)
    {
        try {
            $book = Book::findOrFail($id);
            return view('book.edit', compact('book'));
        } catch (\Exception $exception) {
            return back()->with('error', 'Failed to fetch book details.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->update($request->all());
            return redirect()->route('books.show', $book->id)->with('success', 'Book updated successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Failed to update Book details. Please try again.');
        }
    }

    public function destroy($id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->delete();
            return response()->json(['message' => 'Book deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete book.']);
        }
    }

}
