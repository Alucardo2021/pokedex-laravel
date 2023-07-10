<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Tipo;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index()
    {
        $pokemon = Pokemon::all();
        $tipos = Tipo::all();

        dd($pokemon->first()->tipos);

        return view('index', [

            'pokemons' => Pokemon::all(),
            'tipos' => Tipo::all()
        ]);
    }

    public function show(Pokemon $pokemon)
    {
        return view('show', [

            'pokemon' => $pokemon,
            'tipos' => Tipo::all()

        ]);
    }
    public function crud()
    {
        return view('crud', [

            'pokemons' => Pokemon::all(),
            'tipos' => Tipo::all()

        ]);
    }
}
