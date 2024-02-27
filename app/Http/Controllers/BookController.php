<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
//            $book = Book::create($request->all());
//            return redirect()->route('books.show');

//        dd($request->all());
        try {
            $bookData = $request->only([
                'title','author','quantity','genre','publication_year','isbn']);
            return response()->json(['success' => true, 'message' => 'Book is Sucessfully Added!', 'book_id' => $book->id]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'error' => $exception->getMessage()]);
        }
    }

    public function show($id)
    {
        $book = Book::find($id);
        return view('book.view', ['book' => $book])->with('books', $book);
    }

    public function edit(string $id)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, string $id)
    {
        $book->update($request->all());
        return redirect()->route('books.show');
    }

    public function destroy(string $id)
    {
        $book->delete();
        return redirect()->route('books.show');
    }
}
