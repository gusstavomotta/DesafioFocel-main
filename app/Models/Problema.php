<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\User;

class Problema extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'titulo',
        'descricao', 
        'analise_causa'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function acoes()
    {
        return $this->hasMany(Acoes::class);
    }
}
