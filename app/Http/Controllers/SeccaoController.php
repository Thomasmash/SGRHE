<?php
namespace App\Http\Controllers;
use App\Models\Seccao;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SeccaoController extends Controller
{

    //Fromulario Create Edit Cargo
      public function formulario($id = null)
    {
       //Se o $id for nulo é a criacao de um novo registro se nao é edicao
       $cargo = $id ? Seccao::find($id):null;
       return view('sgrhe/pages/forms/seccao',compact('seccao'));
    }
    public function index()
    {
        $dados = Seccao::where('id', '!=', 1)->get();
        // dd($dados->all());
        return view('sgrhe/pages/tables/seccao',compact('dados'));
    
    }
	
	 //Create
    public function store(Request $request)
    {
       // dd($request->all());
			$validardados = $request->validate([
			'designacao' => [
				'string',
				'max:255',
				Rule::unique('seccaos')->where(function ($query) use ($request) {
					return $query->where('designacao', $request->designacao)->where('codNome', $request->codNome);
				}),
			],
			'descrisao'=> ['string', 'max:255'],
			'codNome'=> ['string', 'max:255'],
		], [
			'designacao.unique' => 'O cargo '.$request->designacao.' ja criado com as mesmas permissões.',
		]);
		

        $cargo=Seccao::create([
            'designacao'=> $request->input('designacao'),
            'codNome' => $request->input('codNome'),
            'descrisao' => $request->input('descrisao'),
			'idChefe' => $request->input('idChefe'),
            'descrisao' => $request->input('descrisao'),
            'permissoes' => $request->input('permissoes'),
        ]);
       if ($cargo) {
        return redirect()->back()->with('success', 'A Secção, '.$request->designacao.' Cadastrada com sucesso!');
       }else {
        return redirect()->back()->with('error', 'A Secção, '.$request->designacao.' Cadastrada com sucesso!')->withErrors($request)->withInput();
       }
        
    }

}
