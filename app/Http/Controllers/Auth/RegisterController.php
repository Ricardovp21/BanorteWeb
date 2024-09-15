<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Account;

use App\Models\Card;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    // Mostrar el formulario de la primera parte del registro (Paso 1)
    public function showRegistrationFormStep1()
    {
        return view('auth.register');
    }

    // Manejar el POST del formulario del paso 1
    public function handleStep1(Request $request)
    {
        // Validar los datos del paso 1
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:10',
            'address' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Guardar temporalmente los datos del paso 1 en la sesión
        $request->session()->put('register_data', $request->only('name', 'phone', 'address'));

        // Redirigir al paso 2
        return redirect()->route('register2');
    }

    // Mostrar el formulario de la segunda parte del registro (Paso 2)
    public function showRegistrationFormStep2()
    {
        return view('auth.register2');
    }

    // Manejar el POST del formulario del paso 2
    public function handleStep2(Request $request)
    {
        // Validar los datos del paso 2
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Recuperar los datos del paso 1 desde la sesión
        $registerData = $request->session()->get('register_data');

        // Combinar los datos del paso 1 y paso 2
        $data = array_merge($registerData, $request->only('email', 'password'));

        // Crear el usuario y la cuenta asociada
        $user = $this->create($data);

        // Loguear automáticamente al usuario
        FacadesAuth::login($user);

        // Limpiar los datos de la sesión
        $request->session()->forget('register_data');

        // Redirigir al home después del registro
        return redirect($this->redirectTo);
    }

    // Crear el usuario, la cuenta y la tarjeta asociada
    protected function create(array $data)
    {
        // Crear el usuario
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);

        // Crear la cuenta asociada al usuario
        $account = $user->account()->create([
            'saldo' => 0, // Saldo inicial
            'tipo_cuenta' => 'Ahorro', // Tipo de cuenta (puedes ajustar esto según tu modelo)
        ]);

        // Crear una tarjeta única asociada a la cuenta
        $card = Card::create([
            'account_id' => $account->id,
            'numero_tarjeta' => $this->generarNumeroTarjetaMasterCard(), 
            'tipo_tarjeta' => 'debito',
            'fecha_expiracion' => now()->addYears(4), // Tarjeta expira en 4 años
            'cvv' => rand(100, 999), // Genera un CVV aleatorio de 3 dígitos
        ]);

        return $user;
    }

    // Método para generar un número de tarjeta único con formato MasterCard
    protected function generarNumeroTarjetaMasterCard()
    {
        do {
            // El número BIN de MasterCard comienza entre 51 y 55
            $bin = rand(51, 55); 
            $numero_tarjeta = $bin . str_pad(rand(0, 99999999999999), 14, '0', STR_PAD_LEFT); // Completar hasta 16 dígitos
        } while (Card::where('numero_tarjeta', $numero_tarjeta)->exists()); // Asegurarse de que el número de tarjeta sea único

        return $numero_tarjeta;
    }
}
