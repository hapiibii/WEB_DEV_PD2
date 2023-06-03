<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //display all genres
    public function list() {
        
        $items = Genre::orderBy('name', 'asc')->get();

        return view('genre.list', ['title' => 'Genres', 'items' => $items]);

    }

    public function create() {

        //display new genre form
        return view('genre.form', ['title' => 'Add new genre', 'genre' => new Genre(), ]);
    }

    //save new genre
    public function put(Request $request) {
        
        $validatedData = $request->validate(['name' => 'required', ]);

        $genre = new genre();
        $genre->name = $validatedData['name'];
        $genre->save();

        return redirect('/genres');
    }

    //diaplay genre update form
    public function update(Genre $genre) {
        return view('genre.form', ['title' => 'Edit genre', 'genre' => $genre, ]);
    }

    //save the edit
    public function patch(Genre $genre, Request $request) {
        $validatedData = $request->validate(['name' => 'required', ]);

        
        $genre->name = $validatedData['name'];
        $genre->save();

        return redirect('/genres');
    }

    //delete genres
    public function delete(Genre $genre) {
        $genre->delete();
        return redirect('/genres');
    }
}
