<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['account_id', 'numero_tarjeta', 'tipo_tarjeta', 'fecha_expiracion', 'cvv', 'limite_credito'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
