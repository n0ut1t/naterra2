<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapituloCompletado extends Model
{
    use HasFactory;

    protected $table = 'capitulos_completados';
    protected $fillable = ['user_id', 'capitulo', 'puntos'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
