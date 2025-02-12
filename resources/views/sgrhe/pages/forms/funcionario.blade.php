<!--Layout Principal-->
@extends('layouts.app')
  @section('titulo' , isset($funcionario) ? 'Editar Funcionário' : 'Cadastrar Funcionário' )
        @section('header')
        <!--Style Local-->
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
                    <h1>{{ isset($funcionario)?'Editar Funcionário':'Cadastrar dados do Funcionário'}}</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">{{isset($funcionario)?'Editar Funcionário':'Cadastrar dados do Funcionário'}}</li>
                    </ol>
                  </div>
                </div>
              </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-8 offset-md-2">
                    <!-- jquery validation -->
                    <!-- Passo 1 - Pesquisa por Numero de Bilhete de identidade -->
              @if(!isset($funcionario))
              <form action="{{ route('funcionarios.verificarPessoa') }}" method="get">
                  @csrf
                  <div class="form-group">
                      <label for="numeroBI">Insira o Numero do Bilhete de Identidade:</label>
                      <input type="text" name="numeroBI" id="numeroBI" class="form-control" placeholder="Digite o numero do Bilhete da Pessoa que Necessita Cadastrar" maxlength="14"  required>
                  </div>
                  <button class="btn btn-primary w-100" type="submit">Verificar Numero de BI</button>
              </form>
              <br>
              @endif
                  @if(isset($pessoa) || isset($funcionario))
                  <!-- Campos Mostrados pos Verificacao de Pessoa no Banco de Dados  -->
                  <form action="{{ isset($funcionario) ? route('funcionarios.update',['id' => $funcionario->id]) : route('funcionarios.store') }}" method="post">
                  @csrf
                  @method('post')
                  <div class="card card-primary">
                                <div class="card-header">
                                  <h3 class="card-title">{{isset($funcionario)?'Editar Funcionário':'Cadastrar Funcionário'}}</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                  <form id="quickForm">
                                    <div class="form-group">
                                          <input type="hidden" name="idPessoa"  value="{{ old('nomeCompleto',$pessoa->id ?? '') }}" readonly>
                                    </div>
                                    <div class="form-group">
                                          <label for="nomeCompleto">Nome Completo:</label>
                                          <input type="text" name="nomeCompleto" id="nomeCompleto" class="form-control" value="{{ old('nomeCompleto',$pessoa->nomeCompleto ?? 'nomeCompleto') }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="numeroBI">Numero BI:</label>
                                        <input type="text" name="numeroBI" id="numeroBI" class="form-control" value="{{ old('numeroBI',$pessoa->numeroBI ?? 'numeroBI') }}" required readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="biValidade"> Validade do Bilhete de Identidade "BI"</label>
                                      <input type="date" name="biValidade" class="form-control" id="biValidade" value="{{ old('validadeBI',$pessoa->validadeBI ?? 'validadeBI') }}" required readonly>
                                    </div>
                                    <div class="form-group">
                                      <a class="btn btn-secondary" href="{{ route('pessoas.form', ['id' => $pessoa->id]) }}">Mais Configurações</a>
                                    </div>
                                    <div class="form-group" style="display: none;">
                                      <label for="idPessoa">ID Pessoa</label>
                                      <input type="text" name="idPessoa" class="form-control" id="idPessoa"  value="{{ old('idPessoa',$funcionario->idPessoa ?? $pessoa->id) }}" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="dataAdimissao">Data de Admissão</label>
                                      <input type="date" name="dataAdmissao" class="form-control" id="dataAdmissao" value="{{ old('dataAdmissao',$funcionario->dataAdmissao ?? 'dataAdamissao')  }}" required>
                                    </div>

                                    <div class="form-group">
                                      <label for="numeroAgente">Número de Agente</label>
                                      <input type="text" name="numeroAgente" class="form-control" id="numeroAgente" placeholder="Insira o número de Agente" value="{{ old('numeroAgente',$funcionario->numeroAgente ?? '')  }}" maxlength="12" required>
                                    </div>

                                    <hr>
                                    <!--Consultas para preencher o combobox do banco de dados de forma automatica para a tabela Categoria Funcionario-->
                                      <div class="form-group">
                                        <label for="idCategoriaFuncionario">Categoria Funcionário</label>
                                          <select name="idCategoriaFuncionario" class="form-control select2" required>
                                            <option selected="selected" value="{{ isset($opcoesCategoriaFuncionario) ? $opcoesCategoriaFuncionario->id : '' }}">{{ isset($opcoesCategoriaFuncionario) ? $opcoesCategoriaFuncionario->categoria.' do '.$opcoesCategoriaFuncionario->grau : 'Escolha uma Categoria de Funcionário' }}</option>
                                            @php
                                              $opcoesCategoriaFuncionario = App\Models\CategoriaFuncionario::where( 'id', '!=', 1 )->orderBy('categoria', 'asc')->get();
                                            @endphp
                                            @foreach ($opcoesCategoriaFuncionario as $CategoriaFuncionario)
                                            <option value="{{ old('id',$CategoriaFuncionario->id ?? 'id') }}">{{ old('categoria',$CategoriaFuncionario->categoria.' do '.$CategoriaFuncionario->grau ?? 'categoria') }}</option>
                                            @endforeach 
                                          </select>
                                      </div>
                                  <!--Consultas para preencher o combobox do banco de dados de forma automatica para a tabela cargo-->
                          
								 
									<div class="form-group">
								   		<!-- Opcoes de Cargo //23121997  -->
										<label for="seccaoSelect">Selecione a Secção:</label>
										<select name="idSeccao" class="form-control" id="seccaoSelect" onchange="fetchFuncionarios()" required>
                                            <option selected="selected" value="{{ isset($opcoesSeccaos) ? $opcoesSeccaos->id : '' }}">{{ isset($opcoesSeccaos) ? $opcoesSeccaos->designacao : 'Seleccione uma Secção' }}</option>
                                            @php
                                              $opcoesSeccaos = App\Models\Seccao::where('id', '!=', 1)->get();
                                            @endphp
                                            @foreach ($opcoesSeccaos as $seccao)
                                            <option value="{{ old('id',$seccao->id ?? 'id') }}">{{ old('designacao',$seccao->designacao ?? $seccao->designacao) }}</option>
                                            @endforeach 
                                         </select>
									</div>
										
									<div class="form-group">
										<!-- Opcoes de Cargo //23121997  -->
										<label for="cargo">Cargo:</label>
										<select class="form-control" name="idCargo" id="cargoSelect" required>
										 <option  value="{{ isset($opcoesCargo) ? $opcoesCargo->id : '' }}">{{ isset($opcoesCargo) ? $opcoesCargo->designacao : 'Selecione a Secção primeiro' }}</option>
										</select>
									</div>

                                    <!--Consultas para preencher o combobox do banco de dados de forma automatica para a tabela Unidade Organica-->
                                  <div class="form-group">
                                        <label for="idUnidadeOrganica">Unidade Orgânica</label>
                                          <select name="idUnidadeOrganica" class="form-control select2" required>
                                            <option selected="selected" value="{{ isset($opcoesUnidadeOrganica) ? $opcoesUnidadeOrganica->id : '' }}" >{{ isset($opcoesUnidadeOrganica) ? $opcoesUnidadeOrganica->designacao : 'Escolha uma Unidade Orgânica' }}</option>
                                            @php
                                              $opcoesUnidadeOrganicas = App\Models\UnidadeOrganica::where( 'id', '!=', 1 )->get();
                                            @endphp
                                            @foreach ($opcoesUnidadeOrganicas as $UnidadeOrganica)
                                            <option value="{{ old('id',$UnidadeOrganica->id ?? 'id') }}">{{ old('designacao',$UnidadeOrganica->designacao ?? 'designacao') }}</option>
                                            @endforeach 
                                          </select>
                                  </div>

                                  <div class="form-group">
                                      <label for="iban">Coodenadas Bancarias (IBAN)</label>
                                      <br>
                                      <span class="text-danger"> OBS: Não incluir o indicativo (AO06) </span>
                                      <input type="text" name="iban" class="form-control" id="iban" value="{{ old('iban',$funcionario->iban ?? '') }}" maxlength="26" placeholder="0000.0000.0000.0000.0000.0" oninput="this.value = this.value.replace(/[^0-9]/g,'')">
                                  </div>

                                  <div class="form-group d-none">
                                      <label for="email">Email address</label>
                                      <input type="email" name="email" class="form-control" id="email" value="{{ old('email',$funcionario->email ?? '') }}" placeholder="Introduza um email">
                                  </div>
                                  <div class="form-group">
                                      <label for="tel">Telefone</label>
                                      <input type="text" name="numeroTelefone" class="form-control" id="tel" value="{{ old('numeroTelefone',$funcionario->numeroTelefone ?? '') }}" maxlength="14" placeholder="+244 92 000 000" >
                                  </div>
                                  <br>
                                  <div class="form-group mb-0">
                                      <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1" required>
                                        <label class="custom-control-label" for="exampleCheck1">Concordar em Submeter os dados do Funcionario nos termos do <a href="{{ route('regulamento') }}"> Regulamento Interno da Direção Municipal da Educação do Púri</a>.</label>
                                      </div>
                                  </div>
                                  <br>
                                  <button type="submit" class="btn btn-primary" style="width: 100%;">{{isset($funcionario) ? 'Actualizar':'Cadastrar'}}</button> 
                                  </form>
                                </div>
                                <div class="card-footer">
                                  <form action="{{ route('funcionarios') }}" class="text-center small-box-footer">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="titulo" value="Funcionários ">
                                        <input type="hidden" name="estado" value="Todo">
                                        <input type="submit" class="btn btn-primary w-100 p-10" value="Funcionários ">
                                  </form>
                                </div>
                              
                             
                                
                    </div>
                  </form>
                  @endif

                    
                    <!-- /.card -->
                    </div>
                  <!--/.col (left) -->
                  <!-- right column -->
                  <div class="col-md-6">

                  </div>
                  <!--/.col (right) -->
                </div>
                <!-- /.row -->
              </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->
		</div>
        @endsection
        @section('scripts')

        <script>
          //Validaar Estrutura do telefone
          function validarTelefone() {
            // Obter o valor do número de telefone
            var telefone = document.getElementById('numeroTelefone').value;
            
            // Definir a expressão regular para validar o número de telefone
            var regexTelefone = /^\+244[0-9]{9}$/;
            
            // Verificar se o número de telefone corresponde à expressão regular
            if (!regexTelefone.test(telefone)) {
              // Mostrar uma mensagem de erro (ou tomar outra ação)
              alert('Por favor, insira um número de telefone válido começando com +244 e seguido por 9 dígitos');
              // Impedir o envio do formulário
              return false;
            }
            
            // Permitir o envio do formulário se o número de telefone for válido
            return true;
          }
        </script>
        <script>
          var meuInput = document.getElementById('iban');

          // Adicionar um ouvinte de evento de entrada ao input
          meuInput.addEventListener('input', function() {
            // Obter o valor atual do input
            var valor = this.value;
            
            // Remover todos os espaços em branco do valor (caso existam)
            valor = valor.replace(/\s/g, '');
            
            // Adicionar um espaço a cada 4 caracteres
            var valorFormatado = valor.replace(/(\d{4})/g, '$1 ').trim();
            
            // Atualizar o valor do input com o valor formatado
            this.value = valorFormatado;
          });
        </script>




   <script>
        function fetchFuncionarios() {
            const idSeccaoSelecionada = document.getElementById('seccaoSelect').value;
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/cargos/${idSeccaoSelecionada}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                }
            })
            .then(response => response.json())
            .then(data => {
                 cargoSelect.innerHTML = '<option value="">Selecione o Cargo</option>';
                data.forEach(cargo => {
                    cargoSelect.innerHTML += `<option value="${cargo.id}">${cargo.designacao}</option>`;
                });
                cargoSelect.disabled = false;
            })
            .catch(error => console.error('Erro:', error));
        }
    </script>

        @endsection
