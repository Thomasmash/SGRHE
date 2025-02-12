@php
  $permissoes = $cargoLogado->permissoes;
  $seccao = $seccaoLogado->designacao;
  $notificacaosSeccao = App\Models\Notificacao::where('seccao', $seccaoLogado->codNome)->where('visualizadoSeccao', false)->exists();
  $notificacaosFuncionario = App\Models\Notificacao::where('idFuncionarioSolicitante', $funcionarioLogado->id)->where('visualizadoFuncionario', false)->exists();
@endphp
<div class="sidebar">
      <!-- SidebarSearch Form 
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
      
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library has-treeview -->
              <li class="nav-item  menu-open" id="menu" >
                      <!--Perfil-->
                        
                                <div class="image">
                                      <!--Verificador e renderizador de foto de Perfil-->  
                                      @php
                                        $fotodeperfil = App\Models\Arquivo::where('idFuncionario',$funcionarioLogado->id)->where('categoria','FotoPerfil')->first();
                                        //echo($fotodeperfil);
                                      @endphp
                                      @if ($fotodeperfil )            
                                        <!--Se existir (foto de Perfil-->
                                      <img class="profile-user-img img-fluid img-circle"
                                              src="{{ route('Exibir.Imagem', ['imagem' => base64_encode( $fotodeperfil->caminho )]) }}"
                                              alt="User profile picture">
                                      @else
                                      <!--Se Nao existir foto de Perfil-->
                                        @if(($pessoaLogado->genero === 'Masculino') || ($pessoaLogado->genero === 'N/D'))
                                        <img class="profile-user-img img-fluid img-circle"
                                        src="{{ route('Avatar.UsuarioM') }}"
                                                alt="User profile picture">
                                        @else
                                        <img class="profile-user-img img-fluid img-circle"
                                        src="{{ route('Avatar.UsuarioF') }}"
                                                alt="User profile picture">
                                        @endif
                                      @endif
                                              
                                </div>
                                <a href="{{ route('perfil.show', ['idFuncionario' => $funcionarioLogado->id]) }}" class="d-block">
                                  <div class="text-center ">
                                    <div style="width:100%;" class="info elemento" id="elemento">
                                      <p style="font-weight: bolder;">{{ $cargoLogado->designacao }}</p> <!--.' de(a) '.$seccaoLogado->designacao -->
                                      <p>({{ $seccaoLogado->codNome }})</p>
                                      <p>Olá {{ explode(" ", $pessoaLogado->nomeCompleto)[0] }}!</p>
                                      <p>Seja bem vind{{ ( $pessoaLogado->genero === 'Masculino' ) ? 'o' : 'a' }}!</p>
                                    </div>
                                  </div>
                                  <hr style="border: 1px solid grey;">
                                </a>
                                
    
                          <li class="nav-item">
                                <a id="{{ $notificacaosFuncionario == true ? 'toggleLink' : '' }}" href="{{ route('listar.processos.funionario', ['idFuncionario' => $funcionarioLogado->id]) }} "  class=" nav-link {{ request()->routeIs('listar.processos.funionario') ? 'active' : ''}}">
                                <i class="bi bi-calendar2-range"></i>  
                                <p class="item-1">
                                    Processos do Funcionário
                                  </p>
                                </a>
                          </li>
                          @if ($permissoes === 'Admin' || $permissoes >= 4)
                                    <!--Dashboards-->
                                      <li class="nav-item">
                                          <a id="{{ $notificacaosSeccao == true ? 'toggleLinkSeccao' : '' }}" href="#" class="nav-link {{ request()->routeIs('inicio') ? 'active' : ''}} {{ request()->routeIs('processos.seccao') ? 'active' : ''}} {{ request()->routeIs('mapas.efectividade') ? 'active' : ''}}">
                                          <i class="bi bi-graph-up-arrow"></i>
                                            <p class="item-1">
                                              Dashboards & Processos
                                              <i class="right fas fa-angle-left"></i>
                                            </p>
                                          </a>
                                          <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                              <a href="{{ route('inicio') }}"  class="nav-link {{ request()->routeIs('inicio') ? 'active' : ''}}">
                                                <p class="item-2">
                                                <i class="bi bi-clipboard-data-fill"></i>
                                                  DashBoard
                                                </p>
                                              </a>
                                            </li>
                                            <li class="nav-item">
                                              <a id="{{ $notificacaosSeccao == true ? 'toggleLinkSeccao' : '' }}" href="{{ route('processos.seccao', ['seccao' => $seccaoLogado->codNome ] ) }}" class="nav-link {{ $notificacaosSeccao == true ? 'notificacaoActiva' : '' }} {{ request()->routeIs('processos.seccao') ? 'active' : ''}}">
                                                <p class="item-2">
                                                <i class="bi bi-grid"></i>
                                                  Processos da Secção
                                                </p>
                                              </a>
                                            </li>
                                            <li class="nav-item">
                                              <a href="{{ route('mapas.efectividade') }}"  class="nav-link {{ request()->routeIs('mapas.efectividade') ? 'active' : ''}}">
                                                <p class="item-2">
                                                <i class="bi bi-grid"></i>
                                                  Mapas de Efectividade
                                                </p>
                                              </a>
                                            </li>
                                            <li class="nav-item d-none">
                                              <a href="#"  class="nav-link ">
                                                <p class="item-2">
                                                <i class="bi bi-grid"></i>
                                                  Outro
                                                </p>
                                              </a>
                                            </li>
                                          </ul>
                                      </li>
                                    <!--Dashboards-->
                          @endif
                         <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->routeIs('perfil.show') || request()->routeIs('configuracao.perfil') ? 'active' : ''}}">
                              <i class="bi bi-person-lines-fill"></i> 
                              <p class="item-1">
                                  Opções de Perfil
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                            </a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a href="{{ route('perfil.show', ['idFuncionario' => $funcionarioLogado->id]) }}"  class="nav-link {{ request()->routeIs('perfil.show') ? 'active' : ''}}">
                                  <p class="item-2">
                                   <i class="bi bi-person-vcard-fill"></i>
                                    Perfil
                                  </p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ route('configuracao.perfil') }}"  class="nav-link {{ request()->routeIs('configuracao.perfil') ? 'active' : ''}} ">
                                  <p class="item-2">
                                  <i class="bi bi-person-gear"></i>
                                    Configurações de Perfil
                                  </p>
                                </a>
                              </li>
                            </ul>
                        </li>
                      <!--Perfil-->
              @if ($permissoes === '3' || $permissoes === '2')
                      <!--Dashboards-->
                        <li class="nav-item">
                            <a href="#" class="nav-link {{ request()->routeIs('dashboard.unidade.organica.how') ? 'active' : ''}}">
                              <i class="bi bi-graph-up-arrow"></i>
                              <p class="item-1">
                                Dashboards
                                <i class="right fas fa-angle-left"></i>
                              </p>
                            </a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a href="{{ route('inicio') }}"  class="nav-link {{ request()->routeIs('dashboard.unidade.organica.how') ? 'active' : ''}}">
                                  <p class="item-2">
                                   <i class="bi bi-clipboard2-pulse-fill"></i>
                                    DashBoard Escola
                                  </p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="#"  class="nav-link {{ request()->routeIs('inicio') ? 'active' : ''}}">
                                  <p class="item-2">
                                    <i class="fa fa-th-list nav-icon"></i>
                                    Outro
                                  </p>
                                </a>
                              </li>
                            </ul>
                        </li>
                      <!--Dashboards-->
              @endif
                      <!-- Opcoes do Funcionario-->
                        <li class="nav-item {{ request()->routeIs('fichas.avaliacao.funcionario') ? 'menu-open' : '' }}">
                          <a href="#" class="nav-link {{ request()->routeIs('fichas.avaliacao.funcionario') ? 'active' : '' }}">
                          <i class="bi bi-menu-button-fill"></i>
                            <p class="item-1">
                            Opções do Funcionário
                              <i class="right fas fa-angle-left"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="{{ route('fichas.avaliacao.funcionario', ['idFuncionario' => $funcionarioLogado->id ]) }}"  class="nav-link {{ request()->routeIs('fichas.avaliacao.funcionario') ? 'active' : ''}}">
                                <p class="item-2">
                                <i class="bi bi-calendar2-range"></i>
                                Fichas de Avaliação
                                </p>
                              </a>
                            </li>
                            <li class="nav-item d-none">
                              <a href=""  class="nav-link ">
                                <p class="item-2">
                                <i class="bi bi-calendar2-range"></i>
                                Outros
                                </p>
                              </a>
                            </li>
                          </ul>
                        </li>
                      <!-- Opcoes do Funcionario-->
                    
        
              @if ($permissoes === 'Admin' || $permissoes >= 4 )
                      <!--Avaliacao de Desempenho-->
                        <li class="nav-item {{ request()->routeIs('avaliacao.nao.homologados') || request()->routeIs('avaliacao.funcionarios.homologados') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('avaliacao.nao.homologados') || request()->routeIs('avaliacao.funcionarios.homologados') ? 'active' : '' }}">
                          <i class="fas fa-building"></i>
                          <p class="item-1">
                          Avaliação de Desempenho
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="{{route('avaliacao.funcionarios.homologados')}}"  class="nav-link {{ request()->routeIs('avaliacao.funcionarios.homologados') ? 'active' : ''}}">
                                <p class="item-2">
                                 <i class="bi bi-view-list"></i>
                                  Mapa Geral de Avaliação / Index 
                                </p>
                              </a>
                            </li>
                            <li class="nav-item {{ ($permissoes >= 6 || $seccao == 'Secretaria Geral' ) ? '' : 'd-none' }}">
                              <a href="{{route('avaliacao.nao.homologados')}}" class="nav-link {{ request()->routeIs('avaliacao.nao.homologados') ? 'active' : ''}}">
                                <p class="item-2">
                                 <i class="bi bi-building-fill-add"></i>
                                  Por Homologar
                                </p>
                              </a>
                            </li>
                          </ul>
                        </li>
                      <!--/.UnidadeOrganica-->
              @endif
              @if ($permissoes === 'Admin' || $permissoes >= 4 )
                      <!--Funcionários-->
                        <li class="nav-item {{ request()->routeIs('funcionarios') || request()->routeIs('funcionarios.form') ? 'menu-open' : '' }}">
                          <a href="#" class="nav-link {{ request()->routeIs('funcionarios') || request()->routeIs('funcionarios.form') ? 'active' : ''}}">
                            <i class="fas fa-user-tie "></i>
                            <p class="item-1">
                              Funcionários
                              <i class="right fas fa-angle-left"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <form action="{{ route('funcionarios') }}" class="nav-link {{ request()->routeIs('funcionarios') ? 'active' : ''}}" >
                                @csrf
                                @method('POST')
                                <p class="item-2">
                                   <i class="bi bi-view-list"></i>
                                    <input type="hidden" name="titulo" value="Funcionários">
                                    <input type="hidden" name="estado" value="Todo">
                                    <input type="submit" value="Funcionários">
                                </p>
                              </form>
                            </li>
                            <li class="nav-item {{ ($permissoes === 'Admin' || ($permissoes >= 5 && $seccaoLogado->codNome === 'RHPE')) ? '' : 'd-none' }}">
                                <a href="{{route('funcionarios.form')}}"  class="nav-link {{ request()->routeIs('funcionarios.form') ? 'active' : ''}}">
                                  <p class="item-2">
                                  <i class="bi bi-person-plus-fill"></i>
                                    Cadastrar Funcionarios
                                  </p>
                                </a>
                            </li>
                          </ul>
                        </li>
                      <!--/.funcionários-->
              @endif
              @if ($permissoes === 'Admin' || ($permissoes >= 4 && $seccaoLogado->codNome === "RHPE") )
                      <!--CategoriaFuncionario-->
                        <li class="nav-item {{ request()->routeIs('categoriafuncionarios.index') || request()->routeIs('categoriafuncionarios.form') ? 'menu-open' : '' }}">
                          <a href="#" class="nav-link {{ request()->routeIs('categoriafuncionarios.index') || request()->routeIs('categoriafuncionarios.form') ? 'active' : '' }}">
                            <i class="fas fa-user-graduate"></i>
                            <p class="item-1">
                            Categoria de Funcionários
                              <i class="right fas fa-angle-left"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="{{route('categoriafuncionarios.index')}}"  class="nav-link {{ request()->routeIs('categoriafuncionarios.index') ? 'active' : ''}}">
                                <p class="item-2">
                                <i class="bi bi-view-list"></i>
                                  Categoria de Funcionários / Index
                                </p>
                              </a>
                            </li>
                            <li class="nav-item {{ ($permissoes === 'Admin' || $permissoes >= 5) ? '' : 'd-none' }}">
                              <a href="{{route('categoriafuncionarios.form')}}"  class="nav-link {{ request()->routeIs('categoriafuncionarios.form') ? 'active' : ''}}">
                                <p class="item-2">
                                 <i class="bi bi-node-plus-fill"></i>
                                  Cadastarar Categoria de Funcionários
                                </p>
                              </a>
                            </li>
                          </ul>
                        </li>
                      <!--/.CategoriaFuncionario-->
              @endif
              @if ($permissoes === 'Admin' || ($permissoes >= 4 && $seccaoLogado->codNome === "RHPE" )  )

                      <!--Pessoas-->
                        <li class="nav-item {{ request()->routeIs('pessoas.index') || request()->routeIs('pessoas.form') ? 'menu-open' : '' }}">
                          <a href="#" class="nav-link {{ request()->routeIs('pessoas.index') || request()->routeIs('pessoas.form') ? 'active' : '' }}">
                            <i class="fa fa-user"></i>
                            <p class="item-1">
                              Pessoas
                              <i class="right fas fa-angle-left"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{route('pessoas.index')}}"  class="nav-link {{ request()->routeIs('pessoas.index') ? 'active' : ''}}">
                                <p class="item-2">
                                 <i class="bi bi-view-list"></i>
                                  Pessoas / Index
                                </p>
                              </a>
                            </li>
                            <li class="nav-item {{ ($permissoes === 'Admin' || $permissoes >= 5) ? '' : 'd-none' }}">
                              <a href="{{route('pessoas.form')}}"  class="nav-link {{ request()->routeIs('pessoas.form') ? 'active' : ''}}">
                                <p class="item-2">
                                <i class="bi bi-person-plus"></i>
                                  Cadastrar Pessoa
                                </p>
                              </a>
                            </li>
                          </ul>
                        </li>
                      <!--/.Pessoas-->
              @endif
              @if ($permissoes === 'Admin' || $permissoes >= 4 )
                      <!--UnidadeOrganica-->
                        <li class="nav-item {{ request()->routeIs('unidades.organicas') || request()->routeIs('unidadeorganicas.form') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->routeIs('unidades.organicas') || request()->routeIs('unidadeorganicas.form') ? 'active' : '' }}">
                          <i class="fas fa-building"></i>
                          <p class="item-1">
                          Unidades Orgânica
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <form action="{{ route('unidades.organicas') }}" class="nav-link {{ request()->routeIs('unidades.organicas') ? 'active' : ''}}" >
                                @csrf
                                @method('POST')
                                <p class="item-2">
                                   <i class="bi bi-view-list"></i>
                                    <input type="hidden" name="titulo" value="Unidades Orgânicas">
                                    <input type="hidden" name="nivelEnsino" value="Todo">
                                    <input type="submit" value="Unidades Orgânicas">
                                </p>
                              </form>
                            </li>
                            <li class="nav-item {{ ($permissoes === 'Admin' || ($permissoes >= 5 && $seccaoLogado->codNome === 'RHPE')) ? '' : 'd-none' }}">
                              <a href="{{route('unidadeorganicas.form')}}" class="nav-link {{ request()->routeIs('unidadeorganicas.form') ? 'active' : ''}}">
                                <p class="item-2">
                                 <i class="bi bi-building-fill-add"></i>
                                  Cadastrar Unidade Orgánica
                                </p>
                              </a>
                            </li>
                          </ul>
                        </li>
                      <!--/.UnidadeOrganica-->
              @endif
              @if ($permissoes === 'Admin' || ($permissoes >= 4 && $seccaoLogado->codNome === "RHPE") )
                      <!--Cargos-->
                        <li class="nav-item {{ request()->routeIs('cargos.index') || request()->routeIs('cargos.form') ? 'menu-open' : '' }}">
                          <a href="#" class="nav-link {{ request()->routeIs('cargos.index') || request()->routeIs('cargos.form') ? 'active' : '' }}">
                            <i class="fas fa-briefcase"></i>
                            <p class="item-1">
                              Cargos
                              <i class="right fas fa-angle-left"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="{{route('cargos.index')}}"  class="nav-link {{ request()->routeIs('cargos.index') ? 'active' : ''}}">
                                <p class="item-2">
                                 <i class="bi bi-view-list"></i>
                                  Cargos / Index 
                                </p>
                              </a>
                            </li>
                            <li class="nav-item  {{ ($permissoes === 'Admin' || $permissoes >= 5) ? '' : 'd-none' }}">
                              <a href="{{route('cargos.form')}}" class="nav-link {{ request()->routeIs('cargos.form') ? 'active' : ''}}">
                                <p class="item-1">
                                <i class="bi bi-node-plus-fill"></i>
                                  Cadastrar Cargos
                                </p>
                              </a>
                            </li>
                          </ul>
                        </li>
                      <!--/.Cargos-->
              @endif
			       @if ($permissoes === 'Admin' || ($permissoes >= 4 && $seccaoLogado->codNome === "RHPE") )
                      <!--Seccao-->
                        <li class="nav-item {{ request()->routeIs('cargos.index') || request()->routeIs('cargos.form') ? 'menu-open' : '' }}">
                          <a href="#" class="nav-link {{ request()->routeIs('cargos.index') || request()->routeIs('cargos.form') ? 'active' : '' }}">
                            <i class="fas fa-briefcase"></i>
                            <p class="item-1">
                              Secção / Departamentos
                              <i class="right fas fa-angle-left"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                              <a href="{{ route('seccao.index') }}"  class="nav-link {{ request()->routeIs('cargos.index') ? 'active' : ''}}">
                                <p class="item-2">
                                 <i class="bi bi-view-list"></i>
                                  Secção / Index 
                                </p>
                              </a>
                            </li>
                            <li class="nav-item  {{ ($permissoes === 'Admin' || $permissoes >= 5) ? '' : 'd-none' }}">
                              <a href="#" class="nav-link {{ request()->routeIs('cargos.form') ? 'active' : ''}}">
                                <p class="item-1">
                                <i class="bi bi-node-plus-fill"></i>
                                  Cadastrar Secção
                                </p>
                              </a>
                            </li>
                          </ul>
                        </li>
                      <!--/.Cargos-->
              @endif
						<!--Opcoes do Sistema -->
						 <!--Opcoes do Sistema-->
                        <li class=" {{ $permissoes === 'Admin' ? '' : 'd-none' }} nav-item {{ request()->routeIs('opcoes.sistema') || request()->routeIs('auditoria') || request()->routeIs('telemetria') ? 'menu-open' : '' }}">
                          <a href="#" class="nav-link {{ request()->routeIs('opcoes.sistema') || request()->routeIs('auditoria') || request()->routeIs('telemetria')? 'active' : '' }}">
                            <i class="bi bi-gear"></i>
                            <p class="item-1">
                              Opções do Sistema
                              <i class="right fas fa-angle-left"></i>
                            </p>
                          </a>
                          <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('auditoria') }}"  class="nav-link {{ request()->routeIs('auditoria') ? 'active' : ''}}">
                                <p class="item-2">
									<i class="bi bi-clipboard-data-fill"></i>
                                    Auditoria
                                  </p>
                                </a>
							</li>
							<li class="nav-item">
                              <a href="{{route('opcoes.sistema')}}"  class="nav-link {{ request()->routeIs('opcoes.sistema') ? 'active' : ''}}">
                                <p class="item-2">
									<i class="bi bi-database-fill-lock"></i>
									Opções de Backup
                                </p>
                              </a>
                            </li>
							<li class="nav-item">
                                <a href="{{ route('telemetria') }}"  class="nav-link {{ request()->routeIs('telemetria') ? 'active' : ''}}">
                                <p class="item-2">
									<i class="bi bi-clipboard-data-fill"></i>
                                    Telemetria
                                  </p>
                                </a>
							</li>
                          </ul>
                        </li>
						
						<li class="nav-item">
                                <a href="{{ route('regulamento') }}"  class="nav-link {{ request()->routeIs('regulamento') ? 'active' : ''}}">
                                <i class="bi bi-calendar2-range"></i>  
                                <p class="item-1">
                                    Regulamento Interno DME
                                  </p>
                                </a>
                        </li>
                    
            </li>
          </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>   