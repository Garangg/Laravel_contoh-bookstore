<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Books as BookResourceCollection;
use App\Http\Resources\Book as BookResource;
use App\Models\Book;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function top($count)
    {
        $criteria = Book::select('*')
            ->orderBy('views','DESC')
            ->limit($count)
            ->get();
        return new BookResourceCollection($criteria);
    }

    public function index(){
        $criteria = Book::paginate(4);
        return new BookResourceCollection($criteria);
    }

    public function slug($slug) {
        $criteria = Book::where('slug',$slug)->first();
        return new BookResource($criteria);
    }
    
    public function search ($keyword){
        $criteria = Book::select ('*')
            ->where('title', 'Like', "%". $keyword. "%")
            ->orderBy('views', 'DESC')
            ->get();
        return new BookResourceCollection($criteria);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $books = Book::find($id);
        return $books;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
