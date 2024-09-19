<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\User;
use App\Models\UserMeta;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('countries.index', compact('countries'));
    }
    
    public function create()
    {
        return view('countries.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'iso_code' => 'required|unique:countries',
        ]);
    
        Country::create($request->all());
    
        return redirect()->route('countries.index');
    }
    
    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }
    
    public function update(Request $request, $id)
    {
        // Trova la nazione da aggiornare
        $country = Country::findOrFail($id);
        
        // Convalida i dati
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'iso_code' => 'required|string|max:10',
        ]);

        // Aggiorna la nazione
        $country->update($validatedData);

        // Reindirizza con messaggio di successo
        return redirect()->route('countries.index')->with('success', 'Nazione aggiornata con successo!');
    }
    
    public function destroy($id)
    {
        $country = Country::findOrFail($id);
    
        if (UserMeta::where('country_id', $id)->exists()) {
            return redirect()->route('countries.index')->with('error', 'Impossibile eliminare la nazione. È attualmente utilizzata.');
        }
    
        $country->delete();
    
        return redirect()->route('countries.index')->with('success', 'Nazione eliminata con successo!');
    }
    
    public function add()
    {
        return view('countries.add');
    }

}
