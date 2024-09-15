<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class InformacionController extends Controller
{
    public function show()
    {
      
        $user = Auth::user();

        
        $account = $user->account;

       
        $cards = $account->cards;

        
        return view('informacion', [
            'user' => $user,
            'account' => $account,
            'cards' => $cards,
        ]);
    }
}
