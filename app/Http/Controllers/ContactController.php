<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $contacts = $user->contacts; // Relación con los contactos
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $user->contacts()->create([
            'nombre_contacto' => $request->nombre_contacto,
            'numero_cuenta' => $request->numero_cuenta,
            'banco_contacto' => $request->banco_contacto,
        ]);

        return redirect()->route('contacts.index');
    }
}
