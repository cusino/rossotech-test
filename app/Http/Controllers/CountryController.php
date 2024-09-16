<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

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
    
    public function destroy(Country $country)
    {
        // Verifica che il paese non sia in uso
        if ($country->users()->exists()) {
            return redirect()->route('countries.index')->with('error', 'Il paese è in uso e non può essere eliminato.');
        }
    
        $country->delete();
        return redirect()->route('countries.index');
    }
    
    public function add()
    {
        return view('countries.add');
    }

}
