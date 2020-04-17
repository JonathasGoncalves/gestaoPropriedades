<?php

namespace App\Exports;

use App\Model\Tanque;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class TanquesExport implements FromCollection, WithHeadings, ShouldAutoSize
{

    //use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */


    public function __construct($relatorio, $filtro, $padrao, $dataReferencia)
    {
        $this->relatorio = $relatorio;
        $this->filtro = $filtro;
        $this->padrao = $padrao;
        $this->dataReferencia = $dataReferencia;
        $this->tanque = new Tanque();
    }

    public function collection()
    {
        return $this->tanque->TanqueListagemQualidade($this->relatorio, $this->filtro, $this->padrao, $this->dataReferencia);
    }

    public function headings(): array
    {
        return [
            'CÓDIGO',
            'CÓDIGO CACAL',
            'NOME',
            'MINICIPIO',
            'ID_TANQUE',
            'CBT',
            'CCS',
            'DATA REFERÊNCIA',
        ];
    }


    

}
