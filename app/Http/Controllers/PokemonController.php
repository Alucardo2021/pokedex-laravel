<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Pokemon;
use App\Models\PokemonMovimiento;
use App\Models\Tipo;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index()
    {

        $pokemon = Pokemon::paginate(18)->withQueryString();
        $tipos = Tipo::all();

        return view('index', [

            'pokemons' => $pokemon,
            'tipos' => $tipos
        ]);
    }

    public function show(Pokemon $pokemon)
    {
        return view('show', [
            'movimientos' => $pokemon->movimientos,
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

    public function borrarMovimiento(Request $request)
    {

        $validated = $request->validate([
            'pokeID' => 'required|exists:Pokemon,PokemonID',
            'moveID' => 'required|exists:Movimiento,MovimientoID'
        ]);

        $pokeID = $validated['pokeID'] ?? null;
        $moveID = $validated['moveID'] ?? null;

        $movimientoPokemon = PokemonMovimiento::where("PokemonID", $pokeID)
            ->where("MovimientoID", $moveID)->first();

        $movimientoPokemon->delete();

        return redirect("/pokemon/".$pokeID);


    }
}
