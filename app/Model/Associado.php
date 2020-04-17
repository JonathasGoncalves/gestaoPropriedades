<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Associado extends Model
{
    //
    protected $table = 'associados';
    protected $primaryKey = 'codigo_cacal';

    /**
     * Um associado pode ter muitos tanques
     */
    public function Tanques()
    {
        return $this->hasMany(Tanque::class, 'codigo_cacal', 'CODIGO_CACAL');
    }
}
