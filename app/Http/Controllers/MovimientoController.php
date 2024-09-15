<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Account;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    public function registrarMovimiento($accountId, $monto, $tipo, $descripcion = null)
    {

        $account = Account::findOrFail($accountId);

       
        Movimiento::create([
            'account_id' => $account->id,
            'monto' => $monto,
            'tipo' => $tipo,
            'descripcion' => $descripcion,
        ]);

        // Ajustar el saldo de la cuenta según el tipo de movimiento
        if ($tipo == 'deposito' || $tipo == 'transferencia_recibida') {
            $account->saldo += $monto;
        } elseif ($tipo == 'retiro' || $tipo == 'transferencia_enviada') {
            $account->saldo -= $monto;
        }

        // Guardar la cuenta con el nuevo saldo
        $account->save();
    }
}
