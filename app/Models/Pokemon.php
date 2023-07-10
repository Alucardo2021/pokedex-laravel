<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "Pokemon";
    protected $primary_key = "PokemonID";

    public function tipos(){
        return $this->belongsToMany('App\Models\Tipo', 'PokemonTipo','PokemonID' , 'TipoID');
    }


}
