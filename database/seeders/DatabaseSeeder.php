<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Habilidad;
use App\Models\Movimiento;
use App\Models\Pokemon;
use App\Models\PokemonHabilidad;
use App\Models\PokemonMovimiento;
use App\Models\PokemonTipo;
use App\Models\PokemonType;
use App\Models\Tipo;
use App\Models\TipoMovimiento;
use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\stringStartsWith;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

       //Seeding of Tipos (18)
        $array_tipos = [               "https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/4/43/Icon_Normal.png",
                        "https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/4/4c/Icon_Lucha.png",
                        "https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/d/d3/Icon_Volador.png",
                        "https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/3/3e/Icon_Veneno.png",
                        "https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/8/8d/Icon_Tierra.png",
                        "https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/1/12/Icon_Roca.png",
                        "https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/7/7e/Icon_Bicho.png",
                        "https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/9/9a/Icon_Fantasma.png",
                        "https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/b/bc/Icon_Acero.png",
                        "https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/4/44/Icon_Fuego.png",
                        "https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/d/d3/Icon_Agua.png",
                        "https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/7/7f/Icon_Planta.png",
                        "https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/3/33/Icon_El%C3%A9ctrico.png",
                        "https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/c/c0/Icon_Ps%C3%ADquico.png",
                        "https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/2/22/Icon_Hielo.png",
                        "https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/9/96/Icon_Drag%C3%B3n.png",
                        "https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/a/a4/Icon_Siniestro.png",
                        "https://static.wikia.nocookie.net/pokemongo_es_gamepedia/images/6/60/Icon_Hada.png"

        ];
        foreach (collect(Http::get('https://pokeapi.co/api/v2/type/?limit=18')->json())->get('results') as $type) {
            $data = collect(Http::get(collect($type)->get('url'))->json());

            $tipo = new Tipo();
            $tipo->Nombre = ucfirst($data->get('name'));
            $tipo->Icono =  $array_tipos[$data->get('id')-1];
            $tipo->save();
        };
        //Fin de Seeding of Tipos


        //Seeding of Habilidades (298)
        foreach (collect(Http::get('https://pokeapi.co/api/v2/ability/?limit=298')->json())->get('results') as $type) {
            $data = collect(Http::get(collect($type)->get('url'))->json());

            if (collect($data->get('effect_entries'))->get(1)) {
                $indice = 1;
            } else {
                $indice = 0;
            }

            $habilidad = new Habilidad();
            $habilidad->Nombre = ucfirst($data->get('name'));
            $habilidad->Descripcion = collect(collect($data->get('effect_entries'))->get($indice))->get("effect");
            $habilidad->save();
        };
        //Fin de Seeding of Habilidades

        //Seeding of Movimientos (900)
        foreach (collect(Http::get('https://pokeapi.co/api/v2/move/?limit=900')->json())->get('results') as $type) {
            $data = collect(Http::get(collect($type)->get('url'))->json());

            if (collect($data->get('effect_entries'))->get(1)) {
                $indice = 1;
            } else {
                $indice = 0;
            }

            $movimiento = new Movimiento();
            $movimiento->Nombre = ucfirst($data->get('name'));
            $movimiento->Descripcion = collect(collect($data->get('effect_entries'))->get($indice))->get("effect");
            $movimiento->TipoID =  Tipo::where("Nombre", ucfirst(collect($data->get('type'))->get('name')))->first()->TipoID;
            $movimiento->save();
        };
        //Fin de Seeding of Movimientos

        //Seeding of Pokemones (1010)
        foreach (collect(Http::get('https://pokeapi.co/api/v2/pokemon/?limit=1010')->json())->get('results') as $type) {
            $data = collect(Http::get(collect($type)->get('url'))->json());

            $pokemon = new Pokemon();
            $pokemon->Nombre =  ucfirst($data->get('name'));
            $pokemon->Peso = $data->get('weight') / 10;
            $pokemon->Altura = $data->get('height') / 10;
            $pokemon->SpriteComun = collect($data->get('sprites'))->get('front_default');
            $pokemon->SpriteShiny = collect($data->get('sprites'))->get('front_shiny');
            $pokemon->save();
        };
        //Fin de Seeding of Pokemones




        //Seeding de Relaciones con Pokemones (Tipos,Habilidades)
        foreach (Pokemon::all() as $pokemon) {
            $data = collect(Http::get('https://pokeapi.co/api/v2/pokemon/'. $pokemon->PokemonID)->json());

           //pokemons x tipos
            foreach ($data->get('types') as $tipo) {
                $pokemonTipo = new PokemonTipo();
                $pokemonTipo->PokemonID = $pokemon->PokemonID;
                $pokemonTipo->TipoID = Tipo::where("Nombre", ucfirst(collect(collect($tipo)->get('type'))->get('name')))->first()->TipoID;
                $pokemonTipo->save();
            }


            //pokemons x habilidades
            foreach ($data->get('abilities') as $habilidad) {
                $pokemonHabilidad = new PokemonHabilidad();
                $pokemonHabilidad->PokemonID = $pokemon->PokemonID;
                $pokemonHabilidad->HabilidadID = Habilidad::where("Nombre", ucfirst(collect(collect($habilidad)->get('ability'))->get('name')))->first()->HabilidadID;
                $pokemonHabilidad->save();
            }

            //pokemons x movimiento
            foreach ($data->get('moves') as $movimiento) {
                $pokemonMovimiento = new PokemonMovimiento();
                $pokemonMovimiento->PokemonID = $pokemon->PokemonID;
                $pokemonMovimiento->MovimientoID = Movimiento::where("Nombre", ucfirst(collect(collect($movimiento)->get('move'))->get('name')))->first()->MovimientoID;
                $pokemonMovimiento->save();
            }



        }
        //Fin de Seeding de Relaciones con Pokemones (Tipos,Habilidades)





    }
}
