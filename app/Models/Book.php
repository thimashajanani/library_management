<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'quantity',
        'genre',
        'publication_year',
        'isbn',
        ];
    public function bookLendings() {
        return $this->hasMany(BookLending::class);
    }

    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }
}
