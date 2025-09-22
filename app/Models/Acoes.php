<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'problema_id',
        'o_que',
        'por_que',
        'onde',
        'quem',
        'quando',
        'como',
    ];
    public function problema()
    {
        return $this->belongsTo(Problema::class);
    }
}
