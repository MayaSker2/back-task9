<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = cache::remember('authors',60,function(){
            return Author::all();
        });
        return $authors;
     
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

            $author = Author::create ([
                'name'  => $request->name,
                'bio'=>$request->bio,
            ]);

            // DB::commit();

            return response()->json([
                'status' => 'success',
                'author' => $author
            ]);
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
    public function show(Author $author)
    {
        return response()->json([
            'status' => 'success',
            'author' => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return response() ->json([
            'status' => 'success',
        ]);
    }
}
