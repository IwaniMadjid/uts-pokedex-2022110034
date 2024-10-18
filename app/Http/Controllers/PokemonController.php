<?php

namespace App\Http\Controllers;
use App\Providers\Boot;
use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function __construct() {
    $this->middleware('auth')->except('show');
}


     public function index()
    {
        $pokemons = Pokemon::paginate(20);
        return view('pokemon.index', compact('pokemons'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('pokemon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'weight' => 'nullable|numeric|max:999999.99',
            'height' => 'nullable|numeric|max:999999.99',
            'hp' => 'nullable|integer|max:9999',
            'attack' => 'nullable|integer|max:9999',
            'defense' => 'nullable|integer|max:9999',
            'is_legendary' => 'required|boolean',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg,svg,gif|max:2048',
        ]);
        $pokemon =Pokemon::create($validated);
        // ->only([
        // 'name',
        // 'species',
        // 'primary_type',
        // 'weight',
        // 'height',
        // 'hp',
        // 'attack',
        // 'defense',
        // 'is_legendary',
        // 'photo']));
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $fileName = $file -> hashName();
            $filePatch = $file->storeAs('public', $fileName);
            $pokemon->update(['photo' => $filePatch]);
        }
        return redirect()->route('pokemon.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        return view('pokemon.show', compact("pokemon"));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        return view('pokemon.edit', compact("pokemon"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'species' => 'required|string|max:100',
        'primary_type' => 'required|string|max:50',
        'weight' => 'nullable|numeric|max:999999.99',
        'height' => 'nullable|numeric|max:999999.99',
        'hp' => 'nullable|integer|max:9999',
        'attack' => 'nullable|integer|max:9999',
        'defense' => 'nullable|integer|max:9999',
        'is_legendary' => 'required|boolean',
        'photo' => 'nullable|image|mimes:png,jpg|max:2048',
    ]);

    $pokemon->update($validated);

    if ($request->hasFile('photo')) {
        $filePath = $request->file('photo')->store('public/photos');
        $pokemon->update(['photo' => $filePath]);
    }

    return redirect()->route('pokemon.index')->with('success', 'Pokemon updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();
        return redirect()->route('pokemon.index');
    }
}
