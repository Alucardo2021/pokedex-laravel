<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movimiento extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "Movimiento";
    protected $primaryKey = "MovimientoID";

    public function pokemons(){
        return $this->belongsToMany('App\Models\Pokemon', 'PokemonMovimiento','MovimientoID' , 'PokemonID');
    }

    public function tipo(){
        return $this->belongsTo('App\Models\Tipo', 'TipoID');
    }
}
