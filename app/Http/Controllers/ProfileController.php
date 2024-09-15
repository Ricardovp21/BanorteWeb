<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $account = $user->account;
        return view('profile', compact('user', 'account'));
    }
    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Obtenemos el usuario autenticado correctamente
        $user = Auth::user();
        
        if ($request->hasFile('avatar')) {
            // Elimina el avatar anterior si existe
            if ($user->avatar_url) {
                Storage::delete('public/avatars/' . $user->avatar_url);
            }

            // Guarda el nuevo avatar
            $file = $request->file('avatar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/avatars', $filename);

            // Actualiza el campo avatar_url del usuario
            $user->avatar_url = $filename;
            $user->save();
        }

        return redirect()->back()->with('success', 'Avatar actualizado correctamente');
    }
}

