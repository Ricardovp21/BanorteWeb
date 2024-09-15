<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'account_id', 'numero_tarjeta', 'tipo_tarjeta', 'fecha_expiracion', 'cvv',
    ];

   
    protected $casts = [
        'fecha_expiracion' => 'date', 
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
