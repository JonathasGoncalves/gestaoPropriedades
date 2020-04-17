<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Tema;

class temaController extends Controller
{

    private $tema;
    public function __construct(Tema $tema) {
        $this->tema = $tema;
    }

    public function index()
    {
        $data = ['temas' => $this->tema->all()];
        return response()->json($data);
    }

}
