<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $fillable = ['account_id', 'monto', 'tipo', 'descripcion'];

   
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
