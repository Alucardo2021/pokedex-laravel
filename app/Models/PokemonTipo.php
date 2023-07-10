<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonTipo extends Model
{
    use HasFactory;

    protected $table = "PokemonTipo";
    protected $primary_key = "PokemonTipoID";

/*     public function tipos(){
        return $this->hasMany(Tipo::class);
    }
    public function pokemons(){
        return $this->hasMany(Pokemon::class);
    } */
}
