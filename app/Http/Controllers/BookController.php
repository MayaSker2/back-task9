<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
// use App\Helpers\CustomHelpers;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = cache::remember('books',60,function(){
            return Book::all();
        });
        return $books;

        $date = '2022-01-01';
        $formattedDate = formatDate($date);
        
        
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            
        ]);
        try {
            // DB::beginTransaction();

            $book = Book::create ([
                'title'=>$request->title,
                'description'  => $request->description,
            ]);

            // DB::commit();

            return response()->json([
                'status' => 'success',
                'book' => $book
            ]);
            SendEmailNotification::dispatch($email);
            $date = '2022-01-01';
            $formattedDate = formatDate($date);
            
            $book->authors()->attach($request->autor_id);
        } catch (\Throwable $th) {
            // DB::rollback();
            
            Log::error($th);
            return response()->json([
                'status' => 'error',
            ],500);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return response()->json([
            'status' => 'success',
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
