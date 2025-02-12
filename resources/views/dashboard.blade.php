
	<!-- /.content-header -->
							  <!-- Carregando tipos de Ciclos de Ensino -->
							  @php
								$ICiclo = "I Ciclo";
								$IICiclo = "II Ciclo";
								$primario = "Primário";
								$infancia = "Jardin de Infância";
							  @endphp
				<!-- Main content -->
<!--Layout Principal-->
@extends('layouts.app')
  @section('titulo' , 'DashBoard')
        @section('header')
        <!-- Styles //231297 -->

        @livewireStyles
        @endsection
  @section('conteudo_principal')
  <x-sgrhe-preloader />
    <div class="wrapper">
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<div class="content-header">
				  <div class="container-fluid">
					<div class="row mb-2">
					  <div class="col-sm-6">
						<h1 class="m-0">Dashboard Ano Lectivo {{ $anoLectivo }}</h1>
					  </div><!-- /.col -->
					  <div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
						  <li class="breadcrumb-item"><a href="#">Início</a></li>
						  <li class="breadcrumb-item active">Dashboard</li>
						</ol>
					  </div><!-- /.col -->
					</div><!-- /.row -->
				  </div><!-- /.container-fluid -->
				</div>

	
					<section class="content">
						<div class="container-fluid">
						
							<div class="row">
								<!-- Funcionário Activos-->
								<section class="col-lg-3 col-md-6 col-12 connectedSortable">
									<div class="card card-success card-outline">
										<div class="card-header border-0">
											<h3 class="card-title">
												<button type="button" class="btn btn-light btn-sm " data-card-widget="remove">
													<i class="fas fa-times font-weight-bold"></i>
												</button>
												Func. Activos
											</h3>
										</div>
										<div class="card-tools">
											<div class="col-lg-12 col-12 ">
												<div class="small-box bg-light">
													<div class="inner">
														<h3>{{ $funcionarios->where('estado', 'Activo')->count() }}</h3>
													</div>
													<div class="icon">
														<svg class="text-success" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 56 56" aria-hidden="true">
															<path fill="currentColor" d="M28 27.126c3.194 0 5.941-2.852 5.941-6.566c0-3.669-2.762-6.387-5.941-6.387s-5.942 2.778-5.942 6.417c0 3.684 2.748 6.536 5.942 6.536m-17.097.341c2.763 0 5.17-2.495 5.17-5.718c0-3.194-2.422-5.556-5.17-5.556c-2.763 0-5.199 2.421-5.184 5.585c0 3.194 2.406 5.69 5.184 5.69m34.194 0c2.778 0 5.184-2.495 5.184-5.689c0-3.164-2.421-5.585-5.184-5.585c-2.748 0-5.17 2.362-5.17 5.555c0 3.224 2.407 5.72 5.17 5.72M2.614 40.881h11.29c-1.545-2.243.341-6.759 3.535-9.225c-1.65-1.099-3.773-1.916-6.55-1.916C4.188 29.74 0 34.686 0 38.801c0 1.337.743 2.08 2.614 2.08m50.772 0c1.886 0 2.614-.743 2.614-2.08c0-4.115-4.189-9.061-10.888-9.061c-2.778 0-4.902.817-6.55 1.916c3.193 2.466 5.08 6.982 3.535 9.225Zm-34.73 0h18.672c2.332 0 3.164-.669 3.164-1.976c0-3.832-4.798-9.12-12.507-9.12c-7.694 0-12.492 5.288-12.492 9.12c0 1.307.832 1.976 3.164 1.976"/>
														</svg>
													</div>
													<form action="{{ route('funcionarios') }}" class="text-center small-box-footer">
														@csrf
														@method('POST')
														<input type="hidden" name="titulo" value="Funcionários Activos">
														<input type="hidden" name="estado" value="Activo">
														<input type="submit" value="Ver mais" class="btn btn-outline-dark" title="Clique para ver todos os funcionários ativos">
													</form>
												</div>
											</div>
										</div>
									</div>
								</section>
								<!-- Funcionário -->
								<section class="col-lg-3 col-md-6 col-12 connectedSortable">
									<div class="card card-primary card-outline">
										<div class="card-header border-0">
											<h3 class="card-title">
												<button type="button" class="btn btn-light btn-sm " data-card-widget="remove">
													<i class="fas fa-times font-weight-bold"></i>
												</button>
												Funcionários
											</h3>
										</div>
										<div class="card-tools">
											<div class="col-lg-12 ">
												<div class="small-box bg-light">
													<div class="inner">
														<h3>{{ $funcionarios->count() }}</h3>
													</div>
													<div class="icon">
														<svg class="text-primary" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 56 56"><path fill="currentColor" d="M28 27.126c3.194 0 5.941-2.852 5.941-6.566c0-3.669-2.762-6.387-5.941-6.387s-5.942 2.778-5.942 6.417c0 3.684 2.748 6.536 5.942 6.536m-17.097.341c2.763 0 5.17-2.495 5.17-5.718c0-3.194-2.422-5.556-5.17-5.556c-2.763 0-5.199 2.421-5.184 5.585c0 3.194 2.406 5.69 5.184 5.69m34.194 0c2.778 0 5.184-2.495 5.184-5.689c0-3.164-2.421-5.585-5.184-5.585c-2.748 0-5.17 2.362-5.17 5.555c0 3.224 2.407 5.72 5.17 5.72M2.614 40.881h11.29c-1.545-2.243.341-6.759 3.535-9.225c-1.65-1.099-3.773-1.916-6.55-1.916C4.188 29.74 0 34.686 0 38.801c0 1.337.743 2.08 2.614 2.08m50.772 0c1.886 0 2.614-.743 2.614-2.08c0-4.115-4.189-9.061-10.888-9.061c-2.778 0-4.902.817-6.55 1.916c3.193 2.466 5.08 6.982 3.535 9.225Zm-34.73 0h18.672c2.332 0 3.164-.669 3.164-1.976c0-3.832-4.798-9.12-12.507-9.12c-7.694 0-12.492 5.288-12.492 9.12c0 1.307.832 1.976 3.164 1.976"/></svg>
													</div>
													<form action="{{ route('funcionarios') }}" class="text-center small-box-footer">
														@csrf
														@method('POST')
														<input type="hidden" name="titulo" value="Funcionários">
														<input type="hidden" name="estado" value="Todo">
														<input type="submit" value="Ver mais" class="btn btn-outline-dark" title="Clique para ver todos os funcionários">
													</form>
												</div>
											</div>
										</div>
									</div>
								</section>
								<!-- Funcionário Aposentados-->
								<section class="col-lg-3 col-md-6 col-12 connectedSortable">
									<div class="card card-danger card-outline">
										<div class="card-header border-0">
											<h3 class="card-title">
												<button type="button" class="btn btn-light btn-sm " data-card-widget="remove">
													<i class="fas fa-times font-weight-bold"></i>
												</button>
												Func. Aposentados
											</h3>
										</div>
										<div class="card-tools">
											<div class="col-lg-12 ">
												<div class="small-box bg-light">
													<div class="inner">
														 <h3>{{ $funcionarios->where('estado', 'Aposentado')->count() }}</h3>
													</div>
													<div class="icon">
														 <svg class="text-danger" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><g fill="currentColor"><path d="M11 5a3 3 0 1 1-6 0a3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4a2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/><path d="M12.5 16a3.5 3.5 0 1 0 0-7a3.5 3.5 0 0 0 0 7m-.646-4.854l.646.647l.646-.647a.5.5 0 0 1 .708.708l-.647.646l.647.646a.5.5 0 0 1-.708.708l-.646-.647l-.646.647a.5.5 0 0 1-.708-.708l.647-.646l-.647-.646a.5.5 0 0 1 .708-.708"/></g></svg>
													</div>
													<form action="{{ route('funcionarios') }}" class="text-center small-box-footer">
														@csrf
														@method('POST')
														<input type="hidden" name="titulo" value="Funcionários Aposentados">
														<input type="hidden" name="estado" value="Aposentado">
														<input type="submit" value="Ver mais" class="btn btn-outline-dark" title="Clique para ver todos os funcionários aposentados">
													</form>
												</div>
											</div>
										</div>
									</div>
								</section>
								<!-- Funcionário em Licenca-->
								<section class="col-lg-3 col-md-6 col-12 connectedSortable">
										<div class="card card-warning card-outline">
											<div class="card-header border-0">
												<h3 class="card-title">
													<button type="button" class="btn btn-light btn-sm " data-card-widget="remove">
														<i class="fas fa-times font-weight-bold"></i>
													</button>
													Func. em Licença
												</h3>
											</div>
											<div class="card-tools">
											<div class="col-lg-12 ">
												<div class="small-box bg-light">
													<div class="inner">
														 <h3>{{ $funcionarios->where('estado', 'Aposentado')->count() }}</h3>
													</div>
													<div class="icon">
														 <svg class="text-warning" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" d="M9.626 5.07a5.5 5.5 0 0 0-3.299 1.847A2.751 2.751 0 1 1 9.626 5.07M5.6 8c-.384.75-.6 1.6-.6 2.5c0 1.31.458 2.512 1.222 3.457C3.555 13.653 2 11.803 2 10v-.5A1.5 1.5 0 0 1 3.5 8zm4.275.5a.625.625 0 1 1 1.25 0a.625.625 0 0 1-1.25 0m1.125 4a.5.5 0 0 1-1 0v-2a.5.5 0 0 1 1 0zm-5-2a4.5 4.5 0 1 1 9 0a4.5 4.5 0 0 1-9 0m1 0a3.5 3.5 0 1 0 7 0a3.5 3.5 0 0 0-7 0"/></svg>
													</div>
													<form action="{{ route('funcionarios') }}" class="text-center small-box-footer">
														@csrf
														@method('POST')
														<input type="hidden" name="titulo" value="Funcionários em Licença">
														<input type="hidden" name="estado" value="Licenca">
														<input type="submit" value="Ver mais" class="btn btn-outline-dark" title="Clique para ver todos os funcionários em licença">
													</form>
												</div>
											</div>
										</div>
										</div>
								</section>
							</div>	
							
							<div class="row">	
									<!-- Unidades Organicas -->
									<section class="col-lg-6 connectedSortable">
										<div class="card card-info card-outline">
											<div class="card-header border-0">
												<h3 class="card-title">
													<button type="button" class="btn btn-light btn-sm " data-card-widget="remove">
														<i class="fas fa-times font-weight-bold"></i>
													</button>
													Unidades Orgânicas
												</h3>
											</div>
											<div class="card-tools">
											<div class="col-lg-12 ">
												<div class="small-box bg-light">
													<div class="inner">
														<h3>{{ $unidadesOrganicas->count()-1 }}</h3>
													</div>
													<div class="icon">
														 <svg class="text-info" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 10h-2V4h1V2H4v2h1v6H3a1 1 0 0 0-1 1v9h20v-9a1 1 0 0 0-1-1m-7 8v-4h-4v4H7V4h10v14z"/><path fill="currentColor" d="M9 6h2v2H9zm4 0h2v2h-2zm-4 4h2v2H9zm4 0h2v2h-2z"/></svg>
													</div>
													<form action="{{ route('unidades.organicas') }}" class="text-center small-box-footer">
														@csrf
														@method('POST')
														<input type="hidden" name="titulo" value="Unidades Orgânicas">
														<input type="hidden" name="nivelEnsino" value="Todo">
														<input type="submit" value="Unidades Orgânicas" class="btn btn-outline-dark" title="Clique para ver todos as unidades Orgânicas">
													</form>
												</div>
											</div>
										</div>
										</div>
									</section>
									<!-- Escolas Primárias -->
									<section class="col-md-6 connectedSortable">
										<div class="card card-info card-outline">
											<div class="card-header border-0">
												<h3 class="card-title">
													<button type="button" class="btn btn-light btn-sm " data-card-widget="remove">
														<i class="fas fa-times font-weight-bold"></i>
													</button>
													Escolas Primárias
												</h3>
											</div>
											<div class="card-tools">
											<div class="col-lg-12 ">
												<div class="small-box bg-light">
													<div class="inner">
														<h3>{{ App\Models\UnidadeOrganica::where('nivelEnsino','like',"%{$primario}%")->count() }}</h3>
													</div>
													<div class="icon">
														<svg class="text-info" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 64 64"><path fill="currentColor" d="M59.66 28.397L35.004 3.263C34.205 2.449 33.139 2 32.001 2s-2.204.449-3.002 1.263L4.342 28.396C3.007 29.756 2 32.23 2 34.152v23.542C2 60.068 3.901 62 6.239 62h51.525C60.1 62 62 60.068 62 57.694V34.152c0-1.923-1.006-4.397-2.34-5.755m-.806 29.297c0 .611-.499 1.128-1.091 1.128H6.239c-.593 0-1.093-.517-1.093-1.128V34.152c0-1.079.681-2.756 1.43-3.519L31.233 5.5c.204-.208.477-.322.768-.322c.292 0 .563.114.769.323l24.657 25.135c.748.761 1.428 2.438 1.428 3.518z"/><path fill="currentColor" d="M36.967 26.833c2.772 0 5.013-2.267 5.013-5.063s-2.24-5.061-5.013-5.061c-2.763 0-5.007 2.265-5.007 5.061s2.244 5.063 5.007 5.063"/><ellipse cx="24.801" cy="25.881" fill="currentColor" rx="4.068" ry="4.11"/><path fill="currentColor" d="m46.139 43.05l1.611-4.099l-3.808-1.528l2.433-4.857a1.072 1.072 0 0 0-.088-1.102l-3.211-4.454c-.029-.042-.074-.065-.109-.102c-.024-.026-.035-.062-.062-.084c-.02-.017-.046-.019-.065-.034a1.038 1.038 0 0 0-.273-.14c-.044-.015-.083-.037-.129-.047a1.02 1.02 0 0 0-.45-.001l-7.192 1.708a1.04 1.04 0 0 0-.783.895c-.007.012-.019.02-.025.032l-2.715 5.665l-2.169-3.443c-.06-.094-.138-.16-.218-.229a1.017 1.017 0 0 0-.168-.321a1.045 1.045 0 0 0-.8-.375H21.68c-.025 0-.047.015-.072.017a1.04 1.04 0 0 0-1.059.527l-2.268 4.109l-4.04 3.023a1.068 1.068 0 0 0-.219 1.482a1.044 1.044 0 0 0 1.467.221l4.222-3.16c.119-.09.219-.204.291-.336l1.041-1.887l.525 3.645l-3.097 6.25c-.164.33-.146.723.048 1.035c.191.31.527.498.89.498h.011l.24-.003l-.595 1.248a1.038 1.038 0 0 0-.103.409l-.316 6.669a1.053 1.053 0 0 0 .997 1.108l.052.002c.556 0 1.019-.441 1.046-1.009l.306-6.455l.951-1.995l3.08-.031l.14 1.164c.017.137.06.271.126.391l3.855 6.941c.193.346.549.541.916.541c.174 0 .35-.044.512-.136c.506-.286.685-.933.401-1.442l-3.753-6.758l-.087-.724l2.257-.022c.348-.004.672-.182.863-.475c.192-.293.228-.664.095-.989l-.757-1.852l1.996.571l.811-2.897l-1.956-.56l.815-2.431l1.17-.542c.221-.104.4-.28.506-.502l1.241-2.59l.39 6.756c.002.015.01.026.011.041l-2.106 4.234a1.595 1.595 0 0 0-.164.813l.575 9.325a1.58 1.58 0 0 0 1.567 1.489c.033 0 .066 0 .1-.002a1.586 1.586 0 0 0 1.473-1.686l-.549-8.896l2.148-4.32h1.244l-.224 3.992c-.019.326.063.65.233.928l5.191 8.452a1.568 1.568 0 0 0 2.166.513a1.6 1.6 0 0 0 .506-2.188l-4.929-8.024l.202-3.604zm-3.045-12.416l1.119 1.553l-1.385 2.768zM29.48 36.083v.004l-1.005 2.99l-.278-.079l-.314-.771l.623-3.771l.992 1.575z"/></svg>
													</div>
													<form action="{{ route('unidades.organicas') }}" class="text-center small-box-footer">
														@csrf
														@method('POST')
														<input type="hidden" name="titulo" value="Escolas Primárias">
														<input type="hidden" name="nivelEnsino" value="Primário">
														<input type="submit" value="Escolas Primárias" class="btn btn-outline-dark" title="Clique para ver todas as escolas primárias">
													</form>
												</div>
											</div>
										</div>
										</div>
									</section>
							
									<!--Escola do 1º Ciclo do Ensino Secundário -->
								  
									<section class="col-md-6 connectedSortable">
										<div class="card card-info card-outline">
											<div class="card-header border-0">
												<h3 class="card-title">
													<button type="button" class="btn btn-light btn-sm " data-card-widget="remove">
														<i class="fas fa-times font-weight-bold"></i>
													</button>
													Escolas com I Ciclo Secundário
												</h3>
											</div>
											<div class="card-tools">
											<div class="col-lg-12 ">
												<div class="small-box bg-light">
													<div class="inner">
														<h3>{{ App\Models\UnidadeOrganica::where('nivelEnsino','like',"%{$ICiclo}%")->count()-1 }}</h3>
													</div>
													<div class="icon">
														<svg class="text-info" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="currentColor" d="M18 10.5V6l-2.11 1.06A4 4 0 0 1 12 12a4 4 0 0 1-3.89-4.94L5 5.5L12 2l7 3.5v5zM12 9l-2-1c0 1.1.9 2 2 2s2-.9 2-2zm2.75-3.58L12.16 4.1L9.47 5.47l2.6 1.32zM12 13c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4m0 1.9c-3 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1"/></svg>
													</div>
													<form action="{{ route('unidades.organicas') }}" class="text-center small-box-footer">
														@csrf
														@method('POST')
														<input type="hidden" name="titulo" value="Escolas Secundárias do I Ciclo">
														<input type="hidden" name="nivelEnsino" value="I Ciclo">
														<input type="submit" value="Escolas do I Ciclo" class="btn btn-outline-dark" title="Clique para ver todas as escolas do I ciclo">
													</form>
												</div>
											</div>
										</div>
										</div>
									</section>
									
						  
									<!--Escola do 2º Ciclo do Ensino Secundário -->
								 
									<section class="col-md-6 connectedSortable">
										<div class="card card-info card-outline">
											<div class="card-header border-0">
												<h3 class="card-title">
													<button type="button" class="btn btn-light btn-sm " data-card-widget="remove">
														<i class="fas fa-times font-weight-bold"></i>
													</button>
													Escolas com II Ciclo Secundário(Liceu)
												</h3>
											</div>
											<div class="card-tools">
											<div class="col-lg-12 ">
												<div class="small-box bg-light">
													<div class="inner">
														 <h3>{{ App\Models\UnidadeOrganica::where('nivelEnsino','like',"%{$IICiclo}%")->count() }}</h3>
													</div>
													<div class="icon">
														<svg class="text-info" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24"><path fill="currentColor" d="M16 8c0 2.21-1.79 4-4 4s-4-1.79-4-4l.11-.94L5 5.5L12 2l7 3.5v5h-1V6l-2.11 1.06zm-4 6c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"/></svg>
													</div>
													<form action="{{ route('unidades.organicas') }}" class="text-center small-box-footer">
														@csrf
														@method('POST')
														<input type="hidden" name="titulo" value="Escolas Secundárias do II Ciclo">
														<input type="hidden" name="nivelEnsino" value="II Ciclo">
														<input type="submit" value="Escolas do II Ciclo" class="btn btn-outline-dark" title="Clique para ver todas as escolas do II ciclo">
													</form>
												</div>
											</div>
										</div>
										</div>
									</section>
									
							  
									<!--Tota de Alunos {{ $aproveitamentosI->sum('matriculadosMF') }}-->
									<section class="col-lg-12 connectedSortable">
										<div class="card card-primary card-outline">
											<div class="card-header border-0">
												<h3 class="card-title">
													<button type="button" class="btn btn-light btn-sm " data-card-widget="remove">
														<i class="fas fa-times font-weight-bold"></i>
													</button>
													Estatísticas dos Alunos
												</h3>
											</div>
											<div class="card-tools">
											<div class="col-lg-12 ">
												<div class="small-box bg-light">
													<div class="inner">
														<h3>{{ $aproveitamentosI->sum('matriculadosMF') }} Alunos</h3>
														<p><span style="font-size: 30px;"> {{ $aproveitamentosI->sum('matriculadosMF') == 0 ? 'Sem Dados' : round(($aproveitamentosI->sum('matriculadosF')*100)/$aproveitamentosI->sum('matriculadosMF'), 2).'%' }} </span> Femininos: {{ $aproveitamentosI->sum('matriculadosF')}} Alunas</p>
														<p><span style="font-size: 30px;"> {{ $aproveitamentosI->sum('matriculadosMF') == 0 ? 'Sem Dados' : round((($aproveitamentosI->sum('matriculadosMF')-$aproveitamentosI->sum('matriculadosF'))*100)/$aproveitamentosI->sum('matriculadosMF'), 2).'%' }}</span> Masculinos: {{ $aproveitamentosI->sum('matriculadosMF')-$aproveitamentosI->sum('matriculadosF')}} Alunos</p>
									
													</div>
													<div class="icon">
														 <i class="ion ion-stats-bars text-primary" style="font-size: 10em;"></i>
													</div>								
												</div>
											</div>
										</div>
										</div>
									</section>
							</div>	
							
							<div class="row">
									<section class="col-lg-12 connectedSortable">
									  <div class="card">
										<div class="card-header">
										  <h3 class="card-title">
											<br>
											<p>
											<i class="fas fa-chart-pie mr-1"></i> Aproveitamento Escolar
											</p>
											<br>
										  </h3>
										  <div class="card-tools">
											<br>
											<button id="line-btn" class="btn btn-primary">Grafico de Linhas</button>
											<button id="bar-btn" class="btn btn-primary">Grafico de Barras</button>
											<button id="pie-btn" class="btn btn-primary d-none">Pie Chart</button>
										  </div>
										</div>
										<div class="card-body">
											<div class="chart tab-pane active" id="sales-chart" style="width: 100%; height: 400px;"> 
											  <canvas id="doubleDatasetChart" ></canvas>
											</div>
										</div>
									  </div>
									</section>
							</div>
							
				
							<div class="row">
									<!--col -->
									<div class="col-md-12">
											<div class="card connectedSortable">
												<div class="card-header p-2">
													<ul class="nav nav-pills">
													  <li class="nav-item"><a class="nav-link active" href="#I" data-toggle="tab">I Trimestre</a></li>
													  <li class="nav-item"><a class="nav-link" href="#II" data-toggle="tab"> II Trimestre</a></li>
													  <li class="nav-item"><a class="nav-link" href="#III" data-toggle="tab"> III Trimestre</a></li>
													  <li class="nav-item"><a class="nav-link" href="#F" data-toggle="tab">Final</a></li>
													</ul>
												</div><!-- /.card-header -->
												<div class="card-body">
													<div class="tab-content">
														<div class="tab-pane active" id="I">
														  <div class="card-info">
															<div class="card-header">
															  <h3 class="car-title">
																Status de Submisão de Formuário de Aproveitamento {{ $anoLectivo }}
															  </h3>
															</div>
															<div class="card-body">
															  <div class="table-responsive">
																<table class="table table-hover table-bordered border-secondary table-striped">
																  <thead>
																	<tr>
																	  <th>Unidade Organica</th>
																	  <th>Nível de Ensino</th>
																	  <th>Alunos</th>
																	  <th>Localidade</th>
																	  <th>Director</th>
																	  <th>Telefone</th>
																	  <th>Status</th>
																	  <th>Opções</th>
																	</tr>
																  </thead>
																  <tbody>
																	@foreach($SubControlInIs as $SubControlInI)
																	  <tr>
																		<td>
																		  {{$SubControlInI->designacao}}
																		</td>
																		<td>
																		  {{$SubControlInI->nivelEnsino}}
																		</td>


																		<td>
																		  <span class="font-weight-bold">MF:</span> {{ $aproveitamentosI->where('idUnidadeOrganica', $SubControlInI->id)->sum('matriculadosMF') }}<br>
																		  <span class="font-weight-bold">M:</span> {{ $aproveitamentosI->where('idUnidadeOrganica', $SubControlInI->id)->sum('matriculadosMF')-$aproveitamentosI->where('idUnidadeOrganica', $SubControlInI->id)->sum('matriculadosF') }}<br>
																		  <span class="font-weight-bold">F:</span> {{ $aproveitamentosI->where('idUnidadeOrganica', $SubControlInI->id)->sum('matriculadosF') }}<br>                                                      
																		</td>
																		
																		
																		<td>
																		  {{$SubControlInI->localidade}}
																		</td>
																		<td>
																		  N/D
																		</td>
																		<td>
																		  {{$SubControlInI->telefone}}
																		</td>
																		<td class=" text-success">
																		  Formulário Submetido
																		</td>
																		<td>
																		<form action="{{ route('unidadeOrganica.show', ['idUnidadeOrganica' => $SubControlInI->id]) }}" method="POST" style="display: inline;">
																		  @csrf
																		  @method('PUT')
																			<button type="submit" class="btn btn-primary w-100 m-1">Ver Unidade Orgânica</button>
																		</form>
																		</td>
																	  </tr>
																	@endforeach
																	@foreach($SubControlNonIs as $SubControlNonI)
																	  <tr>
																		<td>
																		  {{$SubControlNonI->designacao}}
																		</td>
																		<td>
																		  {{$SubControlNonI->nivelEnsino}}
																		</td>
																		<td>
																		  N/D
																		</td>
																		<td>
																		  {{$SubControlNonI->localidade}}
																		</td>
																		<td>
																		  N/D
																		</td>
																		<td>
																		  {{$SubControlNonI->telefone}}
																		</td>
																		<td class=" text-danger">
																		  Não Submeteu o Formulário
																		</td>
																		<td>
																		<form action="{{ route('unidadeOrganica.show', ['idUnidadeOrganica' => $SubControlNonI->id]) }}" method="POST" style="display: inline;">
																		  @csrf
																		  @method('PUT')
																			<button type="submit" class="btn btn-primary w-100 m-1">Ver Unidade Orgânica</button>
																		</form>
																		</td>
																	  </tr>
																	@endforeach
																  </tbody>
																</table>
															  </div>
															</div>
														  </div>
														</div>
														<div class="tab-pane" id="II">
														  <div class="card-info">
															<div class="card-header">
															  <h3 class="car-title">
																Status de Submisão de Formuário por Unidade Orgânica 
															  </h3>
															</div>
															<div class="card-body">
															  <div class="table-responsive">
																<table class="table table-hover table-bordered border-secondary table-striped">
																  <thead>
																	<tr>
																	  <th>Unidade Organica</th>
																	  <th>Nível de Ensino</th>
																	  <th>Alunos</th>
																	  <th>Localidade</th>
																	  <th>Director</th>
																	  <th>Telefone</th>
																	  <th>Status</th>
																	  <th>Opções</th>
																	</tr>
																  </thead>
																  <tbody>
																	@foreach($SubControlInIIs as $SubControlInII)
																	  <tr>
																		<td>
																		  {{$SubControlInII->designacao}}
																		</td>
																		<td>
																		  {{$SubControlInII->nivelEnsino}}
																		</td>
																		<td>
																		  <span class="font-weight-bold">MF:</span> {{ $aproveitamentosI->where('idUnidadeOrganica', $SubControlInII->id)->sum('matriculadosMF') }}<br>
																		  <span class="font-weight-bold">M:</span> {{ $aproveitamentosI->where('idUnidadeOrganica', $SubControlInII->id)->sum('matriculadosMF')-$aproveitamentosI->where('idUnidadeOrganica', $SubControlInII->id)->sum('matriculadosF') }}<br>
																		  <span class="font-weight-bold">F:</span> {{ $aproveitamentosI->where('idUnidadeOrganica', $SubControlInII->id)->sum('matriculadosF') }}<br>                                                      
																		</td>
																		<td>
																		  {{$SubControlInII->localidade}}
																		</td>
																		<td>
																		  N/D
																		</td>
																		<td>
																		  {{$SubControlInII->telefone}}
																		</td>
																		<td class=" text-success">
																		  Formulário Submetido
																		</td>
																		<td>
																		<form action="{{ route('unidadeOrganica.show', ['idUnidadeOrganica' => $SubControlInII->id]) }}" method="POST" style="display: inline;">
																		  @csrf
																		  @method('PUT')
																			<button type="submit" class="btn btn-primary w-100 m-1">Ver Unidade Orgânica</button>
																		</form>
																		</td>
																	  </tr>
																	@endforeach
																	@foreach($SubControlNonIIs as $SubControlNonII)
																	  <tr>
																		<td>
																		  {{$SubControlNonII->designacao}}
																		</td>
																		<td>
																		  {{$SubControlNonII->nivelEnsino}}
																		</td>

																		<td>
																		  N/D
																		</td>

																		<td>
																		  {{$SubControlNonII->localidade}}
																		</td>
																		<td>
																		  N/D
																		</td>
																		<td>
																		  {{$SubControlNonII->telefone}}
																		</td>
																		<td class=" text-danger">
																		  Não Submeteu o Formulário
																		</td>
																		<td>
																		<form action="{{ route('unidadeOrganica.show', ['idUnidadeOrganica' => $SubControlNonII->id]) }}" method="POST" style="display: inline;">
																		  @csrf
																		  @method('PUT')
																			<button type="submit" class="btn btn-primary w-100 m-1">Ver Unidade Orgânica</button>
																		</form>
																		</td>
																	  </tr>
																	@endforeach
																  </tbody>
																</table>
															  </div>
															</div>
														  </div>
														</div>
														<div class="tab-pane" id="III">
														  <div class="card-info">
															<div class="card-header">
															  <h3 class="car-title">
																Status de Submisão de Formuário por Unidade Orgânica 
															  </h3>
															</div>
															<div class="card-body">
															  <div class="table-responsive">
																<table class="table table-hover table-bordered border-secondary table-striped">
																  <thead>
																	<tr>
																	  <th>Unidade Organica</th>
																	  <th>Nível de Ensino</th>
																	  <th>Alunos</th>
																	  <th>Localidade</th>
																	  <th>Director</th>
																	  <th>Telefone</th>
																	  <th>Status</th>
																	  <th>Opções</th>
																	</tr>
																  </thead>
																  <tbody>
																	@foreach($SubControlInIIIs as $SubControlInIII)
																	  <tr>
																		<td>
																		  {{$SubControlInIII->designacao}}
																		</td>
																		<td>
																		  {{$SubControlInIII->nivelEnsino}}
																		</td>
																		<td>
																		  <span class="font-weight-bold">MF:</span> {{ $aproveitamentosI->where('idUnidadeOrganica', $SubControlInIII->id)->sum('matriculadosMF') }}<br>
																		  <span class="font-weight-bold">M:</span> {{ $aproveitamentosI->where('idUnidadeOrganica', $SubControlInIII->id)->sum('matriculadosMF')-$aproveitamentosI->where('idUnidadeOrganica', $SubControlInIII->id)->sum('matriculadosF') }}<br>
																		  <span class="font-weight-bold">F:</span> {{ $aproveitamentosI->where('idUnidadeOrganica', $SubControlInIII->id)->sum('matriculadosF') }}<br>                                                      
																		</td>
																		<td>
																		  {{$SubControlInIII->localidade}}
																		</td>
																		<td>
																		  N/D
																		</td>
																		<td>
																		  {{$SubControlInIII->telefone}}
																		</td>
																		<td class=" text-success">
																		  Formulário Submetido
																		</td>
																		<td>
																		<form action="{{ route('unidadeOrganica.show', ['idUnidadeOrganica' => $SubControlInIII->id]) }}" method="POST" style="display: inline;">
																		  @csrf
																		  @method('PUT')
																			<button type="submit" class="btn btn-primary w-100 m-1">Ver Unidade Orgânica</button>
																		</form>
																		</td>
																	  </tr>
																	@endforeach
																	@foreach($SubControlNonIIIs as $SubControlNonIII)
																	  <tr>
																		<td>
																		  {{$SubControlNonIII->designacao}}
																		</td>
																		<td>
																		  {{$SubControlNonIII->nivelEnsino}}
																		</td>
																		<td>
																		  N/D
																		</td>
																		<td>
																		  {{$SubControlNonIII->localidade}}
																		</td>
																		<td>
																		  N/D
																		</td>
																		<td>
																		  {{$SubControlNonIII->telefone}}
																		</td>
																		<td class=" text-danger">
																		  Não Submeteu o Formulário
																		</td>
																		<td>
																		<form action="{{ route('unidadeOrganica.show', ['idUnidadeOrganica' => $SubControlNonIII->id]) }}" method="POST" style="display: inline;">
																		  @csrf
																		  @method('PUT')
																			<button type="submit" class="btn btn-primary w-100 m-1">Ver Unidade Orgânica</button>
																		</form>
																		</td>
																	  </tr>
																	@endforeach
																  </tbody>
																</table>
															  </div>
															</div>
														  </div>
														</div>
														<div class="tab-pane" id="F">
														  <div class="card-info">
															<div class="card-header">
															  <h3 class="car-title">
																Status de Submisão de Formuário por Unidade Orgânica 
															  </h3>
															</div>
															<div class="card-body ">
															  <div class="table-responsive">
																<table class="table table-hover table-bordered border-secondary table-striped">
																  <thead>
																	<tr>
																	  <th>Unidade Organica</th>
																	  <th>Nível de Ensino</th>
																	  <th>Alunos</th>
																	  <th>Localidade</th>
																	  <th>Director</th>
																	  <th>Telefone</th>
																	  <th>Status</th>
																	  <th>Opções</th>
																	</tr>
																  </thead>
																  <tbody>
																	@foreach($SubControlInFinals as $SubControlInFinal)
																	  <tr>
																		<td>
																		  {{$SubControlInFinal->designacao}}
																		</td>
																		<td>
																		  {{$SubControlInFinal->nivelEnsino}}
																		</td>

																		<td>
																		  <span class="font-weight-bold">MF:</span> {{ $aproveitamentosI->where('idUnidadeOrganica', $SubControlInFinal->id)->sum('matriculadosMF') }}<br>
																		  <span class="font-weight-bold">M:</span> {{ $aproveitamentosI->where('idUnidadeOrganica', $SubControlInFinal->id)->sum('matriculadosMF')-$aproveitamentosI->where('idUnidadeOrganica', $SubControlInFinal->id)->sum('matriculadosF') }}<br>
																		  <span class="font-weight-bold">F:</span> {{ $aproveitamentosI->where('idUnidadeOrganica', $SubControlInFinal->id)->sum('matriculadosF') }}<br>                                                      
																		</td>




																		<td>
																		  {{$SubControlInFinal->localidade}}
																		</td>
																		<td>
																		  N/D
																		</td>
																		<td>
																		  {{$SubControlInFinal->telefone}}
																		</td>
																		<td class=" text-success">
																		  Formulário Submetido
																		</td>
																		<td>
																		<form action="{{ route('unidadeOrganica.show', ['idUnidadeOrganica' => $SubControlInFinal->id]) }}" method="POST" style="display: inline;">
																		  @csrf
																		  @method('PUT')
																			<button type="submit" class="btn btn-primary w-100 m-1">Ver Unidade Orgânica</button>
																		</form>
																		</td>
																	  </tr>
																	@endforeach
																	@foreach($SubControlNonFinals as $SubControlNonFinal)
																	  <tr>
																		<td>
																		  {{$SubControlNonFinal->designacao}}
																		</td>
																		<td>
																		  {{$SubControlNonFinal->nivelEnsino}}
																		</td>
																		<td>
																		  N/D
																		</td>
																		<td>
																		  {{$SubControlNonFinal->localidade}}
																		</td>
																		<td>
																		  N/D
																		</td>
																		<td>
																		  {{$SubControlNonFinal->telefone}}
																		</td>
																		<td class=" text-danger">
																		  Não Submeteu o Formulário
																		</td>
																		<td>
																		<form action="{{ route('unidadeOrganica.show', ['idUnidadeOrganica' => $SubControlNonFinal->id]) }}" method="POST" style="display: inline;">
																		  @csrf
																		  @method('PUT')
																			<button type="submit" class="btn btn-primary w-100 m-1">Ver Unidade Orgânica</button>
																		</form>
																		</td>
																	  </tr>
																	@endforeach
																  </tbody>
																</table>
															  </div>
															</div>
														  </div>
														</div>
													</div>
												</div>
											</div>
									</div>      
							</div>
						</div>
					</section>
			</div>
	</div>
	<!-- /.content-wrapper -->
  @endsection
  @section('scripts')
			<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
            <script src="{{ asset('plugins/sweetalert2/alerta-deletar.js')}}"></script>  
            <!-- ChartJS -->
            <script src="{{ asset('plugins/chart.js/Chart.min.js') }} "></script>
            <!-- Sparkline -->
            <script src="{{ asset('plugins/sparklines/sparkline.js') }} "></script>
            <!-- Summernote / Calendar -->
            <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }} "></script>
            <!-- jQuery Knob Chart -->
            <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }} "></script>
         
       
            <!--Aproveitamento Graficos -->
            <script>
              // Estrutura dos 
              const data = {
                labels: ['I Trimestre', 'II Trimestre', 'III Trimestre', 'Final'],
                datasets: [
                  {
                    label: 'Aprovados',
                    data: [ ("{{ $aproveitamentosI->sum('matriculadosMF') != 0 ? round($aproveitamentosI->sum('aprovadosMF')*100/($aproveitamentosI->sum('matriculadosMF')), 1) : 0 }}"), ("{{ $aproveitamentosI->sum('matriculadosMF') != 0 ? round($aproveitamentosII->sum('aprovadosMF')*100/($aproveitamentosI->sum('matriculadosMF')), 1) : 0 }}"), ("{{ $aproveitamentosI->sum('matriculadosMF') != 0 ? round($aproveitamentosIII->sum('aprovadosMF')*100/($aproveitamentosI->sum('matriculadosMF')), 1) : 0 }}"), ("{{ $aproveitamentosI->sum('matriculadosMF') != 0 ? round($aproveitamentosFinal->sum('aprovadosMF')*100/($aproveitamentosI->sum('matriculadosMF')), 1) : 0 }}")],
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 5,
                  },
                  {
                    label: 'Reprovados',
                    data: [ ("{{ $aproveitamentosI->sum('matriculadosMF') != 0 ? round($aproveitamentosI->sum('reprovadosMF')*100/($aproveitamentosI->sum('matriculadosMF')), 1) : 0 }}"), ("{{ $aproveitamentosI->sum('matriculadosMF') != 0 ? round($aproveitamentosII->sum('reprovadosMF')*100/($aproveitamentosI->sum('matriculadosMF')), 1) : 0 }}"), ("{{ $aproveitamentosI->sum('matriculadosMF') != 0 ? round($aproveitamentosIII->sum('reprovadosMF')*100/($aproveitamentosI->sum('matriculadosMF')), 1) : 0 }}"), ("{{ $aproveitamentosI->sum('matriculadosMF') != 0 ? round($aproveitamentosFinal->sum('reprovadosMF')*100/($aproveitamentosI->sum('matriculadosMF')), 1) : 0 }}")],
                    backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 3,
                  },
                ],
              };

              // Chart configuration
              let config = {
                type: 'line',
                data: data,
                options: {
                  scales: {
                    x: {
                      stacked: true,
                    },
                    y: {
                      stacked: true,
                      beginAtZero: true,
                    },
                  },
                  responsive: true, // adiciona essa propriedade para tornar o gráfico responsivo
                  maintainAspectRatio: false, // adiciona essa propriedade para permitir que o gráfico se adapte à largura do container
                  layout: {
                    padding: {
                      left: 0,
                      right: 0,
                      top: 0,
                      bottom: 0,
                    },
                  },
                },
              };

              // Create the chart
              const ctx = document.getElementById('doubleDatasetChart').getContext('2d');
              let chart = new Chart(ctx, config);

              // Add event listeners to the buttons
              document.getElementById('line-btn').addEventListener('click', () => {
                config.type = 'line';
                chart.destroy();
                chart = new Chart(ctx, config);
              });

              document.getElementById('bar-btn').addEventListener('click', () => {
                config.type = 'bar';
                chart.destroy();
                chart = new Chart(ctx, config);
              });

              document.getElementById('pie-btn').addEventListener('click', () => {
                config.type = 'pie';
                chart.destroy();
                chart = new Chart(ctx, config);
              });
            </script>   
            <!--/Aproveitamento Graficos-->

            <!-- Scripts de Gerenciamento de tabelas de aproveitamento por Classes em uma unidade organica -->
               <!--I Trimenstre-->
               <script>
                //I Trimenstre
                  $(function () {
                    $("#tabelaI").DataTable({
                      "responsive": true, "lengthChange": false, "autoWidth": false,
                      "buttons": ["excel", "pdf", "colvis"]
                    }).buttons().container().appendTo('#tabelaI_wrapper .col-md-6:eq(0)');

                //  II Trimenstre
                  $("#tabelaII").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["excel", "pdf", "colvis"]
                  }).buttons().container().appendTo('#tabelaII_wrapper .col-md-6:eq(0)');

                //  III Trimenstre
                $("#tabelaIII").DataTable({
                      "responsive": true, "lengthChange": false, "autoWidth": false,
                      "buttons": ["excel", "pdf", "colvis"]
                    }).buttons().container().appendTo('#tabelaIII_wrapper .col-md-6:eq(0)');
                //  Final Trimenstre
                $("#tabelaFinal").DataTable({
                        "responsive": true, "lengthChange": false, "autoWidth": false,
                        "buttons": ["excel", "pdf", "colvis"]
                      }).buttons().container().appendTo('#tabelaFinal_wrapper .col-md-6:eq(0)');
                  });
                
              </script>
    @endsection

