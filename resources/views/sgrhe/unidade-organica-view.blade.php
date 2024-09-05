<!--Layout Principal-->
@extends('layouts.app')
  @section('titulo' , 'DashBoard Unidade Orgânica')
        @section('header')
        <!-- Styles -->
        <style>
          .row > a {
            margin: 10px;
          }
          th{
            width:20px;
          }
        </style>
        @endsection
  @section('conteudo_principal')
  <x-sgrhe-preloader />
      <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>{{  $unidadeOrganicaSelected->designacao  }} {{$anoLectivo}}</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active"> {{$unidadeOrganicaSelected->designacao}} </li>
                    </ol>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
              <section class="content">
                <div class="container-fluid">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                    <!-- Funcionário -->
                    <div class="col-lg-3 col-6">
                      <div class="small-box bg-primary">
                        <div class="inner">
                          <h3>{{ $Funcionarios->count() }}</h3>
                          <p>Funcionários </p>
                        </div>
                        <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 56 56"><path fill="currentColor" d="M28 27.126c3.194 0 5.941-2.852 5.941-6.566c0-3.669-2.762-6.387-5.941-6.387s-5.942 2.778-5.942 6.417c0 3.684 2.748 6.536 5.942 6.536m-17.097.341c2.763 0 5.17-2.495 5.17-5.718c0-3.194-2.422-5.556-5.17-5.556c-2.763 0-5.199 2.421-5.184 5.585c0 3.194 2.406 5.69 5.184 5.69m34.194 0c2.778 0 5.184-2.495 5.184-5.689c0-3.164-2.421-5.585-5.184-5.585c-2.748 0-5.17 2.362-5.17 5.555c0 3.224 2.407 5.72 5.17 5.72M2.614 40.881h11.29c-1.545-2.243.341-6.759 3.535-9.225c-1.65-1.099-3.773-1.916-6.55-1.916C4.188 29.74 0 34.686 0 38.801c0 1.337.743 2.08 2.614 2.08m50.772 0c1.886 0 2.614-.743 2.614-2.08c0-4.115-4.189-9.061-10.888-9.061c-2.778 0-4.902.817-6.55 1.916c3.193 2.466 5.08 6.982 3.535 9.225Zm-34.73 0h18.672c2.332 0 3.164-.669 3.164-1.976c0-3.832-4.798-9.12-12.507-9.12c-7.694 0-12.492 5.288-12.492 9.12c0 1.307.832 1.976 3.164 1.976"/></svg>
                        </div>
                        <form action="{{ route('funcionarios') }}" class="text-center small-box-footer">
                          @csrf
                          @method('POST')
                          <input type="hidden" name="idUnidadeOrganica" value="{{ $unidadeOrganicaSelected->id }}">
                          <input type="hidden" name="titulo" value="Funcionários ">
                          <input type="hidden" name="estado" value="Todo">
                          <input type="submit" value="Ver mais "><i class="fas fa-arrow-circle-right"></i>
                        </form>
                      </div>
                    </div>
                    <!-- Funcionário Activos-->
                    <div class="col-lg-3 col-6">
                      <div class="small-box bg-success">
                        <div class="inner">
                          <h3>{{ $Funcionarios->where('estado', 'Activo')->count() }}</h3>
                          <p>Funcionários Activos</p>
                        </div>
                        <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 56 56"><path fill="currentColor" d="M28 27.126c3.194 0 5.941-2.852 5.941-6.566c0-3.669-2.762-6.387-5.941-6.387s-5.942 2.778-5.942 6.417c0 3.684 2.748 6.536 5.942 6.536m-17.097.341c2.763 0 5.17-2.495 5.17-5.718c0-3.194-2.422-5.556-5.17-5.556c-2.763 0-5.199 2.421-5.184 5.585c0 3.194 2.406 5.69 5.184 5.69m34.194 0c2.778 0 5.184-2.495 5.184-5.689c0-3.164-2.421-5.585-5.184-5.585c-2.748 0-5.17 2.362-5.17 5.555c0 3.224 2.407 5.72 5.17 5.72M2.614 40.881h11.29c-1.545-2.243.341-6.759 3.535-9.225c-1.65-1.099-3.773-1.916-6.55-1.916C4.188 29.74 0 34.686 0 38.801c0 1.337.743 2.08 2.614 2.08m50.772 0c1.886 0 2.614-.743 2.614-2.08c0-4.115-4.189-9.061-10.888-9.061c-2.778 0-4.902.817-6.55 1.916c3.193 2.466 5.08 6.982 3.535 9.225Zm-34.73 0h18.672c2.332 0 3.164-.669 3.164-1.976c0-3.832-4.798-9.12-12.507-9.12c-7.694 0-12.492 5.288-12.492 9.12c0 1.307.832 1.976 3.164 1.976"/></svg>
                        </div>
                        <form action="{{ route('funcionarios') }}" class="text-center small-box-footer">
                          @csrf
                          @method('POST')
                          <input type="hidden" name="titulo" value="Funcionários Activos">
                          <input type="hidden" name="estado" value="Activo">
                          <input type="submit" value="Ver mais "><i class="fas fa-arrow-circle-right"></i>
                        </form>
                      </div>
                    </div>
                    <!-- Funcionários Aposentados-->
                    <div class="col-lg-3 col-6">
                      <div class="small-box bg-danger">
                        <div class="inner">
                          <h3>{{ $Funcionarios->where('estado', 'Inativos')->count() }}</h3>
                          <p>Funcionários Apostentados</p>
                        </div>
                        <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><g fill="currentColor"><path d="M11 5a3 3 0 1 1-6 0a3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4a2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/><path d="M12.5 16a3.5 3.5 0 1 0 0-7a3.5 3.5 0 0 0 0 7m-.646-4.854l.646.647l.646-.647a.5.5 0 0 1 .708.708l-.647.646l.647.646a.5.5 0 0 1-.708.708l-.646-.647l-.646.647a.5.5 0 0 1-.708-.708l.647-.646l-.647-.646a.5.5 0 0 1 .708-.708"/></g></svg>
                        </div>
                        <form action="{{ route('funcionarios') }}" class="text-center small-box-footer">
                          @csrf
                          @method('POST')
                          <input type="hidden" name="titulo" value="Funcionários Aposentados">
                          <input type="hidden" name="estado" value="Aposentado">
                          <input type="submit" value="Ver mais "><i class="fas fa-arrow-circle-right"></i>
                        </form>
                      </div>
                    </div>
                    <!-- Funcionários em Licenca-->
                  <div class="col-lg-3 col-6">
                      <div class="small-box bg-warning">
                        <div class="inner">
                          <h3>{{ $Funcionarios->where('estado', 'Licenca')->count() }}</h3>
                          <p>Funcionários em Licenca</p>
                        </div>
                        <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="currentColor" d="M9.626 5.07a5.5 5.5 0 0 0-3.299 1.847A2.751 2.751 0 1 1 9.626 5.07M5.6 8c-.384.75-.6 1.6-.6 2.5c0 1.31.458 2.512 1.222 3.457C3.555 13.653 2 11.803 2 10v-.5A1.5 1.5 0 0 1 3.5 8zm4.275.5a.625.625 0 1 1 1.25 0a.625.625 0 0 1-1.25 0m1.125 4a.5.5 0 0 1-1 0v-2a.5.5 0 0 1 1 0zm-5-2a4.5 4.5 0 1 1 9 0a4.5 4.5 0 0 1-9 0m1 0a3.5 3.5 0 1 0 7 0a3.5 3.5 0 0 0-7 0"/></svg>
                        </div>
                        <form action="{{ route('funcionarios') }}" class="text-center small-box-footer">
                          @csrf
                          @method('POST')
                          <input type="hidden" name="titulo" value="Funcionários em Licença">
                          <input type="hidden" name="estado" value="Licenca">
                          <input type="submit" value="Ver mais "><i class="fas fa-arrow-circle-right"></i>
                        </form> 
                      </div>
                    </div>
                    <!-- Alunos Masculinos e Femininos -->
                      <div class="col-lg-3 col-6 {{ $unidadeOrganicaSelected->nivelEnsino === 'N/D'  ? 'd-none' : ''  }} ">
                        <div class="small-box bg-info">
                          <div class="inner">
                            <h3> {{ $aproveitamentosI->sum('matriculadosMF') }} </h3>
                            <p>Alunos</p>
                          </div>
                          <div class="icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="m226.53 56.41l-96-32a8 8 0 0 0-5.06 0l-96 32A8 8 0 0 0 24 64v80a8 8 0 0 0 16 0V75.1l33.59 11.19a64 64 0 0 0 20.65 88.05c-18 7.06-33.56 19.83-44.94 37.29a8 8 0 1 0 13.4 8.74C77.77 197.25 101.57 184 128 184s50.23 13.25 65.3 36.37a8 8 0 0 0 13.4-8.74c-11.38-17.46-27-30.23-44.94-37.29a64 64 0 0 0 20.65-88l44.12-14.7a8 8 0 0 0 0-15.18ZM176 120a48 48 0 1 1-86.65-28.45l36.12 12a8 8 0 0 0 5.06 0l36.12-12A47.89 47.89 0 0 1 176 120"/></svg>
                          </div>
                          <a href="#" class="small-box-footer">Ver mais <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                    <!-- /Alunos Masculinos e Femininos -->
                    <!-- Alunos Femininos -->
                      <div class="col-lg-3 col-6 {{ $unidadeOrganicaSelected->nivelEnsino === 'N/D'  ? 'd-none' : ''  }} ">
                        <div class="small-box bg-success">
                          <div class="inner">
                            <h3>{{ $aproveitamentosI->sum('matriculadosF') }}</h3>
                            <p>Femininos</p>
                          </div>
                          <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M13.75 13a1.25 1.25 0 1 1 2.5 0a1.25 1.25 0 0 1-2.5 0M22 12v10H2V12C2 6.5 6.5 2 12 2s10 4.5 10 10M4 12c0 4.41 3.59 8 8 8s8-3.59 8-8c0-.79-.12-1.55-.33-2.26A9.97 9.97 0 0 1 9.26 5.77c-.98 2.39-2.85 4.32-5.21 5.37c-.05.28-.05.57-.05.86m5 2.25a1.25 1.25 0 1 0 0-2.5a1.25 1.25 0 0 0 0 2.5"/></svg>
                          </div>
                          <a href="#" class="small-box-footer">Ver mais <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                    <!-- /Alunos Femininos -->
                    <!--Alunos Masculinos-->
                      <div class="col-lg-3 col-6 {{ $unidadeOrganicaSelected->nivelEnsino === 'N/D'  ? 'd-none' : ''  }} ">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                          <div class="inner">
                            <h3>{{ $aproveitamentosI->sum('matriculadosMF')-$aproveitamentosI->sum('matriculadosF') }}</h3>
                            <p>Masculinos</p>
                          </div>
                          <div class="icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M9 11.75A1.25 1.25 0 0 0 7.75 13A1.25 1.25 0 0 0 9 14.25A1.25 1.25 0 0 0 10.25 13A1.25 1.25 0 0 0 9 11.75m6 0A1.25 1.25 0 0 0 13.75 13A1.25 1.25 0 0 0 15 14.25A1.25 1.25 0 0 0 16.25 13A1.25 1.25 0 0 0 15 11.75M12 2A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2m0 18c-4.41 0-8-3.59-8-8c0-.29 0-.58.05-.86c2.36-1.05 4.23-2.98 5.21-5.37a9.97 9.97 0 0 0 10.41 3.97c.21.71.33 1.47.33 2.26c0 4.41-3.59 8-8 8"/></svg>
                          </div>
                          <a href="#" class="small-box-footer">Ver mais <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                    <!--Alunos Masculinos-->
                  </div>
                  <div class="row">
                    <section class="col-lg-12 connectedSortable {{ $unidadeOrganicaSelected->nivelEnsino != 'Primário' ? 'd-none' : ''  }}">
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
                </div><!-- /.container-fluid -->
              </section>
            <!-- /.content -->

            <!-- Main content -->
              <section class="content ">
                <div class="container-fluid">
                  <div class="row">
                    <!--col -->
                        <div class="col-md-12">
                            <div class="card">
                              <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                  <li class="nav-item"><a class="nav-link active" href="#SobreFuncionario" data-toggle="tab">Sobre a Escola</a></li>
                                  <li class="nav-item"><a class="nav-link {{ $unidadeOrganicaSelected->nivelEnsino != 'Primário' ? 'd-none' : ''  }} {{ ($unidadeOrganicaSelected->nivelEnsino === 'Não Definido, ') ? 'd-none' : ''}}" href="#ITrimestre" data-toggle="tab">Aproveitamento I Trimestre</a></li>
                                  <li class="nav-item"><a class="nav-link {{ $unidadeOrganicaSelected->nivelEnsino != 'Primário' ? 'd-none' : ''  }} {{ ($unidadeOrganicaSelected->nivelEnsino === 'Não Definido, ') ? 'd-none' : ''}}" href="#IITrimestre" data-toggle="tab">Aproveitamento II Trimestre</a></li>
                                  <li class="nav-item"><a class="nav-link {{ $unidadeOrganicaSelected->nivelEnsino != 'Primário' ? 'd-none' : ''  }} {{ ($unidadeOrganicaSelected->nivelEnsino === 'Não Definido, ') ? 'd-none' : ''}}" href="#IIITrimestre" data-toggle="tab">Aproveitamento III Trimestre</a></li>
                                  <li class="nav-item"><a class="nav-link {{ $unidadeOrganicaSelected->nivelEnsino != 'Primário' ? 'd-none' : ''  }} {{ ($unidadeOrganicaSelected->nivelEnsino === 'Não Definido, ') ? 'd-none' : ''}}" href="#Final" data-toggle="tab">Final</a></li>
                                </ul>
                              </div><!-- /.card-header -->
                              <div class="card-body">
                                <div class="tab-content">
                                      
                                        <!--tab-pane-->
                                        <div class="tab-pane active" id="SobreFuncionario">
                                          <div class="card card-info">
                                            <div class="card-header">
                                              <h3 class="card-title">
                                                Sobre a Unidade Orgânica
                                              </h3>
                                            </div>
                                            <div class="card-body">
                                              <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                  <p><b>EQT:</b> {{ $unidadeOrganicaSelected->eqt }} </p> 
                                                  <p><b>Decreto de Criação:</b> {{ $unidadeOrganicaSelected->decretoCriacao }} </p>
                                                  <p><b>Nível de Ensino:</b> {{ $unidadeOrganicaSelected->nivelEnsino }} </p>  
                                                  <p><b>Telefone:</b> {{ $unidadeOrganicaSelected->telefone }} </p>
                                                  <p><b>E-mail:</b> {{ $unidadeOrganicaSelected->email }} </p>
                                                  <p><b>Localidade:</b> {{ $unidadeOrganicaSelected->localidade }} </p>
                                                  <p><b>Coordenadas Geograficas:</b> {{ $unidadeOrganicaSelected->coordenadasGeograficas }} </p>
                                                </li>
                                              </ul>
                                            </div>
                                            <div class="card-footer">

                                            </div>
                                          </div>
                                          <div class="card card-secondary">
                                            <div class="card-header">
                                              <h3 class="card-title">Galeria de Fotos da {{  $unidadeOrganicaSelected->designacao  }} </h3>
                                            </div>
                                            <div class="card-body">
                                                <a href="{{ route('galeria.unidade.organica', ['idUnidadeOrganica' => $unidadeOrganicaSelected->id]) }}" class="btn btn-primary w-100"><i class="fa fa-galery "></i> Abrir Galeria de Fotos</a>
                                            </div>
                                            <div class="card-footer">
                                               <button class="btn btn-primary w-100" data-toggle="modal" data-target="#addfotosUnidadeOrganica" >
                                                  <i class="fa fa-plus "></i> Adicionar Fotos da Escola
                                                </button>
                                            </div>
                                          </div>
                                                                <div class="modal fade" id="addfotosUnidadeOrganica" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                                  <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h6 class="modal-title" id="exampleModalLabel">Adicionar Fotos no Album da Escola</h6>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">

                                                                                <!-- Formulário dentro da modal -->
                                                                                <form method="POST" enctype="multipart/form-data" action="{{ route('add.foto.uo') }}">
                                                                                    @csrf
                                                                                    @method('POST')
                                                                                    <div class="form-group">
                                                                                        <label for="arquivo">A Foto deve estar no Formato "png e jpg"</label>
                                                                                        <div class="input-group">
                                                                                            <div class="custom-file">
                                                                                                <input type="file" class="custom-file-input" name="arquivo" required>
                                                                                                <label class="custom-file-label" for="arquivo">Escolha a foto </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-check">
                                                                                        <input type="checkbox" name="confirmar" class="form-check-input" required>
                                                                                        <label class="form-check-label" for="confirmar">Clique para Confirmar</label>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                          <input type="hidden" name="idUnidadeOrganica" value="{{ $unidadeOrganicaSelected->id }}">
                                                                                          <button type="submit" class="btn btn-primary">Adicionar Fotos</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                  </div>
                                                                </div>
                                        </div>
                               
                                        <!--/tab-pane-->
                                            <!--tab-pane-->
                                            <div class="tab-pane" id="ITrimestre">
                                            <!-- Formulario I  Trimestre -->
                                                <div class="card card-primary">
                                                  <div class="card-header">
                                                    <h3 class="card-title">
                                                      Aproveitamento escolar do I Trimestre
                                                    </h3>
                                                  </div>
                                                  <div class="card-body">
                                                    <div class="table-responsive">
                                                    <table id="tabelaI" class="table table-bordered table-striped">
                                            
                                                        <thead class="bg-secondary">
                                                          <tr>
                                                            <th scope="col" rowspan="3" colspan="1" style=" vertical-align:middle" >Classe</th><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Número de Alunos no Trimestre</th> <!--<th scope="col">Matriculados</th>--> <th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Aprovados</th><!--<th scope="col">Aprovados</th>--><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Reprovados</th><!--<th scope="col">Reprovados</th>--><th scope="col" colspan="4" rowspan="1" style="vertical-align: middle;">Trasferidos</th><!--<th scope="col">Trasferidos</th><th scope="col">Trasferidos</th><th scope="col">Trasferidos</th> --><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Desistentes</th> <th class="d-none" scope="col" colspan="1" rowspan="3" style="vertical-align: middle;">Opções</th><!--<th scope="col">Total</th>-->
                                                          </tr>
                                                          <tr>
                                                            <!--<th scope="col">Alunos</th> --><!--<th scope="col" colspan="2">Matriculados</th><th scope="col">Matriculados</th>--> <!--<th scope="col">Aprovados</th><th scope="col">Aprovados</th>--><!--<th scope="col">Reprovados</th><th scope="col">Reprovados</th>--><th scope="col" colspan="2" rowspan="1" style="vertical-align: middle;">Entrada</th><!--<th scope="col">Entrada</th> --> <th scope="col" colspan="2" rowspan="1" style="vertical-align: middle;">Saida</th><!--<th scope="col">Saida</th>--><!--<th scope="col">Total</th> <th scope="col">Total</th>-->
                                                          </tr>
                                                          <tr>
                                                            <th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th> <th scope="col">F</th>
                                                          </tr>
                                                        </thead>
                                                
                                                      <tbody>
                                                      <!--Gerando a Tabela de forma Dinamica-->
                                                      @foreach ($aproveitamentosI as $aproveitamentoI)
                                                      <!--Invocando outro elementos/ Tabelas -->
                                                  
                                                                    <tr class="">
                                                                        <td>{{$aproveitamentoI->classe }}</td>
                                                                        <td>{{$aproveitamentoI->matriculadosMF }}</td>
                                                                        <td>{{$aproveitamentoI->matriculadosF }}</td>
                                                                  
                                                                        <td>{{$aproveitamentoI->aprovadosMF }}</td>
                                                                        <td>{{$aproveitamentoI->aprovadosF }}</td>
                                                                        <td>{{$aproveitamentoI->reprovadosMF }}</td>
                                                                        <td>{{$aproveitamentoI->reprovadosF }}</td>
                                                                        <td>{{$aproveitamentoI->transferidosEMF }}</td>
                                                                        <td>{{$aproveitamentoI->transferidosEF }}</td>
                                                                        <td>{{$aproveitamentoI->transferidosSMF }}</td>
                                                                        <td>{{$aproveitamentoI->transferidosSF }}</td>
                                                                        <td>{{$aproveitamentoI->desistentesMF }}</td>
                                                                        <td>{{$aproveitamentoI->desistentesF }}</td>
                                          

                                                                        <td class="d-none">
                                                                        <button class="btn btn-warning w-100 m-1" data-toggle="modal" data-target="#addAproveitamento{{ $aproveitamentoI->id }}" >
                                                                        Editar
                                                                        </button>

                                                                        <div class="modal fade" id="addAproveitamento{{ $aproveitamentoI->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                                                      <div class="modal-dialog" role="document">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h6 class="modal-title" id="exampleModalLabel">  Editar Aproveitamento da Classe {{ $aproveitamentoI->classe }} do I Trimestre </h6>
                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <div class="modal-body">

                                                                                                    <!-- Formulário dentro da modal -->
                                                                                                    <form class="d-none" method="POST" enctype="multipart/form-data" action="{{ route('store.aproveitamento') }}">
                                                                                                        @csrf
                                                                                                        @method('POST')
                                                                                                        <div class="form-group">
                                                                                                          <label for="classe">Classe </label>
                                                                                                          <select name="classe" id="classe" class="form-control" required>
                                                                                                            <option value="{{ isset($aproveitamentoI->classe) ? $aproveitamentoI->classe : 'Seleccione uma Classe' }}"> {{ isset($aproveitamentoI->classe) ? $aproveitamentoI->classe : 'Seleccione uma Classe' }}</option>
                                                                                                            <option value="Iniciação">Iniciação</option>
                                                                                                            <option value="1ª">1ª Classe</option>
                                                                                                            <option value="2ª">2ª Classe</option>
                                                                                                            <option value="3ª">3ª Classe</option>
                                                                                                            <option value="4ª">4ª Classe</option>
                                                                                                            <option value="5ª">5ª Classe</option>
                                                                                                            <option value="6ª">6ª Classe</option>
                                                                                                          </select>
                                                                                                        </div>
                                                                                                        <div class="form-group">
                                                                                                            <label for="matriculadosMF">Matriculados, Masculinos e Femininos no Trimestre </label>
                                                                                                            <input type="number" name="matriculadosMF" class="form-control" value="{{ isset($aproveitamentoI->matriculadosMF) ? $aproveitamentoI->matriculadosMF : '' }}" required>
                                                                                                            <label for="matriculadosF">Matriculados, Femininos no Trimestre</label>
                                                                                                            <input type="number" name="matriculadosF" class="form-control" value="{{ isset($aproveitamentoI->matriculadosF) ? $aproveitamentoI->matriculadosF : '' }}" required>
                                                                                                        
                                                                        

                                                                                                            <label for="aprovadosMF">Aprovados, Masculinos e Femininos</label>
                                                                                                            <input type="number" name="aprovadosMF" class="form-control" value="{{ isset($aproveitamentoI->aprovadosMF) ? $aproveitamentoI->aprovadosMF : '' }}" required>
                                                                                                            <label for="aprovadosF">Aprovados, Femininos</label>
                                                                                                            <input type="number" name="aprovadosF" class="form-control" value="{{ isset($aproveitamentoI->aprovadosF) ? $aproveitamentoI->aprovadosF : '' }}" required>
                                                                                                            <label for="reprovadosMF">Reprovados, Masculinos e Femininos</label>
                                                                                                            <input type="number" name="reprovadosMF" class="form-control" value="{{ isset($aproveitamentoI->reprovadosMF) ? $aproveitamentoI->reprovadosMF : '' }}" required>
                                                                                                            <label for="reprovadosF">Reprovados, Femininos</label>
                                                                                                            <input type="number" name="reprovadosF" class="form-control" value="{{ isset($aproveitamentoI->reprovadosF) ? $aproveitamentoI->reprovadosF : '' }}" required>
                                                                                                            <label for="transferidosEMF">Transferidos (Entrada), Masculinos e Femininos</label>
                                                                                                            <input type="number" name="transferidosEMF" class="form-control" value="{{ isset($aproveitamentoI->transferidosEMF) ? $aproveitamentoI->transferidosEMF : '' }}" required>
                                                                                                            <label for="transferidosEF">Transferidos (Entrada), Femininos</label>
                                                                                                            <input type="number" name="transferidosEF" class="form-control" value="{{ isset($aproveitamentoI->transferidosEF) ? $aproveitamentoI->transferidosEF : '' }}" required>
                                                                                                            
                                                                                                            <label for="transferidosSMF">Transferidos (Saída), Masculinos e Femininos</label>
                                                                                                            <input type="number" name="transferidosSMF" class="form-control" value="{{ isset($aproveitamentoI->transferidosSMF) ? $aproveitamentoI->transferidosSMF : '' }}" required>
                                                                                                            <label for="transferidosSF">Transferidos (Saída), Femininos</label>
                                                                                                            <input type="number" name="transferidosSF" class="form-control" value="{{ isset($aproveitamentoI->transferidosSF) ? $aproveitamentoI->transferidosSF : '' }}" required>

                                                                                                            <label for="desistentesMF">Desistentes, Masculinos e Femininos</label>
                                                                                                            <input type="number" name="desistentesMF" class="form-control" value="{{ isset($aproveitamentoI->desistentesMF) ? $aproveitamentoI->desistentesMF : '' }}" required>
                                                                                                            <label for="desistentesF">Desistentes, Femininos</label>
                                                                                                            <input type="number" name="desistentesF" class="form-control" value="{{ isset($aproveitamentoI->desistentesF) ? $aproveitamentoI->desistentesF : '' }}" required>
                                                                                                            
                                                                                                        </div>
                                                                                                        <div class="form-group">
                                                                                                          <input type="hidden" name="trimestre" value="I">
                                                                                                          <input type="hidden" name="anoLectivo" value="{{ date('Y') }}">
                                                                                                          <input type="hidden" name="idUnidadeOrganica" value="{{ $unidadeOrganicaSelected->id }}">
                                                                                                          <input type="hidden" name="idFuncionario" value="{{ $funcionarioLogado->id }}">
                                                                                                        </div>
                                                                                                        <div class="form-check">
                                                                                                            <input type="checkbox" name="confirmar" class="form-check-input" required>
                                                                                                            <label class="form-check-label" for="confirmar">Clique para Confirmar</label>
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                              <button type="submit" class="btn btn-primary">Inserir Formulário</button>
                                                                                                        </div>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                      </div>
                                                                        </div>

                                                                          <form class="d-none" action="{{ route('eliminar.objecto') }}" method="POST" id="deleteForm{{ $aproveitamentoI->id }}">
                                                                              @csrf
                                                                              @method('DELETE')
                                                                              <input type="hidden" name="id" value="{{ $aproveitamentoI->id }}">
                                                                              <button type="submit" class="btn btn-danger w-100 m-1" onclick="confirmAndSubmit(event, 'Confirmar deletar Pessoa?', 'Sim, Deletar!', 'Não, Cancelar!')">Deletar</button>
                                                                          </form>
                                                                        </td>
                                                                    </tr>
                                                      @endforeach
                                                      </tbody>
                                                      <tfoot>
                                          
                                                        <thead class="bg-secondary d-none">
                                                          <tr>
                                                            <th scope="col" rowspan="3" colspan="1" style=" vertical-align:middle" >Classe</th><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Número de Alunos no Incio do Trimestre</th><!--<th scope="col">Matriculados</th>--> <th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Número de Alunos no Final do Trimestre</th><!--<th scope="col">Matriculados</th>--><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Aprovados</th><!--<th scope="col">Aprovados</th>--><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Reprovados</th><!--<th scope="col">Reprovados</th>--><th scope="col" colspan="4" rowspan="1" style="vertical-align: middle;">Trasferidos</th><!--<th scope="col">Trasferidos</th><th scope="col">Trasferidos</th><th scope="col">Trasferidos</th> --><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Desistentes</th> <th class="d-none" scope="col" colspan="1" rowspan="3" style="vertical-align: middle;">Opções</th><!--<th scope="col">Total</th>-->
                                                          </tr>
                                                          <tr>
                                                            <!--<th scope="col">Alunos</th> --><!--<th scope="col" colspan="2">Matriculados</th><th scope="col">Matriculados</th>--> <!--<th scope="col">Aprovados</th><th scope="col">Aprovados</th>--><!--<th scope="col">Reprovados</th><th scope="col">Reprovados</th>--><th scope="col" colspan="2" rowspan="1" style="vertical-align: middle;">Entrada</th><!--<th scope="col">Entrada</th> --> <th scope="col" colspan="2" rowspan="1" style="vertical-align: middle;">Saida</th><!--<th scope="col">Saida</th>--><!--<th scope="col">Total</th> <th scope="col">Total</th>-->
                                                          </tr>
                                                          <tr>
                                                            <th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th> <th scope="col">F</th>
                                                          </tr>
                                                        </thead>

                                                      </tfoot>
                                                    </table>
                                                    </div>
                                                  </div>
                                                  <div class="card-footer">
                                                      <button class="btn btn-primary w-100 m-1 d-none" data-toggle="modal" data-target="#addAproveitamentoI" >
                                                        Inserir
                                                      </button>

                                                      <div class="modal fade" id="addAproveitamentoI" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                          <div class="modal-content">
                                                                              <div class="modal-header">
                                                                                  <h6 class="modal-title" id="exampleModalLabel">Formulario de Aproveitamento do I Trimestre do ano Lectivo {{ date('Y') }}</h6>
                                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                      <span aria-hidden="true">&times;</span>
                                                                                  </button>
                                                                              </div>
                                                                              <div class="modal-body">

                                                                                  <!-- Formulário dentro da modal -->
                                                                                  <form method="POST" enctype="multipart/form-data" action="{{ route('store.aproveitamento') }}">
                                                                                      @csrf
                                                                                      @method('POST')
                                                                                      <div class="form-group">
                                                                                        <label for="classe">Classe </label>
                                                                                        <select name="classe" id="classe" class="form-control" required>
                                                                                          <option value="Iniciação">Iniciação</option>
                                                                                          <option value="1ª">1ª Classe</option>
                                                                                          <option value="2ª">2ª Classe</option>
                                                                                          <option value="3ª">3ª Classe</option>
                                                                                          <option value="4ª">4ª Classe</option>
                                                                                          <option value="5ª">5ª Classe</option>
                                                                                          <option value="6ª">6ª Classe</option>
                                                                                        </select>
                                                                                      </div>
                                                                                      <div class="form-group">
                                                                                          <label for="matriculadosMF">Matriculados, Masculinos e Femininos no Trimestre </label>
                                                                                          <input type="number" name="matriculadosMF" class="form-control" required>
                                                                                          <label for="matriculadosF">Matriculados, Femininos no Trimestre</label>
                                                                                          <input type="number" name="matriculadosF" class="form-control" required>
                                                                                      
                                                      

                                                                                          <label for="aprovadosMF">Aprovados, Masculinos e Femininos</label>
                                                                                          <input type="number" name="aprovadosMF" class="form-control" required>
                                                                                          <label for="aprovadosF">Aprovados, Femininos</label>
                                                                                          <input type="number" name="aprovadosF" class="form-control" required>
                                                                                          <label for="reprovadosMF">Reprovados, Masculinos e Femininos</label>
                                                                                          <input type="number" name="reprovadosMF" class="form-control" required>
                                                                                          <label for="reprovadosF">Reprovados, Femininos</label>
                                                                                          <input type="number" name="reprovadosF" class="form-control" required>
                                                                                          <label for="transferidosEMF">Transferidos (Entrada), Masculinos e Femininos</label>
                                                                                          <input type="number" name="transferidosEMF" class="form-control" required>
                                                                                          <label for="transferidosEF">Transferidos (Entrada), Femininos</label>
                                                                                          <input type="number" name="transferidosEF" class="form-control" required>
                                                                                          
                                                                                          <label for="transferidosSMF">Transferidos (Saída), Masculinos e Femininos</label>
                                                                                          <input type="number" name="transferidosSMF" class="form-control" required>
                                                                                          <label for="transferidosSF">Transferidos (Saída), Femininos</label>
                                                                                          <input type="number" name="transferidosSF" class="form-control" required>

                                                                                          <label for="desistentesMF">Desistentes, Masculinos e Femininos</label>
                                                                                          <input type="number" name="desistentesMF" class="form-control" required>
                                                                                          <label for="desistentesF">Desistentes, Femininos</label>
                                                                                          <input type="number" name="desistentesF" class="form-control" required>
                                                                                          
                                                                                      </div>
                                                                                      <div class="form-group">
                                                                                        <input type="hidden" name="trimestre" value="I">
                                                                                        <input type="hidden" name="anoLectivo" value="{{ date('Y') }}">
                                                                                        <input type="hidden" name="idUnidadeOrganica" value="{{ $unidadeOrganicaSelected->id }}">
                                                                                        <input type="hidden" name="idFuncionario" value="{{ $funcionarioLogado->id }}">
                                                                                      </div>
                                                                                      <div class="form-check">
                                                                                          <input type="checkbox" name="confirmar" class="form-check-input" required>
                                                                                          <label class="form-check-label" for="confirmar">Clique para Confirmar</label>
                                                                                      </div>
                                                                                      <div class="modal-footer">
                                                                                            <button type="submit" class="btn btn-primary">Inserir Formulário</button>
                                                                                      </div>
                                                                                  </form>
                                                                              </div>
                                                                          </div>
                                                                    </div>
                                                      </div>
                                                  </div>
                                                </div>
                                            <!--/ Formulario I  Trimestre -->
                                          </div>
                                        <!--/tab-pane-->
                                        <!--tab-pane-->
                                          <div class="tab-pane" id="IITrimestre">
                                              <!-- Formulario II  Trimestre -->
                                                <div class="card card-primary">
                                                  <div class="card-header">
                                                    <h3 class="card-title">
                                                      Aproveitamento escolar do II Trimestre
                                                    </h3>
                                                  </div>
                                                  <div class="card-body">
                                                    <div class="table-responsive">
                                                    <table id="tabelaII" class="table table-bordered table-striped">
                                            
                                                        <thead class="bg-secondary">
                                                          <tr>
                                                            <th scope="col" rowspan="3" colspan="1" style=" vertical-align:middle" >Classe</th><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Número de Alunos no Trimestre</th> <!--<th scope="col">Matriculados</th>--> <th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Aprovados</th><!--<th scope="col">Aprovados</th>--><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Reprovados</th><!--<th scope="col">Reprovados</th>--><th scope="col" colspan="4" rowspan="1" style="vertical-align: middle;">Trasferidos</th><!--<th scope="col">Trasferidos</th><th scope="col">Trasferidos</th><th scope="col">Trasferidos</th> --><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Desistentes</th> <th class="d-none" scope="col" colspan="1" rowspan="3" style="vertical-align: middle;">Opções</th><!--<th scope="col">Total</th>-->
                                                          </tr>
                                                          <tr>
                                                            <!--<th scope="col">Alunos</th> --><!--<th scope="col" colspan="2">Matriculados</th><th scope="col">Matriculados</th>--> <!--<th scope="col">Aprovados</th><th scope="col">Aprovados</th>--><!--<th scope="col">Reprovados</th><th scope="col">Reprovados</th>--><th scope="col" colspan="2" rowspan="1" style="vertical-align: middle;">Entrada</th><!--<th scope="col">Entrada</th> --> <th scope="col" colspan="2" rowspan="1" style="vertical-align: middle;">Saida</th><!--<th scope="col">Saida</th>--><!--<th scope="col">Total</th> <th scope="col">Total</th>-->
                                                          </tr>
                                                          <tr>
                                                            <th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th> <th scope="col">F</th>
                                                          </tr>
                                                        </thead>
                                                
                                                      <tbody>
                                                      <!--Gerando a Tabela de forma Dinamica-->
                                                      @foreach ($aproveitamentosII as $aproveitamentoII)
                                                      <!--Invocando outro elementos/ Tabelas -->
                                                  
                                                                    <tr class="">
                                                                        <td>{{$aproveitamentoII->classe }}</td>
                                                                        <td>{{$aproveitamentoII->matriculadosMF }}</td>
                                                                        <td>{{$aproveitamentoII->matriculadosF }}</td>
                                                                  
                                                                        <td>{{$aproveitamentoII->aprovadosMF }}</td>
                                                                        <td>{{$aproveitamentoII->aprovadosF }}</td>
                                                                        <td>{{$aproveitamentoII->reprovadosMF }}</td>
                                                                        <td>{{$aproveitamentoII->reprovadosF }}</td>
                                                                        <td>{{$aproveitamentoII->transferidosEMF }}</td>
                                                                        <td>{{$aproveitamentoII->transferidosEF }}</td>
                                                                        <td>{{$aproveitamentoII->transferidosSMF }}</td>
                                                                        <td>{{$aproveitamentoII->transferidosSF }}</td>
                                                                        <td>{{$aproveitamentoII->desistentesMF }}</td>
                                                                        <td>{{$aproveitamentoII->desistentesF }}</td>
                                          

                                                                        <td class="d-none">
                                                                        <button class="btn btn-warning w-100 m-1 d-none" data-toggle="modal" data-target="#addAproveitamento{{ $aproveitamentoII->id }}editar" >
                                                                        Editar
                                                                        </button>

                                                                        <div class="modal fade" id="addAproveitamento{{ $aproveitamentoII->id }}editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                                                      <div class="modal-dialog" role="document">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h6 class="modal-title" id="exampleModalLabel">  Editar Aproveitamento da Classe {{ $aproveitamentoII->classe }} do II Trimestre da Classe {{ $aproveitamentoII->classe }} do II Trimestre</h6>
                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <div class="modal-body">

                                                                                                    <!-- Formulário dentro da modal -->
                                                                                                    <form method="POST" enctype="multipart/form-data" action="{{ route('update.aproveitamento', ['id' => $aproveitamentoII->id ]) }}">
                                                                                                        @csrf
                                                                                                        @method('POST')
                                                                                                        <div class="form-group">
                                                                                                          <label for="classe">Classe </label>
                                                                                                          <select name="classe" id="classe" class="form-control" required>
                                                                                                            <option value="{{ isset($aproveitamentoII->classe) ? $aproveitamentoII->classe : 'Seleccione uma Classe' }}"> {{ isset($aproveitamentoII->classe) ? $aproveitamentoII->classe : 'Seleccione uma Classe' }}</option>
                                                                                                            <option value="Iniciação">Iniciação</option>
                                                                                                            <option value="1ª">1ª Classe</option>
                                                                                                            <option value="2ª">2ª Classe</option>
                                                                                                            <option value="3ª">3ª Classe</option>
                                                                                                            <option value="4ª">4ª Classe</option>
                                                                                                            <option value="5ª">5ª Classe</option>
                                                                                                            <option value="6ª">6ª Classe</option>
                                                                                                          </select>
                                                                                                        </div>
                                                                                                        <div class="form-group">
                                                                                                            <label for="matriculadosMF">Matriculados, Masculinos e Femininos no Trimestre </label>
                                                                                                            <input type="number" name="matriculadosMF" class="form-control" value="{{ isset($aproveitamentoII->matriculadosMF) ? $aproveitamentoII->matriculadosMF : '' }}" required>
                                                                                                            <label for="matriculadosF">Matriculados, Femininos no Trimestre</label>
                                                                                                            <input type="number" name="matriculadosF" class="form-control" value="{{ isset($aproveitamentoII->matriculadosF) ? $aproveitamentoII->matriculadosF : '' }}" required>
                                                                                                        
                                                                        

                                                                                                            <label for="aprovadosMF">Aprovados, Masculinos e Femininos</label>
                                                                                                            <input type="number" name="aprovadosMF" class="form-control" value="{{ isset($aproveitamentoII->aprovadosMF) ? $aproveitamentoII->aprovadosMF : '' }}" required>
                                                                                                            <label for="aprovadosF">Aprovados, Femininos</label>
                                                                                                            <input type="number" name="aprovadosF" class="form-control" value="{{ isset($aproveitamentoII->aprovadosF) ? $aproveitamentoII->aprovadosF : '' }}" required>
                                                                                                            <label for="reprovadosMF">Reprovados, Masculinos e Femininos</label>
                                                                                                            <input type="number" name="reprovadosMF" class="form-control" value="{{ isset($aproveitamentoII->reprovadosMF) ? $aproveitamentoII->reprovadosMF : '' }}" required>
                                                                                                            <label for="reprovadosF">Reprovados, Femininos</label>
                                                                                                            <input type="number" name="reprovadosF" class="form-control" value="{{ isset($aproveitamentoII->reprovadosF) ? $aproveitamentoII->reprovadosF : '' }}" required>
                                                                                                            <label for="transferidosEMF">Transferidos (Entrada), Masculinos e Femininos</label>
                                                                                                            <input type="number" name="transferidosEMF" class="form-control" value="{{ isset($aproveitamentoII->transferidosEMF) ? $aproveitamentoII->transferidosEMF : '' }}" required>
                                                                                                            <label for="transferidosEF">Transferidos (Entrada), Femininos</label>
                                                                                                            <input type="number" name="transferidosEF" class="form-control" value="{{ isset($aproveitamentoII->transferidosEF) ? $aproveitamentoII->transferidosEF : '' }}" required>
                                                                                                            
                                                                                                            <label for="transferidosSMF">Transferidos (Saída), Masculinos e Femininos</label>
                                                                                                            <input type="number" name="transferidosSMF" class="form-control" value="{{ isset($aproveitamentoII->transferidosSMF) ? $aproveitamentoII->transferidosSMF : '' }}" required>
                                                                                                            <label for="transferidosSF">Transferidos (Saída), Femininos</label>
                                                                                                            <input type="number" name="transferidosSF" class="form-control" value="{{ isset($aproveitamentoII->transferidosSF) ? $aproveitamentoII->transferidosSF : '' }}" required>

                                                                                                            <label for="desistentesMF">Desistentes, Masculinos e Femininos</label>
                                                                                                            <input type="number" name="desistentesMF" class="form-control" value="{{ isset($aproveitamentoII->desistentesMF) ? $aproveitamentoII->desistentesMF : '' }}" required>
                                                                                                            <label for="desistentesF">Desistentes, Femininos</label>
                                                                                                            <input type="number" name="desistentesF" class="form-control" value="{{ isset($aproveitamentoII->desistentesF) ? $aproveitamentoII->desistentesF : '' }}" required>
                                                                                                            
                                                                                                        </div>
                                                                                                        <div class="form-group">
                                                                                                          <input type="hidden" name="trimestre" value="II">
                                                                                                          <input type="hidden" name="anoLectivo" value="{{ date('Y') }}">
                                                                                                          <input type="hidden" name="idUnidadeOrganica" value="{{ $unidadeOrganicaSelected->id }}">
                                                                                                          <input type="hidden" name="idFuncionario" value="{{ $funcionarioLogado->id }}">
                                                                                                        </div>
                                                                                                        <div class="form-check">
                                                                                                            <input type="checkbox" name="confirmar" class="form-check-input" required>
                                                                                                            <label class="form-check-label" for="confirmar">Clique para Confirmar</label>
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                              <button type="submit" class="btn btn-primary">Inserir Formulário</button>
                                                                                                        </div>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                      </div>
                                                                        </div>

                                                                          <form class="d-none" action="{{ route('eliminar.objecto') }}" method="POST" id="deleteForm{{ $aproveitamentoII->id }}">
                                                                              @csrf
                                                                              @method('DELETE')
                                                                              <input type="hidden" name="id" value="{{ $aproveitamentoII->id }}">
                                                                              <button type="submit" class="btn btn-danger w-100 m-1" onclick="confirmAndSubmit(event, 'Confirmar deletar Pessoa?', 'Sim, Deletar!', 'Não, Cancelar!')">Deletar</button>
                                                                          </form>
                                                                        </td>
                                                                    </tr>
                                                      @endforeach
                                                      </tbody>
                                                      <tfoot>
                                          
                                                        <thead class="bg-secondary d-none">
                                                          <tr>
                                                            <th scope="col" rowspan="3" colspan="1" style=" vertical-align:middle" >Classe</th><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Número de Alunos no Incio do Trimestre</th><!--<th scope="col">Matriculados</th>--> <th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Número de Alunos no Final do Trimestre</th><!--<th scope="col">Matriculados</th>--><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Aprovados</th><!--<th scope="col">Aprovados</th>--><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Reprovados</th><!--<th scope="col">Reprovados</th>--><th scope="col" colspan="4" rowspan="1" style="vertical-align: middle;">Trasferidos</th><!--<th scope="col">Trasferidos</th><th scope="col">Trasferidos</th><th scope="col">Trasferidos</th> --><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Desistentes</th> <th class="d-none" scope="col" colspan="1" rowspan="3" style="vertical-align: middle;">Opções</th><!--<th scope="col">Total</th>-->
                                                          </tr>
                                                          <tr>
                                                            <!--<th scope="col">Alunos</th> --><!--<th scope="col" colspan="2">Matriculados</th><th scope="col">Matriculados</th>--> <!--<th scope="col">Aprovados</th><th scope="col">Aprovados</th>--><!--<th scope="col">Reprovados</th><th scope="col">Reprovados</th>--><th scope="col" colspan="2" rowspan="1" style="vertical-align: middle;">Entrada</th><!--<th scope="col">Entrada</th> --> <th scope="col" colspan="2" rowspan="1" style="vertical-align: middle;">Saida</th><!--<th scope="col">Saida</th>--><!--<th scope="col">Total</th> <th scope="col">Total</th>-->
                                                          </tr>
                                                          <tr>
                                                            <th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th> <th scope="col">F</th>
                                                          </tr>
                                                        </thead>

                                                      </tfoot>
                                                    </table>
                                                    </div>
                                                  </div>
                                                  <div class="card-footer">
                                                      <button class="btn btn-primary w-100 m-1 d-none" data-toggle="modal" data-target="#addAproveitamentoII" >
                                                        Inserir
                                                      </button>

                                                      <div class="modal fade" id="addAproveitamentoII" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                          <div class="modal-content">
                                                                              <div class="modal-header">
                                                                                  <h6 class="modal-title" id="exampleModalLabel">Formulario de Aproveitamento do II Trimestre do ano Lectivo {{ date('Y') }}</h6>
                                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                      <span aria-hidden="true">&times;</span>
                                                                                  </button>
                                                                              </div>
                                                                              <div class="modal-body">

                                                                                  <!-- Formulário dentro da modal -->
                                                                                  <form method="POST" enctype="multipart/form-data" action="{{ route('store.aproveitamento') }}">
                                                                                      @csrf
                                                                                      @method('POST')
                                                                                      <div class="form-group">
                                                                                        <label for="classe">Classe </label>
                                                                                        <select name="classe" id="classe" class="form-control" required>
                                                                                          <option value="Iniciação">Iniciação</option>
                                                                                          <option value="1ª">1ª Classe</option>
                                                                                          <option value="2ª">2ª Classe</option>
                                                                                          <option value="3ª">3ª Classe</option>
                                                                                          <option value="4ª">4ª Classe</option>
                                                                                          <option value="5ª">5ª Classe</option>
                                                                                          <option value="6ª">6ª Classe</option>
                                                                                        </select>
                                                                                      </div>
                                                                                      <div class="form-group">
                                                                                          <label for="matriculadosMF">Matriculados, Masculinos e Femininos no Trimestre </label>
                                                                                          <input type="number" name="matriculadosMF" class="form-control" required>
                                                                                          <label for="matriculadosF">Matriculados, Femininos no Trimestre</label>
                                                                                          <input type="number" name="matriculadosF" class="form-control" required>
                                                                                      
                                                      

                                                                                          <label for="aprovadosMF">Aprovados, Masculinos e Femininos</label>
                                                                                          <input type="number" name="aprovadosMF" class="form-control" required>
                                                                                          <label for="aprovadosF">Aprovados, Femininos</label>
                                                                                          <input type="number" name="aprovadosF" class="form-control" required>
                                                                                          <label for="reprovadosMF">Reprovados, Masculinos e Femininos</label>
                                                                                          <input type="number" name="reprovadosMF" class="form-control" required>
                                                                                          <label for="reprovadosF">Reprovados, Femininos</label>
                                                                                          <input type="number" name="reprovadosF" class="form-control" required>
                                                                                          <label for="transferidosEMF">Transferidos (Entrada), Masculinos e Femininos</label>
                                                                                          <input type="number" name="transferidosEMF" class="form-control" required>
                                                                                          <label for="transferidosEF">Transferidos (Entrada), Femininos</label>
                                                                                          <input type="number" name="transferidosEF" class="form-control" required>
                                                                                          
                                                                                          <label for="transferidosSMF">Transferidos (Saída), Masculinos e Femininos</label>
                                                                                          <input type="number" name="transferidosSMF" class="form-control" required>
                                                                                          <label for="transferidosSF">Transferidos (Saída), Femininos</label>
                                                                                          <input type="number" name="transferidosSF" class="form-control" required>

                                                                                          <label for="desistentesMF">Desistentes, Masculinos e Femininos</label>
                                                                                          <input type="number" name="desistentesMF" class="form-control" required>
                                                                                          <label for="desistentesF">Desistentes, Femininos</label>
                                                                                          <input type="number" name="desistentesF" class="form-control" required>
                                                                                          
                                                                                      </div>
                                                                                      <div class="form-group">
                                                                                        <input type="hidden" name="trimestre" value="II">
                                                                                        <input type="hidden" name="anoLectivo" value="{{ date('Y') }}">
                                                                                        <input type="hidden" name="idUnidadeOrganica" value="{{ $unidadeOrganicaSelected->id }}">
                                                                                        <input type="hidden" name="idFuncionario" value="{{ $funcionarioLogado->id }}">
                                                                                      </div>
                                                                                      <div class="form-check">
                                                                                          <input type="checkbox" name="confirmar" class="form-check-input" required>
                                                                                          <label class="form-check-label" for="confirmar">Clique para Confirmar</label>
                                                                                      </div>
                                                                                      <div class="modal-footer">
                                                                                            <button type="submit" class="btn btn-primary">Inserir Formulário</button>
                                                                                      </div>
                                                                                  </form>
                                                                              </div>
                                                                          </div>
                                                                    </div>
                                                      </div>
                                                  </div>
                                                </div>
                                              <!--/ Formulario I  Trimestre -->
                                          </div>
                                        <!-- /tab-pane -->
                                        <!--tab-pane -->
                                          <div class="tab-pane" id="IIITrimestre">
                                              <!-- Formulario III  Trimestre -->
                                                <div class="card card-primary">
                                                  <div class="card-header">
                                                    <h3 class="card-title">
                                                      Aproveitamento escolar do III Trimestre
                                                    </h3>
                                                  </div>
                                                  <div class="card-body">
                                                    <div class="table-responsive">
                                                    <table id="tabelaIII" class="table table-bordered table-striped">
                                            
                                                        <thead class="bg-secondary">
                                                          <tr>
                                                            <th scope="col" rowspan="3" colspan="1" style=" vertical-align:middle" >Classe</th><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Número de Alunos no Trimestre</th> <!--<th scope="col">Matriculados</th>--> <th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Aprovados</th><!--<th scope="col">Aprovados</th>--><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Reprovados</th><!--<th scope="col">Reprovados</th>--><th scope="col" colspan="4" rowspan="1" style="vertical-align: middle;">Trasferidos</th><!--<th scope="col">Trasferidos</th><th scope="col">Trasferidos</th><th scope="col">Trasferidos</th> --><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Desistentes</th> <th class="d-none" scope="col" colspan="1" rowspan="3" style="vertical-align: middle;">Opções</th><!--<th scope="col">Total</th>-->
                                                          </tr>
                                                          <tr>
                                                            <!--<th scope="col">Alunos</th> --><!--<th scope="col" colspan="2">Matriculados</th><th scope="col">Matriculados</th>--> <!--<th scope="col">Aprovados</th><th scope="col">Aprovados</th>--><!--<th scope="col">Reprovados</th><th scope="col">Reprovados</th>--><th scope="col" colspan="2" rowspan="1" style="vertical-align: middle;">Entrada</th><!--<th scope="col">Entrada</th> --> <th scope="col" colspan="2" rowspan="1" style="vertical-align: middle;">Saida</th><!--<th scope="col">Saida</th>--><!--<th scope="col">Total</th> <th scope="col">Total</th>-->
                                                          </tr>
                                                          <tr>
                                                            <th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th> <th scope="col">F</th>
                                                          </tr>
                                                        </thead>
                                                
                                                      <tbody>
                                                      <!--Gerando a Tabela de forma Dinamica-->
                                                      @foreach ($aproveitamentosIII as $aproveitamentoIII)
                                                      <!--Invocando outro elementos/ Tabelas -->
                                                  
                                                                    <tr class="">
                                                                        <td>{{$aproveitamentoIII->classe }}</td>
                                                                        <td>{{$aproveitamentoIII->matriculadosMF }}</td>
                                                                        <td>{{$aproveitamentoIII->matriculadosF }}</td>
                                                                  
                                                                        <td>{{$aproveitamentoIII->aprovadosMF }}</td>
                                                                        <td>{{$aproveitamentoIII->aprovadosF }}</td>
                                                                        <td>{{$aproveitamentoIII->reprovadosMF }}</td>
                                                                        <td>{{$aproveitamentoIII->reprovadosF }}</td>
                                                                        <td>{{$aproveitamentoIII->transferidosEMF }}</td>
                                                                        <td>{{$aproveitamentoIII->transferidosEF }}</td>
                                                                        <td>{{$aproveitamentoIII->transferidosSMF }}</td>
                                                                        <td>{{$aproveitamentoIII->transferidosSF }}</td>
                                                                        <td>{{$aproveitamentoIII->desistentesMF }}</td>
                                                                        <td>{{$aproveitamentoIII->desistentesF }}</td>
                                          

                                                                        <td class="d-none">
                                                                        <button class="btn btn-warning w-100 m-1" data-toggle="modal" data-target="#addAproveitamento{{ $aproveitamentoIII->id }}editar" >
                                                                        Editar
                                                                        </button>

                                                                        <div class="modal fade" id="addAproveitamento{{ $aproveitamentoIII->id }}editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                                                      <div class="modal-dialog" role="document">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h6 class="modal-title" id="exampleModalLabel">  Editar Aproveitamento da Classe {{ $aproveitamentoIII->classe }} do III Trimestre da Classe {{ $aproveitamentoIII->classe }} do III Trimestre</h6>
                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <div class="modal-body">

                                                                                                    <!-- Formulário dentro da modal -->
                                                                                                    <form method="POST" enctype="multipart/form-data" action="{{ route('update.aproveitamento', ['id' => $aproveitamentoIII->id ]) }}">
                                                                                                        @csrf
                                                                                                        @method('POST')
                                                                                                        <div class="form-group">
                                                                                                          <label for="classe">Classe </label>
                                                                                                          <select name="classe" id="classe" class="form-control" required>
                                                                                                            <option value="{{ isset($aproveitamentoIII->classe) ? $aproveitamentoIII->classe : 'Seleccione uma Classe' }}"> {{ isset($aproveitamentoIII->classe) ? $aproveitamentoIII->classe : 'Seleccione uma Classe' }}</option>
                                                                                                            <option value="Iniciação">Iniciação</option>
                                                                                                            <option value="1ª">1ª Classe</option>
                                                                                                            <option value="2ª">2ª Classe</option>
                                                                                                            <option value="3ª">3ª Classe</option>
                                                                                                            <option value="4ª">4ª Classe</option>
                                                                                                            <option value="5ª">5ª Classe</option>
                                                                                                            <option value="6ª">6ª Classe</option>
                                                                                                          </select>
                                                                                                        </div>
                                                                                                        <div class="form-group">
                                                                                                            <label for="matriculadosMF">Matriculados, Masculinos e Femininos no Trimestre </label>
                                                                                                            <input type="number" name="matriculadosMF" class="form-control" value="{{ isset($aproveitamentoIII->matriculadosMF) ? $aproveitamentoIII->matriculadosMF : '' }}" required>
                                                                                                            <label for="matriculadosF">Matriculados, Femininos no Trimestre</label>
                                                                                                            <input type="number" name="matriculadosF" class="form-control" value="{{ isset($aproveitamentoIII->matriculadosF) ? $aproveitamentoIII->matriculadosF : '' }}" required>
                                                                                                        
                                                                        

                                                                                                            <label for="aprovadosMF">Aprovados, Masculinos e Femininos</label>
                                                                                                            <input type="number" name="aprovadosMF" class="form-control" value="{{ isset($aproveitamentoIII->aprovadosMF) ? $aproveitamentoIII->aprovadosMF : '' }}" required>
                                                                                                            <label for="aprovadosF">Aprovados, Femininos</label>
                                                                                                            <input type="number" name="aprovadosF" class="form-control" value="{{ isset($aproveitamentoIII->aprovadosF) ? $aproveitamentoIII->aprovadosF : '' }}" required>
                                                                                                            <label for="reprovadosMF">Reprovados, Masculinos e Femininos</label>
                                                                                                            <input type="number" name="reprovadosMF" class="form-control" value="{{ isset($aproveitamentoIII->reprovadosMF) ? $aproveitamentoIII->reprovadosMF : '' }}" required>
                                                                                                            <label for="reprovadosF">Reprovados, Femininos</label>
                                                                                                            <input type="number" name="reprovadosF" class="form-control" value="{{ isset($aproveitamentoIII->reprovadosF) ? $aproveitamentoIII->reprovadosF : '' }}" required>
                                                                                                            <label for="transferidosEMF">Transferidos (Entrada), Masculinos e Femininos</label>
                                                                                                            <input type="number" name="transferidosEMF" class="form-control" value="{{ isset($aproveitamentoIII->transferidosEMF) ? $aproveitamentoIII->transferidosEMF : '' }}" required>
                                                                                                            <label for="transferidosEF">Transferidos (Entrada), Femininos</label>
                                                                                                            <input type="number" name="transferidosEF" class="form-control" value="{{ isset($aproveitamentoIII->transferidosEF) ? $aproveitamentoIII->transferidosEF : '' }}" required>
                                                                                                            
                                                                                                            <label for="transferidosSMF">Transferidos (Saída), Masculinos e Femininos</label>
                                                                                                            <input type="number" name="transferidosSMF" class="form-control" value="{{ isset($aproveitamentoIII->transferidosSMF) ? $aproveitamentoIII->transferidosSMF : '' }}" required>
                                                                                                            <label for="transferidosSF">Transferidos (Saída), Femininos</label>
                                                                                                            <input type="number" name="transferidosSF" class="form-control" value="{{ isset($aproveitamentoIII->transferidosSF) ? $aproveitamentoIII->transferidosSF : '' }}" required>

                                                                                                            <label for="desistentesMF">Desistentes, Masculinos e Femininos</label>
                                                                                                            <input type="number" name="desistentesMF" class="form-control" value="{{ isset($aproveitamentoIII->desistentesMF) ? $aproveitamentoIII->desistentesMF : '' }}" required>
                                                                                                            <label for="desistentesF">Desistentes, Femininos</label>
                                                                                                            <input type="number" name="desistentesF" class="form-control" value="{{ isset($aproveitamentoIII->desistentesF) ? $aproveitamentoIII->desistentesF : '' }}" required>
                                                                                                            
                                                                                                        </div>
                                                                                                        <div class="form-group">
                                                                                                          <input type="hidden" name="trimestre" value="III">
                                                                                                          <input type="hidden" name="anoLectivo" value="{{ date('Y') }}">
                                                                                                          <input type="hidden" name="idUnidadeOrganica" value="{{ $unidadeOrganicaSelected->id }}">
                                                                                                          <input type="hidden" name="idFuncionario" value="{{ $funcionarioLogado->id }}">
                                                                                                        </div>
                                                                                                        <div class="form-check">
                                                                                                            <input type="checkbox" name="confirmar" class="form-check-input" required>
                                                                                                            <label class="form-check-label" for="confirmar">Clique para Confirmar</label>
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                              <button type="submit" class="btn btn-primary">Inserir Formulário</button>
                                                                                                        </div>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                      </div>
                                                                        </div>

                                                                          <form class="d-none" action="{{ route('eliminar.objecto') }}" method="POST" id="deleteForm{{ $aproveitamentoIII->id }}">
                                                                              @csrf
                                                                              @method('DELETE')
                                                                              <input type="hidden" name="id" value="{{ $aproveitamentoIII->id }}">
                                                                              <button type="submit" class="btn btn-danger w-100 m-1" onclick="confirmAndSubmit(event, 'Confirmar deletar Pessoa?', 'Sim, Deletar!', 'Não, Cancelar!')">Deletar</button>
                                                                          </form>
                                                                        </td>
                                                                    </tr>
                                                      @endforeach
                                                      </tbody>
                                                      <tfoot>
                                          
                                                        <thead class="bg-secondary d-none">
                                                          <tr>
                                                            <th scope="col" rowspan="3" colspan="1" style=" vertical-align:middle" >Classe</th><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Número de Alunos no Incio do Trimestre</th><!--<th scope="col">Matriculados</th>--> <th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Número de Alunos no Final do Trimestre</th><!--<th scope="col">Matriculados</th>--><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Aprovados</th><!--<th scope="col">Aprovados</th>--><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Reprovados</th><!--<th scope="col">Reprovados</th>--><th scope="col" colspan="4" rowspan="1" style="vertical-align: middle;">Trasferidos</th><!--<th scope="col">Trasferidos</th><th scope="col">Trasferidos</th><th scope="col">Trasferidos</th> --><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Desistentes</th> <th class="d-none" scope="col" colspan="1" rowspan="3" style="vertical-align: middle;">Opções</th><!--<th scope="col">Total</th>-->
                                                          </tr>
                                                          <tr>
                                                            <!--<th scope="col">Alunos</th> --><!--<th scope="col" colspan="2">Matriculados</th><th scope="col">Matriculados</th>--> <!--<th scope="col">Aprovados</th><th scope="col">Aprovados</th>--><!--<th scope="col">Reprovados</th><th scope="col">Reprovados</th>--><th scope="col" colspan="2" rowspan="1" style="vertical-align: middle;">Entrada</th><!--<th scope="col">Entrada</th> --> <th scope="col" colspan="2" rowspan="1" style="vertical-align: middle;">Saida</th><!--<th scope="col">Saida</th>--><!--<th scope="col">Total</th> <th scope="col">Total</th>-->
                                                          </tr>
                                                          <tr>
                                                            <th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th> <th scope="col">F</th>
                                                          </tr>
                                                        </thead>

                                                      </tfoot>
                                                    </table>
                                                    </div>
                                                  </div>
                                                  <div class="card-footer">
                                                      <button class="btn btn-primary w-100 m-1 d-none" data-toggle="modal" data-target="#addAproveitamentoIII" >
                                                        Inserir
                                                      </button>

                                                      <div class="modal fade" id="addAproveitamentoIII" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                          <div class="modal-content">
                                                                              <div class="modal-header">
                                                                                  <h6 class="modal-title" id="exampleModalLabel">Formulario de Aproveitamento do III Trimestre do ano Lectivo {{ date('Y') }}</h6>
                                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                      <span aria-hidden="true">&times;</span>
                                                                                  </button>
                                                                              </div>
                                                                              <div class="modal-body">

                                                                                  <!-- Formulário dentro da modal -->
                                                                                  <form method="POST" enctype="multipart/form-data" action="{{ route('store.aproveitamento') }}">
                                                                                      @csrf
                                                                                      @method('POST')
                                                                                      <div class="form-group">
                                                                                        <label for="classe">Classe </label>
                                                                                        <select name="classe" id="classe" class="form-control" required>
                                                                                          <option value="Iniciação">Iniciação</option>
                                                                                          <option value="1ª">1ª Classe</option>
                                                                                          <option value="2ª">2ª Classe</option>
                                                                                          <option value="3ª">3ª Classe</option>
                                                                                          <option value="4ª">4ª Classe</option>
                                                                                          <option value="5ª">5ª Classe</option>
                                                                                          <option value="6ª">6ª Classe</option>
                                                                                        </select>
                                                                                      </div>
                                                                                      <div class="form-group">
                                                                                          <label for="matriculadosMF">Matriculados, Masculinos e Femininos no Trimestre </label>
                                                                                          <input type="number" name="matriculadosMF" class="form-control" required>
                                                                                          <label for="matriculadosF">Matriculados, Femininos no Trimestre</label>
                                                                                          <input type="number" name="matriculadosF" class="form-control" required>
                                                                                      
                                                      

                                                                                          <label for="aprovadosMF">Aprovados, Masculinos e Femininos</label>
                                                                                          <input type="number" name="aprovadosMF" class="form-control" required>
                                                                                          <label for="aprovadosF">Aprovados, Femininos</label>
                                                                                          <input type="number" name="aprovadosF" class="form-control" required>
                                                                                          <label for="reprovadosMF">Reprovados, Masculinos e Femininos</label>
                                                                                          <input type="number" name="reprovadosMF" class="form-control" required>
                                                                                          <label for="reprovadosF">Reprovados, Femininos</label>
                                                                                          <input type="number" name="reprovadosF" class="form-control" required>
                                                                                          <label for="transferidosEMF">Transferidos (Entrada), Masculinos e Femininos</label>
                                                                                          <input type="number" name="transferidosEMF" class="form-control" required>
                                                                                          <label for="transferidosEF">Transferidos (Entrada), Femininos</label>
                                                                                          <input type="number" name="transferidosEF" class="form-control" required>
                                                                                          
                                                                                          <label for="transferidosSMF">Transferidos (Saída), Masculinos e Femininos</label>
                                                                                          <input type="number" name="transferidosSMF" class="form-control" required>
                                                                                          <label for="transferidosSF">Transferidos (Saída), Femininos</label>
                                                                                          <input type="number" name="transferidosSF" class="form-control" required>

                                                                                          <label for="desistentesMF">Desistentes, Masculinos e Femininos</label>
                                                                                          <input type="number" name="desistentesMF" class="form-control" required>
                                                                                          <label for="desistentesF">Desistentes, Femininos</label>
                                                                                          <input type="number" name="desistentesF" class="form-control" required>
                                                                                          
                                                                                      </div>
                                                                                      <div class="form-group">
                                                                                        <input type="hidden" name="trimestre" value="III">
                                                                                        <input type="hidden" name="anoLectivo" value="{{ date('Y') }}">
                                                                                        <input type="hidden" name="idUnidadeOrganica" value="{{ $unidadeOrganicaSelected->id }}">
                                                                                        <input type="hidden" name="idFuncionario" value="{{ $funcionarioLogado->id }}">
                                                                                      </div>
                                                                                      <div class="form-check">
                                                                                          <input type="checkbox" name="confirmar" class="form-check-input" required>
                                                                                          <label class="form-check-label" for="confirmar">Clique para Confirmar</label>
                                                                                      </div>
                                                                                      <div class="modal-footer">
                                                                                            <button type="submit" class="btn btn-primary">Inserir Formulário</button>
                                                                                      </div>
                                                                                  </form>
                                                                              </div>
                                                                          </div>
                                                                    </div>
                                                      </div>
                                                  </div>
                                                </div>
                                              <!--/ Formulario I  Trimestre -->
                                          </div>
                                        <!-- /tab-pane -->
                                        <!--tab-pane -->
                                          <div class="tab-pane" id="Final">
                                              <!-- Formulario II  Trimestre -->
                                                <div class="card card-primary">
                                                  <div class="card-header">
                                                    <h3 class="card-title">
                                                      Aproveitamento escolar do Final Trimestre
                                                    </h3>
                                                  </div>
                                                  <div class="card-body">
                                                    <div class="table-responsive">
                                                    <table id="tabelaFinal" class="table table-bordered table-striped">
                                            
                                                        <thead class="bg-secondary">
                                                          <tr>
                                                            <th scope="col" rowspan="3" colspan="1" style=" vertical-align:middle" >Classe</th><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Número de Alunos no Trimestre</th> <!--<th scope="col">Matriculados</th>--> <th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Aprovados</th><!--<th scope="col">Aprovados</th>--><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Reprovados</th><!--<th scope="col">Reprovados</th>--><th scope="col" colspan="4" rowspan="1" style="vertical-align: middle;">Trasferidos</th><!--<th scope="col">Trasferidos</th><th scope="col">Trasferidos</th><th scope="col">Trasferidos</th> --><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Desistentes</th> <th scope="col" colspan="1" rowspan="3" style="vertical-align: middle;" class="d-none">Opções</th><!--<th scope="col">Total</th>-->
                                                          </tr>
                                                          <tr>
                                                            <!--<th scope="col">Alunos</th> --><!--<th scope="col" colspan="2">Matriculados</th><th scope="col">Matriculados</th>--> <!--<th scope="col">Aprovados</th><th scope="col">Aprovados</th>--><!--<th scope="col">Reprovados</th><th scope="col">Reprovados</th>--><th scope="col" colspan="2" rowspan="1" style="vertical-align: middle;">Entrada</th><!--<th scope="col">Entrada</th> --> <th scope="col" colspan="2" rowspan="1" style="vertical-align: middle;">Saida</th><!--<th scope="col">Saida</th>--><!--<th scope="col">Total</th> <th scope="col">Total</th>-->
                                                          </tr>
                                                          <tr>
                                                            <th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th> <th scope="col">F</th>
                                                          </tr>
                                                        </thead>
                                                
                                                      <tbody>
                                                      <!--Gerando a Tabela de forma Dinamica-->
                                                      @foreach ($aproveitamentosFinal as $aproveitamentoFinal)
                                                      <!--Invocando outro elementos/ Tabelas -->
                                                  
                                                                    <tr class="">
                                                                        <td>{{$aproveitamentoFinal->classe }}</td>
                                                                        <td>{{$aproveitamentoFinal->matriculadosMF }}</td>
                                                                        <td>{{$aproveitamentoFinal->matriculadosF }}</td>
                                                                  
                                                                        <td>{{$aproveitamentoFinal->aprovadosMF }}</td>
                                                                        <td>{{$aproveitamentoFinal->aprovadosF }}</td>
                                                                        <td>{{$aproveitamentoFinal->reprovadosMF }}</td>
                                                                        <td>{{$aproveitamentoFinal->reprovadosF }}</td>
                                                                        <td>{{$aproveitamentoFinal->transferidosEMF }}</td>
                                                                        <td>{{$aproveitamentoFinal->transferidosEF }}</td>
                                                                        <td>{{$aproveitamentoFinal->transferidosSMF }}</td>
                                                                        <td>{{$aproveitamentoFinal->transferidosSF }}</td>
                                                                        <td>{{$aproveitamentoFinal->desistentesMF }}</td>
                                                                        <td>{{$aproveitamentoFinal->desistentesF }}</td>
                                          

                                                                        <td class="d-none">
                                                                        <button class="btn btn-warning w-100 m-1" data-toggle="modal" data-target="#addAproveitamento{{ $aproveitamentoFinal->id }}editar" >
                                                                        Editar
                                                                        </button>

                                                                        <div class="modal fade" id="addAproveitamento{{ $aproveitamentoFinal->id }}editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                                                      <div class="modal-dialog" role="document">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h6 class="modal-title" id="exampleModalLabel">  Editar Aproveitamento da Classe {{ $aproveitamentoFinal->classe }} do Final Trimestre da Classe {{ $aproveitamentoFinal->classe }} do Final Trimestre</h6>
                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                        <span aria-hidden="true">&times;</span>
                                                                                                    </button>
                                                                                                </div>
                                                                                                <div class="modal-body">

                                                                                                    <!-- Formulário dentro da modal -->
                                                                                                    <form method="POST" enctype="multipart/form-data" action="{{ route('update.aproveitamento', ['id' => $aproveitamentoFinal->id ]) }}">
                                                                                                        @csrf
                                                                                                        @method('POST')
                                                                                                        <div class="form-group">
                                                                                                          <label for="classe">Classe </label>
                                                                                                          <select name="classe" id="classe" class="form-control" required>
                                                                                                            <option value="{{ isset($aproveitamentoFinal->classe) ? $aproveitamentoFinal->classe : 'Seleccione uma Classe' }}"> {{ isset($aproveitamentoFinal->classe) ? $aproveitamentoFinal->classe : 'Seleccione uma Classe' }}</option>
                                                                                                            <option value="Iniciação">Iniciação</option>
                                                                                                            <option value="1ª">1ª Classe</option>
                                                                                                            <option value="2ª">2ª Classe</option>
                                                                                                            <option value="3ª">3ª Classe</option>
                                                                                                            <option value="4ª">4ª Classe</option>
                                                                                                            <option value="5ª">5ª Classe</option>
                                                                                                            <option value="6ª">6ª Classe</option>
                                                                                                          </select>
                                                                                                        </div>
                                                                                                        <div class="form-group">
                                                                                                            <label for="matriculadosMF">Matriculados, Masculinos e Femininos no Trimestre </label>
                                                                                                            <input type="number" name="matriculadosMF" class="form-control" value="{{ isset($aproveitamentoFinal->matriculadosMF) ? $aproveitamentoFinal->matriculadosMF : '' }}" required>
                                                                                                            <label for="matriculadosF">Matriculados, Femininos no Trimestre</label>
                                                                                                            <input type="number" name="matriculadosF" class="form-control" value="{{ isset($aproveitamentoFinal->matriculadosF) ? $aproveitamentoFinal->matriculadosF : '' }}" required>
                                                                                                        
                                                                        

                                                                                                            <label for="aprovadosMF">Aprovados, Masculinos e Femininos</label>
                                                                                                            <input type="number" name="aprovadosMF" class="form-control" value="{{ isset($aproveitamentoFinal->aprovadosMF) ? $aproveitamentoFinal->aprovadosMF : '' }}" required>
                                                                                                            <label for="aprovadosF">Aprovados, Femininos</label>
                                                                                                            <input type="number" name="aprovadosF" class="form-control" value="{{ isset($aproveitamentoFinal->aprovadosF) ? $aproveitamentoFinal->aprovadosF : '' }}" required>
                                                                                                            <label for="reprovadosMF">Reprovados, Masculinos e Femininos</label>
                                                                                                            <input type="number" name="reprovadosMF" class="form-control" value="{{ isset($aproveitamentoFinal->reprovadosMF) ? $aproveitamentoFinal->reprovadosMF : '' }}" required>
                                                                                                            <label for="reprovadosF">Reprovados, Femininos</label>
                                                                                                            <input type="number" name="reprovadosF" class="form-control" value="{{ isset($aproveitamentoFinal->reprovadosF) ? $aproveitamentoFinal->reprovadosF : '' }}" required>
                                                                                                            <label for="transferidosEMF">Transferidos (Entrada), Masculinos e Femininos</label>
                                                                                                            <input type="number" name="transferidosEMF" class="form-control" value="{{ isset($aproveitamentoFinal->transferidosEMF) ? $aproveitamentoFinal->transferidosEMF : '' }}" required>
                                                                                                            <label for="transferidosEF">Transferidos (Entrada), Femininos</label>
                                                                                                            <input type="number" name="transferidosEF" class="form-control" value="{{ isset($aproveitamentoFinal->transferidosEF) ? $aproveitamentoFinal->transferidosEF : '' }}" required>
                                                                                                            
                                                                                                            <label for="transferidosSMF">Transferidos (Saída), Masculinos e Femininos</label>
                                                                                                            <input type="number" name="transferidosSMF" class="form-control" value="{{ isset($aproveitamentoFinal->transferidosSMF) ? $aproveitamentoFinal->transferidosSMF : '' }}" required>
                                                                                                            <label for="transferidosSF">Transferidos (Saída), Femininos</label>
                                                                                                            <input type="number" name="transferidosSF" class="form-control" value="{{ isset($aproveitamentoFinal->transferidosSF) ? $aproveitamentoFinal->transferidosSF : '' }}" required>

                                                                                                            <label for="desistentesMF">Desistentes, Masculinos e Femininos</label>
                                                                                                            <input type="number" name="desistentesMF" class="form-control" value="{{ isset($aproveitamentoFinal->desistentesMF) ? $aproveitamentoFinal->desistentesMF : '' }}" required>
                                                                                                            <label for="desistentesF">Desistentes, Femininos</label>
                                                                                                            <input type="number" name="desistentesF" class="form-control" value="{{ isset($aproveitamentoFinal->desistentesF) ? $aproveitamentoFinal->desistentesF : '' }}" required>
                                                                                                            
                                                                                                        </div>
                                                                                                        <div class="form-group">
                                                                                                          <input type="hidden" name="trimestre" value="Final">
                                                                                                          <input type="hidden" name="anoLectivo" value="{{ date('Y') }}">
                                                                                                          <input type="hidden" name="idUnidadeOrganica" value="{{ $unidadeOrganicaSelected->id }}">
                                                                                                          <input type="hidden" name="idFuncionario" value="{{ $funcionarioLogado->id }}">
                                                                                                        </div>
                                                                                                        <div class="form-check">
                                                                                                            <input type="checkbox" name="confirmar" class="form-check-input" required>
                                                                                                            <label class="form-check-label" for="confirmar">Clique para Confirmar</label>
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                              <button type="submit" class="btn btn-primary">Inserir Formulário</button>
                                                                                                        </div>
                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                      </div>
                                                                        </div>

                                                                          <form class="d-none" action="{{ route('eliminar.objecto') }}" method="POST" id="deleteForm{{ $aproveitamentoFinal->id }}">
                                                                              @csrf
                                                                              @method('DELETE')
                                                                              <input type="hidden" name="id" value="{{ $aproveitamentoFinal->id }}">
                                                                              <button type="submit" class="btn btn-danger w-100 m-1" onclick="confirmAndSubmit(event, 'Confirmar deletar Pessoa?', 'Sim, Deletar!', 'Não, Cancelar!')">Deletar</button>
                                                                          </form>
                                                                        </td>
                                                                    </tr>
                                                      @endforeach
                                                      </tbody>
                                                      <tfoot>
                                          
                                                        <thead class="bg-secondary d-none">
                                                          <tr>
                                                            <th scope="col" rowspan="3" colspan="1" style=" vertical-align:middle" >Classe</th><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Número de Alunos no Incio do Trimestre</th><!--<th scope="col">Matriculados</th>--> <th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Número de Alunos no Final do Trimestre</th><!--<th scope="col">Matriculados</th>--><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Aprovados</th><!--<th scope="col">Aprovados</th>--><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Reprovados</th><!--<th scope="col">Reprovados</th>--><th scope="col" colspan="4" rowspan="1" style="vertical-align: middle;">Trasferidos</th><!--<th scope="col">Trasferidos</th><th scope="col">Trasferidos</th><th scope="col">Trasferidos</th> --><th scope="col" colspan="2" rowspan="2" style="vertical-align: middle;">Desistentes</th> <th class="d-none" scope="col" colspan="1" rowspan="3" style="vertical-align: middle;">Opções</th><!--<th scope="col">Total</th>-->
                                                          </tr>
                                                          <tr>
                                                            <!--<th scope="col">Alunos</th> --><!--<th scope="col" colspan="2">Matriculados</th><th scope="col">Matriculados</th>--> <!--<th scope="col">Aprovados</th><th scope="col">Aprovados</th>--><!--<th scope="col">Reprovados</th><th scope="col">Reprovados</th>--><th scope="col" colspan="2" rowspan="1" style="vertical-align: middle;">Entrada</th><!--<th scope="col">Entrada</th> --> <th scope="col" colspan="2" rowspan="1" style="vertical-align: middle;">Saida</th><!--<th scope="col">Saida</th>--><!--<th scope="col">Total</th> <th scope="col">Total</th>-->
                                                          </tr>
                                                          <tr>
                                                            <th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th><th scope="col">F</th> <th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th><th scope="col">F</th><th scope="col">MF</th> <th scope="col">F</th>
                                                          </tr>
                                                        </thead>

                                                      </tfoot>
                                                    </table>
                                                    </div>
                                                  </div>
                                                  <div class="card-footer">
                                                      <button class="btn btn-primary w-100 m-1 d-none" data-toggle="modal" data-target="#addAproveitamentoFinal" >
                                                        Inserir
                                                      </button>

                                                      <div class="modal fade" id="addAproveitamentoFinal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                          <div class="modal-content">
                                                                              <div class="modal-header">
                                                                                  <h6 class="modal-title" id="exampleModalLabel">Formulario de Aproveitamento do Final do ano Lectivo {{ date('Y') }}</h6>
                                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                      <span aria-hidden="true">&times;</span>
                                                                                  </button>
                                                                              </div>
                                                                              <div class="modal-body">

                                                                                  <!-- Formulário dentro da modal -->
                                                                                  <form method="POST" enctype="multipart/form-data" action="{{ route('store.aproveitamento') }}">
                                                                                      @csrf
                                                                                      @method('POST')
                                                                                      <div class="form-group">
                                                                                        <label for="classe">Classe </label>
                                                                                        <select name="classe" id="classe" class="form-control" required>
                                                                                          <option value="Iniciação">Iniciação</option>
                                                                                          <option value="1ª">1ª Classe</option>
                                                                                          <option value="2ª">2ª Classe</option>
                                                                                          <option value="3ª">3ª Classe</option>
                                                                                          <option value="4ª">4ª Classe</option>
                                                                                          <option value="5ª">5ª Classe</option>
                                                                                          <option value="6ª">6ª Classe</option>
                                                                                        </select>
                                                                                      </div>
                                                                                      <div class="form-group">
                                                                                          <label for="matriculadosMF">Matriculados, Masculinos e Femininos no Trimestre </label>
                                                                                          <input type="number" name="matriculadosMF" class="form-control" required>
                                                                                          <label for="matriculadosF">Matriculados, Femininos no Trimestre</label>
                                                                                          <input type="number" name="matriculadosF" class="form-control" required>
                                                                                      
                                                      

                                                                                          <label for="aprovadosMF">Aprovados, Masculinos e Femininos</label>
                                                                                          <input type="number" name="aprovadosMF" class="form-control" required>
                                                                                          <label for="aprovadosF">Aprovados, Femininos</label>
                                                                                          <input type="number" name="aprovadosF" class="form-control" required>
                                                                                          <label for="reprovadosMF">Reprovados, Masculinos e Femininos</label>
                                                                                          <input type="number" name="reprovadosMF" class="form-control" required>
                                                                                          <label for="reprovadosF">Reprovados, Femininos</label>
                                                                                          <input type="number" name="reprovadosF" class="form-control" required>
                                                                                          <label for="transferidosEMF">Transferidos (Entrada), Masculinos e Femininos</label>
                                                                                          <input type="number" name="transferidosEMF" class="form-control" required>
                                                                                          <label for="transferidosEF">Transferidos (Entrada), Femininos</label>
                                                                                          <input type="number" name="transferidosEF" class="form-control" required>
                                                                                          
                                                                                          <label for="transferidosSMF">Transferidos (Saída), Masculinos e Femininos</label>
                                                                                          <input type="number" name="transferidosSMF" class="form-control" required>
                                                                                          <label for="transferidosSF">Transferidos (Saída), Femininos</label>
                                                                                          <input type="number" name="transferidosSF" class="form-control" required>

                                                                                          <label for="desistentesMF">Desistentes, Masculinos e Femininos</label>
                                                                                          <input type="number" name="desistentesMF" class="form-control" required>
                                                                                          <label for="desistentesF">Desistentes, Femininos</label>
                                                                                          <input type="number" name="desistentesF" class="form-control" required>
                                                                                          
                                                                                      </div>
                                                                                      <div class="form-group">
                                                                                        <input type="hidden" name="trimestre" value="Final">
                                                                                        <input type="hidden" name="anoLectivo" value="{{ date('Y') }}">
                                                                                        <input type="hidden" name="idUnidadeOrganica" value="{{ $unidadeOrganicaSelected->id }}">
                                                                                        <input type="hidden" name="idFuncionario" value="{{ $funcionarioLogado->id }}">
                                                                                      </div>
                                                                                      <div class="form-check">
                                                                                          <input type="checkbox" name="confirmar" class="form-check-input" required>
                                                                                          <label class="form-check-label" for="confirmar">Clique para Confirmar</label>
                                                                                      </div>
                                                                                      <div class="modal-footer">
                                                                                            <button type="submit" class="btn btn-primary">Inserir Formulário</button>
                                                                                      </div>
                                                                                  </form>
                                                                              </div>
                                                                          </div>
                                                                    </div>
                                                      </div>
                                                  </div>
                                                </div>
                                              <!--/ Formulario I  Trimestre -->
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
           <!-- /.content-wrapper -->
    </div>
    
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
            <!-- JQVMap -->
            <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }} "></script>
            <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }} "></script>
            <script src="{{ asset('plugins/jqvmap/maps/continents/jquery.vmap.africa.js') }} "></script>
            <!--Aproveitamento Graficos-->
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
            <!-- Scripts de Gerenciamento de tabelas de aproveitamento por Classes em uma unidade organica -->

    @endsection
