<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Account;
use App\Models\Card;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Encuentra un usuario con una cuenta asociada (o crea uno si no existe)
        $user = User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin',
            'password' => bcrypt('password123'),
            'phone' => '123456789',
            'address' => '123 Admin St',
        ]);

        // Asegúrate de que el usuario tenga una cuenta asociada con saldo y tipo de cuenta
        $account = $user->account()->firstOrCreate([
            'saldo' => 1000.00,  // Puedes cambiar el saldo inicial
            'tipo_cuenta' => 'Ahorro',  // O 'Corriente'
        ]);

        // Crea una tarjeta para esa cuenta si no existe ya una
        Card::firstOrCreate([
            'account_id' => $account->id,
            'numero_tarjeta' => Str::random(16), // Número de tarjeta aleatorio de 16 dígitos
        ], [
            'tipo_tarjeta' => 'debito', // o 'credito'
            'fecha_expiracion' => now()->addYears(3), // Expira en 3 años
            'cvv' => Str::random(4), // Genera un CVV de 4 dígitos
        ]);
    }
}
