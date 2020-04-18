<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\State;

class CategoryController extends Controller
{
    //Método cargar Lista de Categorias
    public function index() {
        $categories = Category::all();
        return \View::make('categories/list',compact('categories'));
    }

	//Método para cargar vista New en la carpeta categories
	public function create() {
		return \View::make('categories/new');
	}

	//Método Guardar category
    public function store(Request $request) {
    	$category = new Category;
        $category->name = $request->name;
    	$category->state_id = 1;        
    	$category->save();
    	return;
    }

    //Método para cargar vista Update en la carpeta categories
    public function edit($id) {
        $category = Category::find($id);
        $states = State::select('id','state')->get();
        return \View::make('categories/update', compact('category','states'));
    }

    //Método Editar category
    public function update(Request $request) {        
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->state_id = $request->state;        
        $category->save();
        return;
    }

    //Método para eliminar category
    public function destroy($id) {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }

    //Método para filtrar nombre de la category por coincidencia
    public function show(Request $request) {
        $categories = Category::where('name','like','%'.$request->name.'%')->get();
        return \View::make('categories/list',compact('categories'));        
    }
}
