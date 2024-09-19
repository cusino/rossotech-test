<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\UserMeta;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    
    public function show(User $user)
    {
        $user = User::with(['userMeta.country'])->findOrFail($user->id);
        //dd($user->userMeta);
        return view('users.show', compact('user'));
    }
    
    public function edit(User $user)
    {
        //$this->authorize('update', $user); // Autorizzazione per limitare l'accesso
        $user = User::with(['userMeta', 'country'])->findOrFail($user->id);
        $countries = Country::all(); // Recupera tutte le nazioni
        return view('users.edit', compact('user', 'countries'));
    }
    
    public function update(Request $request, $id)
    {
        //$this->authorize('update', $user); // Autorizzazione per limitare l'update
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,',
            'address' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'country_id' => 'nullable|exists:countries,id'
        ]);

        // Trova e aggiorna l'utente
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        // Trova e aggiorna le informazioni aggiuntive
        $userMeta = UserMeta::firstOrNew(['user_id' => $user->id]);
        $userMeta->fill([
            'address' => $request->input('address'),
            'postal_code' => $request->input('postal_code'),
            'city' => $request->input('city'),
            'province' => $request->input('province'),
            'country_id' => $request->input('country_id'),
            'surname' => $request->input('surname'),
        ]);
        $userMeta->save();

        // Reindirizza alla pagina di visualizzazione dell'utente aggiornato con messaggio di successo
        return redirect()->route('users.edit', $user->id)->with('success', 'Utente aggiornato con successo!');
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
    
        $user->delete();
    
        return redirect()->route('users.index')->with('success', 'Utente eliminato con successo!');
    }

}
