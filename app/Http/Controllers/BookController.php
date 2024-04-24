<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\BookDetail;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.book.index', [
            'books' => Book::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.book.create', [
            'books' => Book::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $validatedBook = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'description' => 'required',
        ]);

        Book::create($validatedBook);

        $bookId = Book::latest()->first()->id;

        $validatedDetail = [
            'book_id' => $bookId,
            'availability' => 'available',
        ];

        for ($i = 1; $i <= $request['stock']; $i++) {
            BookDetail::create($validatedDetail);
        }

        return redirect('/book');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('pages.book.show', [
            'book' => $book,
            'bookdetails' => BookDetail::where('book_id', $book->id)->get(),
            'total_stock' => count(BookDetail::where('book_id', $book->id)->get()),
            'available_stock' => count(BookDetail::where('book_id', $book->id)->where('availability', 'available')->get()),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('pages.book.edit', [
            'categories' => Category::all(),
            'books' => Book::all(),
            'book' => $book,
            'total_stock' => count(BookDetail::where('book_id', $book->id)->get()),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'description' => 'required',
        ]);

        $book->update($validatedData);

        $bookStock = count(BookDetail::where('book_id', $book->id)->get());

        // dd($book->id);

        if ($request['stock'] > $bookStock) {
            for ($i = 1; $i <= $request['stock'] - $bookStock; $i++) {
                BookDetail::create([
                    'book_id' => $book->id,
                    'availability' => 'available'
                ]);
            }
        } else {
            // dd($bookStock - $request['stock']);
            for ($i = 1; $i <= $bookStock - $request['stock']; $i++) {
                BookDetail::where('book_id', $book->id)->where('availability', 'available')->latest()->first()->delete();
            }
        }

        return redirect('/book/' . $book->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        $bookStock = count(BookDetail::where('book_id', $book->id)->get());

        for ($i = 1; $i <= $bookStock; $i++) {
            BookDetail::where('book_id', $book->id)->first()->delete();
        }

        return redirect('/book');
    }
}
