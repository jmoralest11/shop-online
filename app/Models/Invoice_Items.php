<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_Items extends Model
{
    
    use HasFactory;

    protected $table = 'invoices_items';

    protected $fillable = [
        'id_invoice', 'id_product', 'price', 'amount'
    ];

    public function invoices(){
        return $this->belongsTo(Invoice::class, 'id_invoice');
    }

    public function products(){
        return $this->belongsTo(Producto::class, 'id_product');
    }

}
