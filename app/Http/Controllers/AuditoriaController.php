<?php

namespace App\Http\Controllers;
use OwenIt\Auditing\Models\Audit;

use Illuminate\Http\Request;

class AuditoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Audit::orderBy('created_at', 'desc')->get();
        //dd($dados);
        $titulo = 'Auditoria';
        return view('sgrhe/pages/audit/auditoria', compact('dados','titulo'));
    }

}
