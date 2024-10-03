@php
  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
@endphp
<!--Layout Principal //23121997-->
@extends('layouts.app')
  @section('titulo' , $titulo )
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
                      <h1>{{ $titulo }} </h1>
                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $titulo }} </li>
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
                                <h3 class="card-title">{{ $titulo }} </h3>
                                <br> 
                          </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>Nº</th>
                                  <th>Data</th>
                                  <th>Usuário</th>
                                  <th>Número Agente</th>
                                  <th>Tipo de Evento</th>
                                  <th>Valor Antigo</th>
                                  <th>Valor Novo</th>
                                  <th>User Agent/Browser</th>
                                  <th>Endereço IP</th>
                                  <th>URL</th>
                                  <th>Dados Auditados</th> 
                                </tr>
                                </thead>
                                <tbody>
                                <!--Gerando a Tabela de forma Dinamica //23121997-->
                                @foreach ($dados as $dado)
                                              <tr>
                                                  <td>{{ $loop->index+1 }}</td>
                                                  <td>{{ $dado->created_at }}</td>
                                                  @php
                                                    $funcionario = App\Models\Pessoa::find( App\Models\Funcionario::where('numeroAgente',$dado->user->numeroAgente )->first()->idPessoa );
                                                  @endphp
                                                  <td>{{ $funcionario->nomeCompleto }}</td>
                                                  <td>{{ $dado->user->numeroAgente }}</td>
                                                  <td>{{ $dado->event }}</td>
                                                  <td>
                                                  @if( $dado->event === "updated" || $dado->event === "deleted")
                                                      @foreach ( $dado->getModified() as $campo => $valor )
                                                          @if(isset($valor['old']))
                                                              <span class="font-weight-bold">{{ $campo }}</span>: {{ $valor['old'] }} </br>
                                                          @else
                                                          N/D <br>
                                                          @endif

                                                      @endforeach
                                                  @else
                                                    N/D <br>
                                                  @endif
                                                  </td>
                                                  <td>
                                                  @if( $dado->event === "updated" )
                                                      @foreach ( $dado->getModified() as $campo => $valor )
                                                          @if(isset($valor['new']))
                                                              <span class="font-weight-bold">{{ $campo }}</span>: {{ $valor['new'] }} </br>
                                                          @else
                                                          N/D <br>
                                                          @endif

                                                      @endforeach
                                                  @else
                                                    N/D <br>
                                                  @endif
                                                  
                                                  </td>
                                                  <td>{{ $dado->user_agent }}</td>
                                                  <td>{{ $dado->ip_address }}</td>
                                                  <td>{{ $dado->url }}</td>
                                                  <td><p class="text-break">{{ $dado->auditable }}</p></td>
                                              </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                  <th>Nº</th>
                                  <th>Data</th>
                                  <th>Usuário</th>
                                  <th>Número Agente</th>
                                  <th>Tipo de Evento</th>
                                  <th>Valor Antigo</th>
                                  <th>Valor Novo</th>
                                  <th>User Agent/Browser</th>
                                  <th>Endereço IP</th>
                                  <th>URL</th>
                                  <th>Dados Auditados</th>
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
