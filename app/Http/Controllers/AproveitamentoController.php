<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aproveitamento;
use Illuminate\Support\Facades\DB;

class AproveitamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexUnidadeOrganica()
    {
        $aproveitamento = Aproveitamento::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                // dd($request->all());
                $request->validate([
                    'matriculadosMF' => ['integer', 'min:0'],
                    'matriculadosF' => ['integer', 'min:0'],
                    'aprovadosMF' => ['integer', 'min:0'],
                    'aprovadosF' => ['integer', 'min:0'],
                    'reprovadosMF' => ['integer', 'min:0'],
                    'reprovadosF' => ['integer', 'min:0'],
                    'transferidosEMF' => ['integer', 'min:0'],
                    'transferidosEF' => ['integer', 'min:0'],
                    'transferidosSMF' => ['integer', 'min:0'],
                    'transferidosSF' => ['integer', 'min:0'],
                    'desistentesMF' => ['integer', 'min:0'],
                    'desistentesF' => ['integer', 'min:0'],
                ], [
                    'matriculadosMF' => 'Campo Matriculados MF valido só para valores inteiros positivos!',
                    'matriculadosF' => 'Campo Matriculado F valido só para valores inteiros positivos!',
                    'aprovadosMF' => 'Campo Aprovados MF valido só para valores inteiros positivos!',
                    'aprovadosF' => 'Campo Aprovados F valido só para valores inteiros positivos!',
                    'reprovadosMF' => 'Campo Reprovados MF valido só para valores inteiros positivos!',
                    'reprovadosF' => 'Campo Reprovados F valido só para valores inteiros positivos!',
                    'transferidosEMF' => 'Campo Transferidos Entrada MF valido só para valores inteiros positivos!',
                    'transferidosEF' => 'Campo Transferidos Entrada F valido só para valores inteiros positivos!',
                    'transferidosSMF' => 'Campo Transferidos Saída MF valido só para valores inteiros positivos!',
                    'transferidosSF' => 'Campo Transferidos Saída F valido só para valores inteiros positivos!',
                    'desistentesMF' => 'Campo Desistentes MF valido só para valores inteiros positivos!',
                    'desistentesF' => 'Campo Desistentes F valido só para valores inteiros positivos!',
                    ]);
                DB::beginTransaction();
                $aproveitamento = Aproveitamento::create([
                    'classe' => $request->classe,                    
                    'trimestre' => $request->trimestre,                   
                    'matriculadosMF' => $request->matriculadosMF,                    
                    'matriculadosF' => $request->matriculadosF,                                    
                    'aprovadosMF' => $request->aprovadosMF,                  
                    'aprovadosF' => $request->aprovadosF,                   
                    'reprovadosMF' => $request->reprovadosMF,                  
                    'reprovadosF' => $request->reprovadosF,                    
                    'transferidosEMF' => $request->transferidosEMF,                   
                    'transferidosEF' => $request->transferidosEF,     
                    'transferidosSMF' => $request->transferidosSMF,                   
                    'transferidosSF' => $request->transferidosSF,                 
                    'desistentesMF' => $request->desistentesMF,                   
                    'desistentesF' => $request->desistentesF,
                    'idFuncionario' => $request->idFuncionario,                
                    'idUnidadeOrganica' => $request->idUnidadeOrganica,
                ]);
                if($aproveitamento){
                    DB::commit();
                    return redirect()->back()->with('success', 'Formulário de Aproveitamento Submetido com sucesso!');
                }else {
                   DB::rollback();
                   return redirect()->back()->with('error', 'Erro ao submeter o formulario');
                }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
             // dd($request->all());
             $request->validate([
                'matriculadosMF' => ['integer', 'min:0'],
                'matriculadosF' => ['integer', 'min:0'],
                'aprovadosMF' => ['integer', 'min:0'],
                'aprovadosF' => ['integer', 'min:0'],
                'reprovadosMF' => ['integer', 'min:0'],
                'reprovadosF' => ['integer', 'min:0'],
                'transferidosEMF' => ['integer', 'min:0'],
                'transferidosEF' => ['integer', 'min:0'],
                'transferidosSMF' => ['integer', 'min:0'],
                'transferidosSF' => ['integer', 'min:0'],
                'desistentesMF' => ['integer', 'min:0'],
                'desistentesF' => ['integer', 'min:0'],
            ], [
                'matriculadosMF' => 'Campo Matriculados MF valido só para valores inteiros positivos!',
                'matriculadosF' => 'Campo Matriculado F valido só para valores inteiros positivos!',
                'aprovadosMF' => 'Campo Aprovados MF valido só para valores inteiros positivos!',
                'aprovadosF' => 'Campo Aprovados F valido só para valores inteiros positivos!',
                'reprovadosMF' => 'Campo Reprovados MF valido só para valores inteiros positivos!',
                'reprovadosF' => 'Campo Reprovados F valido só para valores inteiros positivos!',
                'transferidosEMF' => 'Campo Transferidos Entrada MF valido só para valores inteiros positivos!',
                'transferidosEF' => 'Campo Transferidos Entrada F valido só para valores inteiros positivos!',
                'transferidosSMF' => 'Campo Transferidos Saída MF valido só para valores inteiros positivos!',
                'transferidosSF' => 'Campo Transferidos Saída F valido só para valores inteiros positivos!',
                'desistentesMF' => 'Campo Desistentes MF valido só para valores inteiros positivos!',
                'desistentesF' => 'Campo Desistentes F valido só para valores inteiros positivos!',
                ]);
            $aproveitamento = Aproveitamento::find($id);
            DB::beginTransaction();
                $aproveitamento->classe = $request->classe;                    
                $aproveitamento->trimestre = $request->trimestre;                   
                $aproveitamento->matriculadosMF = $request->matriculadosMF;                    
                $aproveitamento->matriculadosF = $request->matriculadosF;                                    
                $aproveitamento->aprovadosMF = $request->aprovadosMF;                  
                $aproveitamento->aprovadosF = $request->aprovadosF;                   
                $aproveitamento->reprovadosMF = $request->reprovadosMF;                  
                $aproveitamento->reprovadosF = $request->reprovadosF;                    
                $aproveitamento->transferidosEMF = $request->transferidosEMF;                   
                $aproveitamento->transferidosEF = $request->transferidosEF;     
                $aproveitamento->transferidosSMF = $request->transferidosSMF;                   
                $aproveitamento->transferidosSF = $request->transferidosSF;                 
                $aproveitamento->desistentesMF = $request->desistentesMF;                   
                $aproveitamento->desistentesF = $request->desistentesF;
                $aproveitamento->idFuncionario = $request->idFuncionario;                
                $aproveitamento->idUnidadeOrganica = $request->idUnidadeOrganica;

            if($aproveitamento->save()){
                DB::commit();
                return redirect()->back()->with('success', 'Formulário de Aproveitamento Actualizado com sucesso!');
            }else {
            DB::rollback();
            return redirect()->back()->with('error', 'Erro ao Actualizar o formulario');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
