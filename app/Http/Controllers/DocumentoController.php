<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use App\Models\Documento;
use App\Models\Funcionario;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class DocumentoController extends Controller
{

    public function inserirDocumento(Request $request)
    {
    
        // Verificar se o funcionario pode ou ser actualizado
        $nomeFuncionarioSolicitante = Pessoa::find(Funcionario::find($request->idFuncionario)->idPessoa)->nomeCompleto;
        $FuncionarioSolicitante = Funcionario::find($request->idFuncionario);
        //dd($FuncionarioSolicitante->estado);
        if ($FuncionarioSolicitante->estado != "Activo") {
         return redirect()->back()->with('error', 'O Funcionário '.$nomeFuncionarioSolicitante.' não pode ser actualizado porque não está activo!');
        }
        $idFuncionario = $request->idFuncionario;
        $nome = Pessoa::find(Funcionario::find($idFuncionario)->idPessoa)->first()->nomeCompleto;
        $categoria = $request->categoria;
        $verificar = $request->validate([
            //Form Request Pesquisar e implementar
        ]);
      
        $arquivo = $request->file('arquivo');
        $nomeArquivo = $categoria.'-'.$nome.'.'.$arquivo->extension();
        $caminho = 'funcionarios/'.$idFuncionario.'/'.$categoria.'/'.$nomeArquivo;
        // Armazenar o arquivo no subdiretório dentro da pasta 'local Especifico'
        //Procurar um outro metodo para o put que guarada com nme personalizado
        Storage::disk('local')->put($caminho, file_get_contents($arquivo));
        $arquivo = Arquivo::where('idFuncionario', $idFuncionario)->where('categoria', $categoria)->first();
        $documento  = Documento::where('idFuncionario', $idFuncionario)->where('categoria', $categoria);
        if ($arquivo == null) {
        DB::beginTransaction();
        //dd($arquivo);
        $Arquivo = Arquivo::create([
            'titulo' => md5($nomeArquivo.date('d-m-y')),
            'categoria' => $categoria,
            'descricao' => "N/D",
            'arquivo' => $nomeArquivo,
            'caminho' => $caminho,
            'idFuncionario' => $idFuncionario,
        ]);
        if ($Arquivo) {
            DB::commit();
            DB::beginTransaction();
            $idArquivo = Arquivo::where('idFuncionario',$idFuncionario)->where('categoria',$categoria)->first()->id;
            //dd($idArquivo);
            $Documento = Documento::create([
                'idFuncionario' => $idFuncionario,
                'Request' => http_build_query($request->all()),
                'idArquivo' => $idArquivo,
                'funcionario' => session()->only(['FuncionarioLogado'])['FuncionarioLogado']->id,
                'categoria' => $categoria,
            ]);
            //dd('Chegiei ate aqui');
            //dd($idArquivo);
            if ($Documento) {
               // dd($arquivo);
                DB::commit();
                return redirect()->back()->with('success', 'Actualizado com sucesso!');
            }else {
                DB::rollBack();
                return redirect()->back()->with('error', 'Erro na Actualização!');
            }
        }else {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro na Actualização!');
        }  
        }else {
                // Atualizar simbolicamente o conteudo da coluna 'caminho'
                $arquivo->update([
                    'titulo' => md5($nomeArquivo.date('d-m-y')),
                    'categoria' => $categoria,
                    'descricao' => "N/D",
                    'arquivo' => $nomeArquivo,
                    'caminho' => $caminho,
                    'idFuncionario' => $idFuncionario,
                ]);
                $documento->update([
                    'idFuncionario' => $idFuncionario,
                    'Request' => http_build_query($request->all()),
                    'funcionario' => session()->only(['FuncionarioLogado'])['FuncionarioLogado']->id,
                    'categoria' => $categoria,
                
                ]);
                return redirect()->back()->with('success', 'Actualizado com sucesso!');
        
            return redirect()->back()->withErrors($verificar);//Aplicar Rediret with erro end success  
            }
      
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function exibirDocumento($documento)
    { 
        $arquivo = Storage::disk('local')->get(base64_decode($documento));
        $mimetype =Storage::mimeType($documento);
        return response()->make($arquivo,200,['Content-Type' => $mimetype]);   
    }

}
