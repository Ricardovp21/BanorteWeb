<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Account;
use App\Models\Card; 
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str; 

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        // Crear el usuario
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Crear la cuenta asociada al usuario
        $account = $user->account()->create([
            'saldo' => 0, // Saldo inicial
            'tipo_cuenta' => 'Ahorro', // Tipo de cuenta
        ]);

        // Crear una tarjeta única asociada a la cuenta
        $card = Card::create([
            'account_id' => $account->id,
            'numero_tarjeta' => $this->generarNumeroTarjetaMasterCard(), 
            'tipo_tarjeta' => 'debito',
            'fecha_expiracion' => now()->addYears(4), 
            'cvv' => rand(100, 999), 
        ]);

        return $user;
    }

    // Método para generar un número de tarjeta único con formato MasterCard
    protected function generarNumeroTarjetaMasterCard()
    {
        do {
            
            $bin = rand(51, 55); 
            $numero_tarjeta = $bin . str_pad(rand(0, 99999999999999), 14, '0', STR_PAD_LEFT); 
        } while (Card::where('numero_tarjeta', $numero_tarjeta)->exists()); 

        return $numero_tarjeta;
    }
}
