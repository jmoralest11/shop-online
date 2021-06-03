<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function __construct()
    {
        // Si no existe la sesion carrito, la creamos con un array vacío
        if(!\Session::has('carrito')) {
            \Session::put('carrito', array());
        }
    }

    public function show()
    {
        // Obtenemos la información de nuestra variable de sesión carrito
        $carrito = \Session::get('carrito');    

        $total = $this->total();

        return view('index.carrito', compact('carrito', 'total'));
    }

    public function add($id_product)
    {
        // Buscamos en nuestra BD por medio del id el producto a agregar al carrito 
        $producto = Producto::where('id', $id_product)->first();

        // Obtenemos la información de nuestra variable de sesión carrito
        $carrito = \Session::get('carrito');  

        if(isset($carrito[$producto->id])){
            $carrito[$producto->id]->shop += 1;
            \Session::put('carrito', $carrito);
            return redirect(url('/show-cart'))->with('Mensaje', 'Se actualizo el Carrito!');
        }

        // Le añadimos un nuevo campo al producto que sera la cantidad a comprar inicializada en 1
        $producto->shop = 1;

        // Almacenamos en el carrito en la posicion id el producto a agregar
        $carrito[$producto->id] = $producto;

        // Actualizamos la variable de session
        \Session::put('carrito', $carrito);

        // Redireccionamos al metodo show_cart por su url
        return redirect(url('/show-cart'))->with('Mensaje', 'Se agrego al Carrito!');
    }

    public function remove($id_product)
    {
        // Buscamos en nuestra BD por medio del id el producto a agregar al carrito 
        $producto = Producto::where('id', $id_product)->first();

        // Obtenemos la información de nuestra variable de sesión carrito
        $carrito = \Session::get('carrito');

        // Unset nos permite eliminar un elemento de un array
        unset($carrito[$producto->id]);

        // Actualizamos la variable de session
        \Session::put('carrito', $carrito);

        // Redireccionamos al metodo show_cart por su url
        return redirect(url('/show-cart'))->with('Mensaje', 'Se eliminó del Carrito!');
    }

    public function update($id_product, $quantity)
    {
        $producto = Producto::where('id', $id_product)->first();

        // Obtenemos la información de nuestra variable de sesión carrito
        $carrito = \Session::get('carrito');

        if($quantity <= $producto->amount) 
        {
            // Buscamos el item en el arreglo de sesion y en su elemento cantidad agregamos la cantidad ingresada por el usuario
            $carrito[$producto->id]->shop = $quantity;
        } else {
            return redirect(url('/show-cart'))->with('Mensaje', 'Cantidad no disponible');
        }

        // Actualizamos la variable de session
        \Session::put('carrito', $carrito);

        return redirect(url('/show-cart'))->with('Mensaje', 'Se actualizo el carrito');
    }

    public function clean()
    {
        // Con el método forget eliminamos la variable de sesión 
        \Session::forget('carrito');

        return redirect(url('/show-cart'))->with('Mensaje', 'Se vacio el carrito correctamente');
    }

    private function total(){
        // Obtenemos la información de nuestro carrito y la almacenamos en una variable carrito
        $carrito = \Session::get('carrito');

        $total = 0;

        // Recorremos cada item del carrito

        foreach($carrito as $item){
            // Realizamos el total multiplicando el precio del producto y la cantidad de dicho producto
            $total += $item->price * $item->shop;
        }

        return $total;
    }

    // Informacion del pedido
    public function detail()
    {
        // Si el carrito no contiene items
        if(count(\Session::get('carrito')) <= 0){
            return redirect(url('/show-cart'))->with('Mensaje', 'No hay productos en el Carrito');
        }

        // Obtenemos la información de nuestro carrito y la almacenamos en una variable carrito
        $carrito = \Session::get('carrito');

        // Creamos una variable total que nos recibira lo que nos retorne nuestro medoto total
        $total = $this->total();

        return view('index.info', compact('carrito', 'total'));
    }

    public function data()
    {
        // Obtenemos la información de nuestro carrito y la almacenamos en una variable carrito
        $carrito = \Session::get('carrito');

        // Creamos una variable total que nos recibira lo que nos retorne nuestro medoto total
        $total = $this->total();

        return view('index.data', compact('carrito', 'total'));
    }

}
