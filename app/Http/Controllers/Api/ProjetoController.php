<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Projeto;

class ProjetoController extends Controller
{
    //


    private $projeto;
    public function __construct(Projeto $projeto)
    {
        $this->projeto = $projeto;
    }

    public function index()
    {
        $data = ['projetos' => $this->projeto->where('aberto', '=', 1)->get()];
        return response()->json($data);
    }


}
