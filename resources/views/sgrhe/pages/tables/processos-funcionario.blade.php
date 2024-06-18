@php
  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
  $permissoes = $cargoLogado->permissoes;
  $seccao = $seccaoLogado->codNome;
@endphp
<!--Layout Principal //23121997-->
@extends('layouts.app')
  @section('titulo' , 'Processos de Funcionários'  )
        @section('header')
        <!--Style Local-->
          <!-- DataTables -->
          <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
          <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
          <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
          <!-- Theme style -->
          <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
          <link rel="stylesheet" href="../../resources/css/app.css">
        @endsection
        @section('conteudo_principal')
          <!-- Content Wrapper. Contains page content //23121997 -->
            <div class="content-wrapper">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1>Processos de {{ $pessoaSolicitante->nomeCompleto }} </h1>
                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                      
                      </ol>
                    </div>
                  </div>
                </div><!-- /.container-fluid -->
              </section>

              <!-- Main content -->
              <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div style="padding:10px; border-radius:5px; " class="col-12">
                      <div style="background-color: #ffffff;" class="card card-primary">

                       <div class="card-header">
                                <h3 class="card-title">Processos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>Estado</th>
                                  <th>Funcionário Solicitante </th>
                                  <th>Categoria</th>
                                  <th>Data de Submissão</th>
                                  <th>Secção</th>
                                  <th>Natureza</th>
                                  <th>Deferimento</th>
                                  <th>Funcionário Processador</th>
                                  <th>Opções</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!--Gerando a Tabela de forma Dinamica //23121997-->
                                @foreach ($processos as $processo)
                                              <tr>
                                                  @php
                                                    $documento = App\Models\Arquivo::where('id', $processo->idArquivo);
                                                    $funcionarioSolicitante = App\Models\Funcionario::where('id', $processo->idFuncionarioSolicitante)->first();
                                                    $pessoaSolicitante = App\Models\Pessoa::where('id', $funcionarioSolicitante->idPessoa)->first();
                                                    // echo($documento->first()->caminho);    
                                                    $funcionario = App\Models\Funcionario::find($processo->idFuncionario);
                                                    $pessoaFuncionario = App\Models\Pessoa::find($funcionario->idPessoa);
                                                  @endphp
                                                  <td class="{{ ($processo->estado =='Submetido') ? 'text-success' : '' }} {{ ($processo->estado =='Cancelado') ? 'text-danger' : '' }}" style="font-weight: bolder;">{{ $processo->estado }}</td>
                                                  <td> {{ $pessoaSolicitante->nomeCompleto}}</td>
                                                  <td>{{ $processo->categoria }}</td>
                                                  <td>{{ strftime('%d de %B de %Y', strtotime(\Carbon\Carbon::parse($processo->created_at))) }}</td>
                                                  <td>{{ $processo->seccao }}</td>
                                                  <td>{{ $processo->natureza }}</td>                                                 
                                                  <td>{{ $processo->deferimento === "" ? $processo->deferimento : "Sem Deferimento" }}</td>
                                                  <td>{{ $pessoaFuncionario->nomeCompleto }}</td>
                                                   <td>
                                                   <form class="{{ (($processo->estado == 'Submetido') && !($processo->categoria == 'Nomeacao')) ? 'd-inline' : 'd-none'}}" action="{{ route('solicitacao.cancelar', ['idProcesso' => $processo->id ]) }}" method="POST" id="deleteForm{{ $processo->id }}">
                                                      @csrf
                                                      @method('POST')
                                                      <input type="hidden" name="Request"  value="{{$processo->Request}}">
                                                      <button type="submit" class="btn btn-danger" onclick="confirmAndSubmit(event, 'Confirmar cancelar a solicitação?', 'Sim, Confirmar!', 'Não, Cancelar!')" >Cancelar Solictacao</button>
                                                    </form>
                                                    @if ($documento->exists()) 
                                                      <a href="{{ route('Exibir.Imagem', ['imagem' => base64_encode( $documento->first()->caminho )]) }}" class="btn btn-secondary {{ ($processo->estado == 'Aprovado' || $processo->estado == 'Desfavoravel' || $processo->estado == 'Favoravel') ? 'd-inline' : 'd-none'}} ">Baixar Documento</a>
                                                    @endif
                                                    <form class="{{ ($processo->estado == 'Submetido') ? 'd-inline' : 'd-none'}}"  action="{{ route('solicitacao.preview')}}" method="POST" >
                                                      @csrf
                                                      @method('POST')
                                                      <input type="hidden" name="Request" value="{{$processo->Request}}">
                                                      <input type="hidden" name="idProcesso" value="{{$processo->id}}">
                                                      <button type="submit" class="btn btn-info">Ver Documento</button>
                                                    </form>
                                                      @if ( ($permissoes === "Admin") || ($permissoes >= 4 && $seccao === "RHPE") )
                                                       Botoes de Permissao
                                                      @endif 
                                                  </td>
                                              </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                  <th>Estado</th>
                                  <th>Funcionário Solicitante </th>
                                  <th>Categoria</th>
                                  <th>Data de Submissão</th>
                                  <th>Secção</th>
                                  <th>Natureza</th>
                                  <th>Deferimento</th>
                                  <th>Funcionário Processador</th>
                                  <th>Opções</th>
                                </tr>
                                </tfoot>
                              </table>
                            </div>
                            <div class="card-footer">
                              
                            </div>  <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
              </section>
              <!-- /.Main content -->
     
            </div>
          <!-- /.content-wrapper -->
          @endsection
    @section('scripts')
      <!-- DataTables  & Plugins -->
      <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
      <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
      <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
      <script src="../../plugins/jszip/jszip.min.js"></script>
      <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
      <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
      <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
      <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
      <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
      <!--Algoritmo interactivo no processo de delectar Objectos em SweetAlert 2 //23121997-->
      <script src="{{ asset('plugins/sweetalert2/alerta-deletar.js') }}"></script>
      <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["excel", "pdf", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>
      <script>
      //Select Optiom Submite, comando de Submiss]ao automatica //23121997
      document.getElementById('opcoes').addEventListener('change', function() {
          var selectedOption = this.value;
          document.getElementById(selectedOption).submit();
      });
      </script>
    @endsection
