<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marca;
class Eletrodomestico extends Model
{
    use HasFactory;
    public $table = 'eletrodomestico';
    protected $fillable = [
        'nome','descricao', 'tensao'
    ];

    public function marca()
    {
        return $this->hasOne(Marca::class, 'id', 'marca_id');
    }
}
