<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class DataController extends Controller
{
    //displays 3 random books
    public function getTopBooks() {

        return Book::where('display', true)->inRandomOrder()->take(3)->get();

    }

    //displays picked book values
    public function getBook(Book $book) {

        return Book::where(['id' => $book->id, 'display' => true])->firstOrFail();

        //return $selectedBook;

    }

    //displays 
    public function getRelatedBooks(Book $book) {

        return Book::where('display', true)->where('id', '<>', $book->id)->inRandomOrder()->take(3)->get();

        //return $books;

    }
}
