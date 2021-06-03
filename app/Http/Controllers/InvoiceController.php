<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Invoice_Items;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class InvoiceController extends Controller
{
    public function process(Request $request)
    {
        $this->invoice($request);

        \Session::forget('carrito');

        return redirect(url('show-products'))->with('Mensaje', 'Facturación Completada');
    }

    public function invoice($request) 
    {
        $subtotal = 0;

        $carrito = \Session::get('carrito');

        foreach($carrito as $item) 
        {
            $subtotal += $item->price * $item->shop;
        }

        $new_invoice = new Invoice();
        $new_invoice->id_user = Auth::user()->id;
        $new_invoice->total = $subtotal;
        $new_invoice->address = $request->input('address');
        $new_invoice->phone = $request->input('phone');
        $new_invoice->condition = 'SIN ENVIAR';
        if($request->input('description'))
        {
            $new_invoice->description = $request->input('description');
        } else {
            $new_invoice->description = "Sin observaciones.";
        }
        $new_invoice->save();

        foreach($carrito as $item)
        {
            $this->invoices_items($item, $new_invoice->id);
        }
    }

    public function invoices_items($item, $id_invoice)
    {
        $iterator = 0;
        $user = User::findOrFail(Auth::user()->id);
        $product = Producto::findOrFail($item->id);
        $new_invoice_items = new Invoice_Items();
        $new_invoice_items->id_invoice = $id_invoice;
        $new_invoice_items->id_product = $item->id;
        $new_invoice_items->price = $item->price;
        $new_invoice_items->amount = $item->shop;
        $product->amount -= $item->shop;
        $product->save();
        $new_invoice_items->save();
    }

    public function shows()
    {
        if(Auth::user()->role == 'user')
        {
            $shops = Invoice::where('id_user', Auth::user()->id)->get();
        } else if (Auth::user()->role == 'admin')
        {
            $shops = Invoice::all();
        }

        return view('invoices.index', compact('shops'));
    }

    public function show($id)
    {
        $invoice = Invoice::where('id', $id)->first();
        $products = Invoice_Items::where('id_invoice', $id)->get();
    
        return view('invoices.detail', compact('invoice', 'products'));
    }

    public function pdf($id)
    {
        $invoice = Invoice::where('id', $id)->first();
        $products = Invoice_Items::where('id_invoice', $id)->get();
        $pdf = \PDF::loadView('pdf.invoice', compact('invoice', 'products'));
        return $pdf->download('Invoice.pdf');
    }

    public function edit($id)
    {
        $invoice = Invoice::where('id', $id)->first();
        
        if($invoice->condition == 'SIN ENVIAR')
        {
            $invoice->condition = 'ENVIADO';
        } else {
            $invoice->condition = 'SIN ENVIAR';
        }

        $invoice->save();

        return redirect(url('show-invoices'));
    }
}
