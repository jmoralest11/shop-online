<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Category::all();
        return view('categories.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories',
            'description' => 'required|string'
        ]);

        $categoria = new Category();
        $categoria->name = $request->input('name');
        $categoria->description = $request->input('description');
        $categoria->save();

        return redirect(route('categories.index'))->with('Mensaje', 'Categoría creada con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Category::findOrFail($id);
        return view('categories.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Category::findOrFail($id);
        return view('categories.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Category::findOrFail($id);
        $categoria->name = $request->input('name');
        $categoria->description = $request->input('description');
        $categoria->save();

        return redirect(route('categories.index'))->with('Mensaje', 'Categoría modificada con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Category::destroy($id);
        }catch(Exception $e){
            return redirect(route('categories.index'))->with('Mensaje', 'No se puede eliminar la categoría, está ligada a productos');
        }
        return redirect(route('categories.index'))->with('Mensaje', 'Categoría eliminada con éxito!');
    }
}
