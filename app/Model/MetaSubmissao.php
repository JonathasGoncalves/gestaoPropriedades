<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MetaSubmissao extends Model
{
    //

    protected $table = 'meta_submissao';
    protected $fillable = [
        'opcao_pergunta_id', 'submissao_id'
    ];

    /**
     * meta_submissao tem uma opcao_pergunta. (Esta tabela é a nxn de OpcaoPergunta para submissao representando meta)
     */
    public function OpcaoPergunta()
    {
        return $this->hasOne(OpcaoPergunta::class, 'id', 'opcao_pergunta_id');
    }
}
