<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // Mostrar catalogo de productos

    public function index()
    {
        $productos = Producto::all();
        
        return view('index.index', compact('productos'));
    }

    public function detail($id) 
    {
        $producto = Producto::findOrFail($id);
        return view('index.detail', compact('producto'));
    }
}
