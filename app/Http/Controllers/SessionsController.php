<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        if (!auth()->check()) {
            return view('sessions.create');
        }
        return redirect()->to('/shop');
    }

    public function store(Request $request)
    {
        $user = [
            'email' => $request['email'],
            'password' => $request['password']
        ];
        if (auth()->attempt($user)) {
            return back();
        }
        return redirect()->to('/shop');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->to('/shop');
    }
}
