<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();

        return view('products.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::all();
        return view('products.create', compact('categorias'));
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
            'name' => 'required|string|unique:products|min:4',
            'price' => 'required|numeric',
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'id_category' => 'required',
            'image' => 'required'
        ]);

        $producto = new Producto();
        $producto->name = $request->input('name');
        $producto->price = $request->input('price');
        $producto->amount = $request->input('amount');
        $producto->description = $request->input('description');
        $producto->id_category = $request->input('id_category');

        if($request->hasFile('image')){
            $producto->image = $request->file('image')->store('uploads', 'public');
        }

        $producto->save();

        return redirect(route('products.index'))->with('Mensaje', 'Producto creado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('products.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('products.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->name = $request->input('name');
        $producto->price = $request->input('price');
        $producto->amount = $request->input('amount');
        $producto->description = $request->input('description');
        $producto->save();

        return redirect(route('products.index'))->with('Mensaje', 'Producto modificado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Producto::destroy($id);
        }catch(Exception $e){
            return redirect(route('products.index'))->with('Mensaje', 'No se puede eliminar el producto, posee compras!');
        }
        return redirect(route('products.index'))->with('Mensaje', 'Producto eliminado con éxito!');
    }
}
