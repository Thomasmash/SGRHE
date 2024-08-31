<?php

namespace App\Http\Controllers;
use App\Models\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    //Formulario Create and Edit
    public function formulario($id = null)
    {
        //Se o $id for nulo é a criacao de um novo registro se nao é edicao
        $endereco = $id ? Endereco::find($id):null;
        return view('sgrhe/pages/forms/endereco',compact('endereco'));
    }

    //Read
    public function index()
    {
        $enderecos=Endereco::all();
        return view('sgrhe/pages/tables/endereco',compact('enderco'));
    }

}
