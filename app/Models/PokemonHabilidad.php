<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonHabilidad extends Model
{
    use HasFactory;

    protected $table = "PokemonHabilidad";
    protected $primary_key = "PokemonHabilidadID";
}
