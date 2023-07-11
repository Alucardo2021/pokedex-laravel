<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PokemonTipo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "PokemonTipo";
    protected $primaryKey = "PokemonTipoID";

/*     public function tipos(){
        return $this->hasMany(Tipo::class);
    }
    public function pokemons(){
        return $this->hasMany(Pokemon::class);
    } */
}
