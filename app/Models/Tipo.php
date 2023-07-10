<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    protected $table = "Tipo";
    protected $primary_key = "TipoID";

    public function pokemons(){
        return $this->hasMany(PokemonTipo::class);
    }

}
