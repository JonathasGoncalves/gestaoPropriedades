<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EventoAgenda extends Model
{
    //

    /**
     * eventoAgenda tem um tanque
     */
    public function Tecnico()
    {
        return $this->hasOne(Tecnico::class, 'id', 'tecnico_id');
    }

    /**
     * eventoAgenda tem um formulario
     */
    public function Formulario()
    {
        return $this->hasOne(Formulario::class, 'id', 'fomulario_id');
    }

    /**
     * eventoAgenda tem um tanque
     */
    public function Tanque()
    {
        return $this->hasOne(Tanque::class, 'id', 'tanque_id');
    }

     /**
     * eventoAgenda tem uma submissao
     */
    public function Submissao()
    {
        return $this->hasOne(Submissao::class, 'id', 'submissao_id');
    }

    protected $table = 'eventoAgenda';
    protected $fillable = [
        'id', 'data', 'hora', 'tecnico_id', 'fomulario_id', 'tanque_id', 'submissao_id'
    ];
}
