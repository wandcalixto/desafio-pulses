<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    use HasFactory;
    protected $fillable = ['descricao', 'ativo', 'dimensao_id'];
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Mapeamento do relacionamento com a dimensão.
     *
     * @return void
     */
    public function dimensao(){
        return $this->belongsTo('App\Models\Dimensao');
    }
}
