<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.show', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
            $book = Book::create($request->all());
            return redirect()->route('books.show');
    }

    public function show(string $id)
    {
        return view('books.view', compact('book'));
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
