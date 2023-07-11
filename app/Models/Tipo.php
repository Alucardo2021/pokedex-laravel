<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "Tipo";
    protected $primaryKey = "TipoID";


    public function pokemons(){
        return $this->belongsToMany('App\Models\Pokemon', 'PokemonTipo','TipoID' , 'PokemonID');
    }

}
