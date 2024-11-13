<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Arquivo;
use App\Models\Cargo;
use App\Models\CategoriaFuncionario;
use App\Models\Notificacao;
use App\Models\Endereco;
use App\Models\Naturalidade;
use App\Models\Parente;
use App\Models\Pessoa;
use App\Models\Processo;
use App\Models\Seccao;
use App\Models\UnidadeOrganica;
use Illuminate\Http\Request;
use Illuminate\Console\Command;
use Spatie\Backup\Tasks\Backup\BackupJobFactory;
use Spatie\Backup\Tasks\Monitor\BackupMonitor;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show($idFuncionario)
    {
        $processos = Processo::where('idFuncionarioSolicitante', $idFuncionario)->get();
        $funcionario = Funcionario::where('id',$idFuncionario)->first();
        $pessoa = Pessoa::where('id',$funcionario->idPessoa)->first();
        $parente = Parente::where('idPessoa',$funcionario->idPessoa)->first();
        $naturalidade = Naturalidade::where('idPessoa',$funcionario->idPessoa)->first();
        $endereco = Endereco::where('idPessoa',$funcionario->idPessoa)->first();
        $cargo = Cargo::where('id',$funcionario->idCargo)->first();
        $seccao = Seccao::where('id',$funcionario->idSeccao)->first();
        $unidadeOrganica = UnidadeOrganica::where('id',$funcionario->idUnidadeOrganica)->first();
        $categoriaFuncionario = CategoriaFuncionario::where('id',$funcionario->idCategoriaFuncionario)->first();
        $arquivos = Arquivo::where('idFuncionario',$funcionario->id);
        //dd($arquivos->where('categoria','fotodeperfil')->first()->arquivo);
        // dd($arquivos->where('categoria','fotodeperfil')->first()->arquivo);
       // dd($pessoa);
        return view('sgrhe/perfilview',compact('funcionario','pessoa','parente','naturalidade','endereco','cargo','unidadeOrganica','categoriaFuncionario','arquivos','processos','seccao'));
    }

    public function listarProcessosFuncionario($idFuncionario)
    {
        //Determinando a Seccao do Fucnionario
        $funcionario = Funcionario::find($idFuncionario);
        $pessoa = Pessoa::find($funcionario->idPessoa);
        $processos = Processo::orderBy('created_at', 'desc')->where('idFuncionarioSolicitante', $idFuncionario)->get();
        $notificacaos = Notificacao::where('idFuncionarioSolicitante', $idFuncionario)->where('visualizadoFuncionario', false)->get();
        //Activar a visualizacao dos processo
        foreach ($notificacaos as $notificacao) {
            $notificacao->visualizadoFuncionario = true;
            $notificacao->save();
        }

        return view('sgrhe/processos-funcionario',compact('funcionario','pessoa','processos','notificacaos'));
    }
    
    public function timelineShow($idFuncionario)
    {

        //Determinando a Seccao do Fucnionario
        $funcionario = Funcionario::where('id',$idFuncionario)->first();
        $pessoa = Pessoa::where('id',$funcionario->idPessoa)->first();
        $parente = Parente::where('idPessoa',$funcionario->idPessoa)->first();
        $naturalidade = Naturalidade::where('idPessoa',$funcionario->idPessoa)->first();
        $endereco = Endereco::where('idPessoa',$funcionario->idPessoa)->first();
        $cargo = Cargo::where('id',$funcionario->idCargo)->first();
        $seccao = Seccao::where('id',$funcionario->idSeccao)->first();
        $unidadeOrganica = UnidadeOrganica::where('id',$funcionario->idUnidadeOrganica)->first();
        $categoriaFuncionario = CategoriaFuncionario::where('id',$funcionario->idCategoriaFuncionario)->first();
        $arquivos = Arquivo::where('idFuncionario',$funcionario->id);
        $processosMy = Processo::orderBy('created_at', 'desc')->where('idFuncionarioSolicitante', session()->only(['FuncionarioLogado'])['FuncionarioLogado']->id)->get();
        //dd($processosMy);
        $processos = Processo::orderBy('created_at', 'desc')->where('seccao', $seccao->codNome)->get();
        //dd($seccao);
        // dd($arquivos->where('categoria','fotodeperfil')->first()->arquivo);
        return view('sgrhe/perfilview-timeline',compact('funcionario','pessoa','parente','naturalidade','endereco','cargo','unidadeOrganica','categoriaFuncionario','arquivos','processos','processosMy'));
    }

//Configuracao do Perfil Fora do Sistema
    public function config()
    {
       //dd('Cheguei ate aqui');
        return view('profile/config-usuario');
    }
//Configuracao do Sistema Dentro do Sistema
    public function configPerfilOnSistem()
    {
		// Definindo o Directorio de backup
        $directoryPath = storage_path('app/backup/SGRHE'); 
		
		if (!is_dir($directoryPath)) {
			//Apricar um backup aut inicial de criacao de directorio para evitar corrupção de dados
			$exitCode = Artisan::call('backup:run');
			 if ($exitCode === 0) {
				//  dd('Backup Inicial feito com sucesso');
				 }else{
				//	dd('Ero ao criar o backup');
			 }
		} else {
			// dd('Direcorio já existe');
		}
		
		 // Obtenha todos os arquivos do diretório
        $files = File::files($directoryPath);
	
        // Crie um array para armazenar os dados dos arquivos
        $backups = [];

        foreach ($files as $file) {
            $backups[] = [
                'name' => $file->getFilename(),
                'created_at' => $file->getCTime(), // Data de criação em timestamp
                'size' => $file->getSize(), // Tamanho do arquivo
            ];
        }
		
		
		$agendamento = json_decode(Storage::disk('agenda_backup')->get('agendamendo.json'), true);
		//dd($agendamento);
		return view('sgrhe/perfil-config', compact('backups', 'agendamento'));
	
		
    }


}
