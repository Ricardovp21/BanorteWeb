<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Contact extends Model
{
    protected $fillable = ['user_id', 'nombre_contacto', 'numero_cuenta', 'banco_contacto'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
