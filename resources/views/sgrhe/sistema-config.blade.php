<?php

if (!function_exists('formatBytes')) {
    function formatBytes($bytes, $decimals = 2) {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . ' ' . $units[$factor];
    }
}
?>

<!--Layout Principal-->
@extends('layouts.app')
  @section('titulo' , 'Perfil - '.$pessoaLogado->nomeCompleto )
        @section('header')
        
          <!--Estilizacao do Previw foto de Perfil-->
          <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
          <meta name="csrf-token" content="{{ csrf_token() }}">
		  
		  <!-- DataTables -->
          <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
          <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
          <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
          
		  <!-- Theme style -->
          <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
          <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
		  
        @endsection
        @section('conteudo_principal')
		<div class="wrapper">
      <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h5>Opções do Sistema</h5>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Opções do Sistema </li>
                    </ol>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">

																			<div class="container-fluid">
                                                                              <div class="row">
                                                                                <div class="col-md-12">
                                                                                  <div class="card card-primary">
                                                                                    <div class="card-header">
                                                                                      <h3>Agendar Backups</h3>
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <form action="{{ route('agendar.backup') }}" method="GET" style="display: inline;">
                                                                                          @csrf
                                                                                          <div class="row">
                                                                                            <div class="col-sm-12">
                                                                                              <!-- checkbox -->
                                                                                              <div class="form-group clearfix">
                                                                                                <div class="icheck-primary d-inline">
                                                                                                  <div class="form-group">
                                                                                                    <!-- Agendar Backup //23121997  -->
																									<label for="timePicker">Selecione a Hora:</label>
                                                                                                    <input type="time" class="form-control w-100 " id="timePicker" name="hora" required>
                                                                                                    <label for="seccaoSelect">Selecione a Frequência do Backup:</label>
                                                                                                    <select name="frequencia" class="form-control">
                                                                                                      <option selected="selected" value="Diário">Diário</option>
                                                                                                      <option value="Semanalmente">Semana</option>
                                                                                                      <option value="monthly">Mensal</option>
                                                                                                    </select>
                                                                                                  </div>
                                                                                                </div>
																								</div>
																							</div>	
                                                                                          </div>
                                                                                            <button type="submit" class="btn btn-primary w-100">Agendar Backup</button>
                                                                                        </form>
                                                                                                <div class="card card-{{ $agendamento === null ? 'danger' : 'light'}} w-100 mt-2">
                                                                                                  <div class="card-header">Informações</div>
                                                                                                  <div class="card-body">
                                                                                                  <h5 class="card-title">Agendado:</h5>
                                                                                                    @if( $agendamento != null )
                                                                                                      <p class="card-text font-weight-bold">Backup {{ $agendamento['frequency'] }} às {{ $agendamento['hora'] }} </p>
                                                                                                    @else
                                                                                                      <p class="card-text">Não existem backups agendados!</p>
                                                                                                    @endif
                                                                                                    <form class="{{ $agendamento != null ? 'none' : ''}}" action="{{ route('limpar.agendar.backup') }}" method="GET" style="display: inline;">
                                                                                                      @csrf
                                                                                                      <button type="submit" class="btn btn-danger w-100 mb-1 {{ $agendamento === null ? 'd-none' : ''}}">Cancelar Agenda</button>
                                                                                                    </form>
                                                                                                  </div>
                                                                                                </div>
                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                              </div>
                                                                            </div>
																			<div class="container-fluid">
																				<div class="row">
																					<div class="col-md-12">
																						<div class="card card-light">
																							<div class="card-header">
																							  <h3>Backups</h3>
																							</div>
																								
																							<div class="card-body">
																								<table id="example1" class="table table-bordered table-striped">
																									<thead>
																										<tr>
																										  <th>Nº</th>
																										  <th>Designação</th>
																										  <th>Data Criação</th>
																										  <th>Tamanho</th>
																										  <th>Opções</th>
																										</tr>
																									</thead>
																									<tbody>
																										<!--Gerando a Tabela de forma Dinamica //23121997-->
																										@foreach ($backups as $backup)
																												<tr>
																													<td>{{ $loop->index+1}}</td>
																													<td>{{ $backup['name'] }}</td>
																													<td>{{ \Carbon\Carbon::createFromTimestamp($backup['created_at'])->format('d/m/Y H:i:s') }}</td>
																													<td>{{ formatBytes($backup['size']) }} </td>
																													<td>
																														<form action="{{ route('eliminar.backup') }}" method="GET" style="display: inline;">
																															@csrf
																															<input type="hidden" name="nome" value="{{ $backup['name'] }}">
																															<input type="hidden" name="dataCriacao" value="{{ \Carbon\Carbon::createFromTimestamp($backup['created_at'])->format('d/m/Y H:i:s') }}">
																															<button type="submit" class="btn btn-danger w-100 m-1" onclick="confirmAndSubmit(event, 'Confirmar deletar  o backup?', 'Sim, Deletar!', 'Não, Cancelar!')">Delectar</button>
																														</form>
																														<form action="{{ route('restaurar.backup') }}" method="GET" style="display: inline;">
																															@csrf
																															<input type="hidden" name="nomeBackup" value="{{ $backup['name'] }}">
																															<button type="submit" class="btn btn-success w-100 m-1">Restaurar</button>
																														</form>
																													</td>
																												</tr>
																										@endforeach
																									</tbody>
																									<tfoot>
																										<tr>
																										  <th>Nº</th>
																										  <th>Designação</th>
																										  <th>Data Criação</th>
																										  <th>Tamanho</th>
																										  <th>Opções</th>
																										</tr>
																									</tfoot>
																								</table>
																								<!--Fazer Backup dos Dados Agora-->
																								<form action="{{ route('criar.backup') }}" method="GET" style="display: inline;">
																									@csrf
																									<button type="submit" class="btn btn-primary w-100 mt-1">Fazer Backup Agora</button>
																								</form>
																							</div>
																						</div>
																					</div>
																				</div>
                                                                            </div>  
                                                               
            </section>
          <!-- /.content -->
        </div>
		</div>
        @endsection
  @section('scripts')
   <!--Time Picker-->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.0.0/dist/js/coreui.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.js"></script>


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
      <script src="{{ asset('plugins/sweetalert2/alerta-deletar.js') }} "></script>
	  <script>
	  
      //Select Optiom Submite, comando de Submiss]ao automatica //23121997
      document.getElementById('opcoes').addEventListener('change', function() {
          var selectedOption = this.value;
          document.getElementById(selectedOption).submit();
      });
      </script>
	  
      <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["excel", "pdf", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
      </script>
 @endsection