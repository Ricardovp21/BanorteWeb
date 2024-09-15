<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Account;
use App\Models\Movimiento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransferenciaController extends Controller
{
    public function showForm()
    {
        
        return view('transferir'); 
    }
    public function transferir(Request $request)
    {

        $validatedData = $request->validate([
            'numero_tarjeta' => 'required|digits:16',
            'monto' => 'required|numeric|min:1',
        ]);

       
        $cardDestino = Card::where('numero_tarjeta', $validatedData['numero_tarjeta'])->first();

        if (!$cardDestino) {
            return back()->with('error', 'La tarjeta ingresada no existe.');
        }

       
        $cuentaOrigen = Auth::user()->account;

     
        if ($cuentaOrigen->saldo < $validatedData['monto']) {
            return back()->with('error', 'Saldo insuficiente para realizar la transferencia.');
        }

   
        $cuentaDestino = $cardDestino->account;

       
        Movimiento::create([
            'account_id' => $cuentaOrigen->id,
            'monto' => -$validatedData['monto'],
            'tipo' => 'transferencia_enviada',
            'descripcion' => 'Transferencia a la cuenta de tarjeta ' . substr($validatedData['numero_tarjeta'], -4),
        ]);


        Movimiento::create([
            'account_id' => $cuentaDestino->id,
            'monto' => $validatedData['monto'],
            'tipo' => 'transferencia_recibida',
            'descripcion' => 'Transferencia recibida de la cuenta de ' . Auth::user()->name,
        ]);

        // Ajustar los saldos
        $cuentaOrigen->saldo -= $validatedData['monto'];
        $cuentaOrigen->save();

        $cuentaDestino->saldo += $validatedData['monto'];
        $cuentaDestino->save();

        return back()->with('success', 'Transferencia realizada con éxito.');
    }
}
