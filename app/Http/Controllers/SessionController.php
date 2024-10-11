<?php

namespace App\Http\Controllers;

use App\Http\Requests\Session\Store;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function store(Store $request)
    {
        $validate = $request->validated();

        if (!auth()->attempt(['email' => $validate['email'], 'password' => $validate['password']]))
            return response()->json(['data' => 'can not log in check your credintials.'],422);

        session()->regenerate();
        return response()->json([
            'token' => auth()->user()->createToken("API TOKEN", ['remember'])->plainTextToken,
            'data' => 'log in succesfuly.'
        ],200);
    }
    public function distroy()
    {
        auth()->logout();
        return response()->json(['data' => 'good bye.'],200);
    }
}
