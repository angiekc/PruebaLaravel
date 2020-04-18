<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;

class MovieController extends Controller
{
        public function index() 
    {    
        $movies = Movie::all();
        return \View::make('movies/list',compact('movies'));
    }
///holll
	//Método para cargar vista New en la carpeta movies
	public function create() 
    {  
        $categories = Category::all();
		return \View::make('movies/new',compact('categories'));
	}

	//Método Guardar Movie
    public function store(Request $request) 
    {
        $movie = $this->saveMovie($request);
        $this->saveMovieCategory($request->listCategories,$movie);
    }

    public function saveMovie($request) 
    {
        $movie = new Movie;
        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->user_id = \Auth::user()->id;
        $movie->state_id = 1;
        $movie->save();
        return $movie;
    }

    public function saveMovieCategory($listCategories,$movie) 
    {
        foreach ($listCategories as $category) 
            $movie->categories()->attach(
                $category['id'],
                ['state_id' => 1]
            );
    }

    //Método para cargar vista Update en la carpeta movies
    public function edit($id) 
    {
        $movie = Movie::find($id);
        return \View::make('movies/update', compact('movie'));
    }

    //Método Editar Movie
    public function update($id, Request $request) 
    {
        $movie = Movie::find($id);
        $movie->name = $request->name;
        $movie->description = $request->description;
        $movie->save();
        return redirect('admin/movie');
    }

    //Método para eliminar movie
    public function destroy($id) 
    {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect()->back();
    }

    //Método para filtrar nombre de la movie por coincidencia
    public function show(Request $request) 
    {
        $movies = Movie::where('name','like','%'.$request->name.'%')->get();
        return \View::make('movies/list',compact('movies'));        
    }
}
