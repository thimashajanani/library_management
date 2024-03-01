<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'age',
        'gender',
        'phone_number',
    ];
    public function bookLendings() {
        return $this->hasMany(BookLending::class);
    }
    public function index()
    {
        $members = Member::all();
        return response()->json($members);
    }
}
