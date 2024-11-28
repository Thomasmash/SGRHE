<!--Layout Principal-->
@extends('layouts.app')
  @section('titulo' , 'Perfil - '.$pessoaLogado->nomeCompleto )
        @section('header')
          <!--Estilizacao do Previw foto de Perfil-->
          <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
          <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <h5>Opções da Conta / Perfil</h5>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Opções </li>
                    </ol>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <!--col -->
                      <div class="col-md-12">
                          <div class="card">
                            <div class="card-header p-2">
                              <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#informacoes" data-toggle="tab">Informações de Perfil</a></li>
                                <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Alterar Password</a></li>
                                <li class="nav-item"><a class="nav-link" href="#doisfactores" data-toggle="tab">Autenticação em dois factores</a></li>
                                <li class="nav-item"><a class="nav-link" href="#sessoes" data-toggle="tab">Sessões em Browsers</a></li>
                                <!--Essa Funcao é por enquanto Escluxiva do Admin para finc de Controle-->
                                <li class="nav-item"><a class="nav-link" href="#delete" data-toggle="tab">Deletar a Conta</a></li>
                              </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                              <div class="tab-content">
                                  <!--tab-pane-->
                                    <div class="active tab-pane" id="informacoes">
                                                  <div class="card-body">
                                                  @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                                  @livewire('profile.update-profile-information-form')
                                                  @endif                     
                                                  </div>
                                    </div>
                                  <!--/tab-pane-->
                                  <!--tab-pane-->
                                     <div class="tab-pane" id="password">
                                                  <div class="card-body">
                                                  @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                                  <div class="mt-10 sm:mt-0">
                                                  @livewire('profile.update-password-form')
                                                  </div>
                                                  @endif                     
                                                  </div>
                                     </div>
                                  <!--/tab-pane-->
                                  <!--tab-pane-->
                                    <div class="tab-pane" id="doisfactores">
                                                  <div class="card-body">
                                                  @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                                  <div class="mt-10 sm:mt-0">
                                                  @livewire('profile.two-factor-authentication-form')
                                                  </div>
                                                  @endif                         
                                                  </div>
                                    </div>
                                  <!-- /tab-pane -->
                                  <!--tab-pane-->
                                    <div class="tab-pane" id="sessoes">
                                                  <div class="card-body">
                                                  <div class="mt-10 sm:mt-0">
                                                  @livewire('profile.logout-other-browser-sessions-form')
                                                  </div>                         
                                                  </div>       
                                    </div>                             
                                  <!-- /tab-pane -->
                                  <!--tab-pane-->
                                   <div class="tab-pane" id="delete">
                                                  <div class="card-body">
                                                  @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                                                  <div class="mt-10 sm:mt-0">
                                                  @livewire('profile.delete-user-form')
                                                  </div>
                                                  @endif  
                                                  </div>
                                    </div>
                                  <!-- /tab-pane -->
                              </div>
                            </div>
                          </div>
                      </div>
                  <!--/col -->        
                </div>
              </div>
                <!-- /.row -->
            </section>
          <!-- /.content -->
        </div>
              <!--Modal Solicitar-->
               <x-sgrhe-modal-solicitar />
              <!--/Modal Solicitar-->
			  </div>
        @endsection
  @section('scripts')
 @endsection