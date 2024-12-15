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
																							
                                                                                                    <label for="seccaoSelect">Selecione a Frequência do Backup:</label>
																									<!-- Select para Frequência -->
																									<select name="frequencia" class="form-control" id="frequencia">
																										<option selected="selected" value="Diario">Diário</option>
																										<option value="Semanalmente">Semanal</option>
																										<option value="Mensal">Mensal</option>
																									</select>

																									<!-- Select para Dias da Semana (inicialmente oculto) -->
																									<div id="dias-semana" style="display: none;">
																										<label for="dia-semana">Escolha o Dia da Semana</label>
																										<select name="dia-semana" id="dia-semana" class="form-control">
																											<option value="1">Segunda-feira</option>
																											<option value="2">Terça-feira</option>
																											<option value="3">Quarta-feira</option>
																											<option value="4">Quinta-feira</option>
																											<option value="5">Sexta-feira</option>
																											<option value="6">Sábado</option>
																											<option value="7">Domingo</option>
																										</select>
																									</div>
																									

																									<!-- Input de Data (inicialmente oculto) -->
																									<div id="data-mes" style="display: none;">
																										<label for="dia-mes">Escolha o Dia do Mês</label>
<input type="number" name="dia-mes" id="dia-mes" class="form-control">
																									</div>
																									<!-- Input de Hora -->
																									<label for="timePicker">Selecione a Hora:</label>
                                                                                                    <input type="time" class="form-control w-100 " id="timePicker" name="hora" required>
																									
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
																												<!-- Formulário de Restaurar -->
																														<form id="FormRestaurar_{{ $backup['name'] }}" action="{{ route('restaurar.backup') }}" method="POST" style="display: inline;">
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
																								<form id="ajaxForm" action="{{ route('criar.backup') }}" method="GET" style="display: inline;">
																									@csrf
																									<button type="submit" class="btn btn-primary w-100 mt-1">Fazer Backup</button>
																								</form>
																								
																								<!-- Indicador de carregamento -->
																								<div id="loading" class="mt-3" style="display:none;">
																									<div class="spinner-border text-primary" role="status">
																										<span class="sr-only">Carregando...</span>
																									</div>
																									<p>Fazendo Backup dos Dados...</p>
																								</div>

																								<!-- Mensagem de sucesso -->
																								<div id="successMessage" class="alert alert-success mt-3" style="display:none;"></div>

																								<!-- Mensagem de erro -->
																								<div id="errorMessage" class="alert alert-danger mt-3" style="display:none;"></div>
	
	
	
	
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
	  
	  <!--Ajax Requizicoes de fazer Backup e Restaurar  -->
	  
<script>
    $(document).ready(function() {
        $('#ajaxForm').on('submit', function(e) {
            e.preventDefault(); // Impede o envio tradicional do formulário

            // Exibe o indicador de carregamento
            $('#loading').show();

            // Faz a requisição Ajax
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    // Oculta o indicador de carregamento
                    $('#loading').hide();

                    // Exibe o SweetAlert de sucesso
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso!',
                        text: response.message,
                    });
                },
                error: function(xhr) {
                    // Oculta o indicador de carregamento
                    $('#loading').hide();

                    // Exibe o SweetAlert de erro
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: xhr.responseJSON.message || 'Ocorreu um erro inesperado.',
                    });
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function() {
        // Seleciona o formulário específico pelo ID dinâmico
        $('form[id^="FormRestaurar_"]').on('submit', function(e) {
            e.preventDefault();  // Impede o envio tradicional do formulário

            // Exibe o indicador de carregamento
            var form = $(this);
            var button = form.find('button[type="submit"]');
            $('#loading').show();  // Exibe o spinner de carregamento
            $('#successMessage').hide();  // Oculta a mensagem de sucesso
            $('#errorMessage').hide();    // Oculta a mensagem de erro

            // Desabilita o botão enquanto o processo está em andamento
            button.prop('disabled', true);
            button.text('Restaurando...');

            // Faz a requisição Ajax
            $.ajax({
                url: form.attr('action'),  // Pega a URL definida no action do formulário
                type: 'POST',  // Método POST para enviar os dados
                data: form.serialize(),  // Serializa os dados do formulário
                success: function(response) {
                    // Oculta o indicador de carregamento
                    $('#loading').hide();

                    // Exibe o SweetAlert de sucesso
                    Swal.fire({
                        icon: 'success',
                        title: 'Sucesso!',
                        text: response.message || 'Backup restaurado com sucesso.',
                    });

                    // Exibe a mensagem de sucesso
                    $('#successMessage').text(response.message).show();

                    // Restaura o botão
                    button.prop('disabled', false);
                    button.text('Restaurar');
                },
                error: function(xhr) {
                    // Oculta o indicador de carregamento
                    $('#loading').hide();

                    // Exibe o SweetAlert de erro
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro!',
                        text: xhr.responseJSON.message || 'Ocorreu um erro inesperado.',
                    });

                    // Exibe a mensagem de erro
                    $('#errorMessage').text(xhr.responseJSON.message || 'Erro ao restaurar o backup').show();

                    // Restaura o botão
                    button.prop('disabled', false);
                    button.text('Restaurar');
                }
            });
        });
    });
</script>


<!--Logica de Cntrole dos inputs do furmulario de seleccao de backup-->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Pega o select de frequência, div com dias e div com data
        var frequenciaSelect = document.getElementById("frequencia");
        var diasSemanaDiv = document.getElementById("dias-semana");
        var dataMesDiv = document.getElementById("data-mes");

        // Função para mostrar ou ocultar o select de dias da semana ou o input de data
        frequenciaSelect.addEventListener("change", function() {
            var valorSelecionado = frequenciaSelect.value;

            // Esconde todos os campos inicialmente
            diasSemanaDiv.style.display = "none";
            dataMesDiv.style.display = "none";

            // Exibe o campo correspondente
            if (valorSelecionado === "Semanalmente") {
                diasSemanaDiv.style.display = "block";  // Exibe o select de dias da semana
            } else if (valorSelecionado === "Mensal") {
                dataMesDiv.style.display = "block";  // Exibe o input de data
            }
        });

        // Disparar o evento de mudança quando a página carregar
        frequenciaSelect.dispatchEvent(new Event("change"));
    });
</script>

 @endsection