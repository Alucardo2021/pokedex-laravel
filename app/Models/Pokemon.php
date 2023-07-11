<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pokemon extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "Pokemon";
    protected $primaryKey = "PokemonID";

    public function tipos(){
        return $this->belongsToMany('App\Models\Tipo', 'PokemonTipo','PokemonID' , 'TipoID');
    }

    public function movimientos(){
        return $this->belongsToMany('App\Models\Movimiento', 'PokemonMovimiento','PokemonID' , 'MovimientoID')->where('PokemonMovimiento.deleted_at', null);
    }
    public function habilidades(){
        return $this->belongsToMany('App\Models\Habilidad', 'PokemonHabilidad','PokemonID' , 'HabilidadID')->where('deleted_at', null);
    }


}
