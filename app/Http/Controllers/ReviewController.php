<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
       $book=Book::where('id',$request->book_id)->first(); 
       $book->reviews()->create([
        'review'=>$request->review,
       ]);
    }
}
