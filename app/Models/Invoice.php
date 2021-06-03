<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'id_user', 'total', 'address', 'phone', 'description'
    ];

    public function usuarios(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
