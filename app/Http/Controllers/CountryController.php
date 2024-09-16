<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\User;

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
    
    public function update(Request $request, Country $country)
    {
        $request->validate([
            'name' => 'required',
            'iso_code' => 'required|unique:countries,iso_code,' . $country->id,
        ]);
    
        $country->update($request->all());
    
        return redirect()->route('countries.index');
    }
    
    public function destroy($id)
    {
        $country = Country::findOrFail($id);
    
        if (User::where('country_id', $id)->exists()) {
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
