<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    
    public function edit(User $user)
    {
        $this->authorize('update', $user); // Autorizzazione per limitare l'accesso
        return view('users.edit', compact('user'));
    }
    
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user); // Autorizzazione per limitare l'update
    
        $user->update($request->all());
        $user->meta()->update($request->meta);
    
        return redirect()->route('users.show', $user);
    }
    
}
