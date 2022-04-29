<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Eletrodomestico;
class Marca extends Model
{
    use HasFactory;
    public $table = 'marcas';
    protected $fillable = [
        'nome'
    ];
    
}
