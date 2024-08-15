<!--Layout Principal-->
@extends('layouts.app')
  @section('titulo' , 'Mapa Geral de Avaliação de Desempenho Funcionários / Index')
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
          <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1> Avaliação de Desempenho  </h1>
                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Avaliação de Desempenho</li>
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
                              <h3 class="card-title">Avaliações de Desempenho não Homologados </h3>  
                        </div>
                      <!-- /.card-header -->
                          <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                <th>Nº</th><th>Número de Agente</th> <th>Nome Completo</th> <th>Número de BI</th> <th>Unidade Orgânica</th> <th>Categoria</th> <th>Classificação</th> <th>Periódo Avaliação</th> <th>Função</th> <th>Opções</th>
                              </tr>
                              </thead>
                              <tbody>
                              <!--Gerando a Tabela de forma Dinamica-->
                              @foreach ($dados as $avaliacao)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $avaliacao->numeroAgente }}</td> <td>{{ $avaliacao->nomeCompleto }}</td> <td>{{ $avaliacao->numeroBI }}</td> <td>{{ $avaliacao->eqt }}</td> <td>{{ $avaliacao->categoriaFuncionario }}</td> <td>{{ $avaliacao->total }}</td> <td>{{ $avaliacao->periodoAvaliacao }}</td> <td>{{ $avaliacao->designacao_cargo }}</td>
                                         
                                                <td>
                                                    <form action="{{ route('ver.avaliacao') }}" method="POST" style="display: inline;">
                                                      @csrf
                                                      @method('PUT')
                                                      <input type="hidden" name="id" value="{{ $avaliacao->id_avaliacao_desempenho }}">
                                                      <button type="submit" class="btn btn-primary w-100 m-1">Ver Avaliação</button>
                                                    </form>
                                                    
                                                    <button class="btn btn-warning w-100 m-1" data-toggle="modal" data-target="#addfotosUnidadeOrganica{{$loop->index+1}}" >
                                                     Homologar
                                                    </button>

                                                    <div class="modal fade" id="addfotosUnidadeOrganica{{$loop->index+1}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                                  <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h6 class="modal-title" id="exampleModalLabel">Confirmar Homologação de {{ $avaliacao->nomeCompleto }}</h6>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">

                                                                                <!-- Formulário dentro da modal -->
                                                                                <form method="POST" enctype="multipart/form-data" action="{{ route('homologar.avaliacao') }}">
                                                                                    @csrf
                                                                                    @method('POST')
                                                                                    <div class="form-group">
                                                                                        <label for="arquivo">A ficha de avaliação deve estar no Formato "PDF, PNG e JPG"</label>
                                                                                        <div class="input-group">
                                                                                            <div class="custom-file">
                                                                                                <input type="file" class="custom-file-input image" name="arquivo" required>
                                                                                                <label class="custom-file-label" for="arquivo">Escolha um Ficheiro </label>
                                                                                                <input type="text" class="custom-file-input" name="idAvaliacao" value="{{ $avaliacao->id_avaliacao_funcionario}}">
                                                                                                <input type="text" class="custom-file-input" name="categoria" value="AvaliacaoFuncionario">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-check">
                                                                                        <input type="checkbox" name="confirmar" class="form-check-input" required>
                                                                                        <label class="form-check-label" for="confirmar">Clique para Confirmar</label>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                          <input type="hidden" name="idUnidadeOrganica" value="1">
                                                                                          <button type="submit" class="btn btn-primary">Comfirmar</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                  </div>
                                                    </div>

                                                    <form action="{{ route('eliminar.objecto') }}" method="POST" id="deleteForm{{ $avaliacao->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id" value="{{ $avaliacao->id_avaliacao_desempenho }}">
                                                        <input type="hidden" name="categoria" value="AvaliacaoFuncionario">
                                                        <button type="submit" class="btn btn-danger w-100 m-1" onclick="confirmAndSubmit(event, 'Confirmar deletar Avaliação de Funcionário?', 'Sim, Deletar!', 'Não, Cancelar!')">Deletar</button>
                                                    </form>
                                                </td>
                                            </tr>
                              @endforeach
                              </tbody>
                              <tfoot>
                                <tr>
                                 <th>Nº</th><th>Número de Agente</th> <th>Nome Completo</th> <th>Número de BI</th> <th>Unidade Orgânica</th> <th>Categoria</th> <th>Classificação</th> <th>Periódo Avaliação</th> <th>Função</th> <th>Opções</th>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.container-fluid -->
                </section>
              <!-- /.content -->     
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
      <!--Algoritmo interactivo no processo de delectar Objectos em SweetAlert 2-->
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
    @endsection
