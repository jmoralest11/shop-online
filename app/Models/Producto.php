<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name', 'price', 'amount', 'description', 'id_category', 'image'
    ];

    public function categorias(){
        return $this->belongsTo(Category::class, 'id_category');
    }
}
