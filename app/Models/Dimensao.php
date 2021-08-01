<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dimensao extends Model
{
    use HasFactory;
    protected $table = 'dimensoes';
    protected $fillable = ['nome'];
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Mapeamento do relacionamento com as perguntas.
     *
     * @return void
     */
    public function perguntas(){
        return $this->hasMany('App\Models\Pergunta');
    }
}
