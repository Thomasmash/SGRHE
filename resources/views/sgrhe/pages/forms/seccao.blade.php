<!--Layout Principal-->
@extends('layouts.app')
  @section('titulo' , 'Cadastrar Cargos')
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
                  <h1>Cadastrar Secção ou Departamento</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">{{isset($seccao)?'Editar Secção ou Departamento':'Cadastrar Secção ou Departamento'}}</li>
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
                  <div class="card card-primary">
                      <div class="card-header">
                          <h3 class="card-title"> {{isset($seccao)?'Editar Secção ou Departamento':'Cadastrar Secção ou Departamento'}}</h3>  
                      </div>
                      <!--Verifcar a Existencia da Variavel Cargo para determinar se Editar ou Criar um novo Registro-->
                      <form action="{{ isset($cargo) ? route('cargos.update',['id' => $cargo->id]) : route('cargos.store') }}" method="post">
                        @csrf
                        @method('post')
                          <div class="card-body">
                            <label>Dados Da Secção </label>
                        
                                <div class="form-group">
								  <label for="designacao">Designação da Secção:</label>
								  <input type="text" name="descrisao" class="form-control" id="descrisao" placeholder="Descricao do Cargo" value="{{isset($cargo) ? $cargo->descrisao : ''}}" required>
								</div>
                               
                       



                        
                            
								<div class="form-group">
								  <label for="descricao">Descrição da Secção</label>
								  <input type="text" name="descricao" class="form-control" id="descrisao" placeholder="Descricao do Cargo" value="{{isset($cargo) ? $cargo->descrisao : ''}}">
								</div>
					
								<div class="card-footer">
									<button type="submit" class="btn btn-primary" style="width: 100%;">{{ isset($seccao)? 'Actualizar Secção' : 'Criar Secção' }}</button>
									<br>
									<br>
									<a href="{{route('cargos.index')}}" class="btn btn-primary" style="width: 100%;"> Cargos / Index  </a>
								</div>
                          </div>
                      </form>
                    </div>
                  </div>
              </div>
            </div>
          </section>
        </div> 
       <!-- /.content-wrapper -->
	   </div>
  @endsection
    @section('scripts')
      <script>
        function carregarpermissoess() {
            const designacao = document.getElementById("designacao").value;
            const permissoesSelect = document.getElementById("permissoes");

            // Limpe os municípios anteriores
            permissoesSelect.innerHTML = "<option value=''>Carregando...</option>";

            // Simule uma solicitação AJAX para obter municípios com base na província selecionada
            setTimeout(() => {
                permissoesSelect.innerHTML = "<option value=''>Selecione um nível de acesso</option>";
                switch (designacao) {
                    case "Profesor":
                        permissoesSelect.innerHTML += "<option value='1'>Nivel 1</option>";
                        break;
					case "Operário Qualificado":
                        permissoesSelect.innerHTML += "<option value='1'>Nivel 1</option>";
                        break;
					case "Auxiliar de Limpeza":
                        permissoesSelect.innerHTML += "<option value='1'>Nivel 1</option>";
                        break;
					case "Profesor Auxiliar":
                        permissoesSelect.innerHTML += "<option value='1'>Nivel 1</option>";
                        break;
                    case "Tecnico / Escola":
                        permissoesSelect.innerHTML += "<option value='2'>Nivel 2</option>";
                        permissoesSelect.innerHTML += "<option value='3'>Nivel 3</option>";
                       
                        break;
                    case "Director da Escola":
                        permissoesSelect.innerHTML += "<option value='1'>Nivel 1</option>";
                        permissoesSelect.innerHTML += "<option value='2'>Nivel 2</option>";
                        permissoesSelect.innerHTML += "<option value='3'>Nivel 3</option>";
                        break;
					case "SuDirector Administractivo":
                        permissoesSelect.innerHTML += "<option value='1'>Nivel 1</option>";
                        permissoesSelect.innerHTML += "<option value='2'>Nivel 2</option>";
                        permissoesSelect.innerHTML += "<option value='3'>Nivel 3</option>";
                        break;
					case "SubDirector Pedagogico":
                        permissoesSelect.innerHTML += "<option value='1'>Nivel 1</option>";
                        permissoesSelect.innerHTML += "<option value='2'>Nivel 2</option>";
                        permissoesSelect.innerHTML += "<option value='3'>Nivel 3</option>";
                        break;
                    case "Técnico / Direção Municipal":
                        permissoesSelect.innerHTML += "<option value='1'>Nivel 1</option>";
                        permissoesSelect.innerHTML += "<option value='2'>Nivel 2</option>";
                        permissoesSelect.innerHTML += "<option value='3'>Nivel 3</option>";
                        permissoesSelect.innerHTML += "<option value='4'>Nivel 4</option>";
                        break;
                    case "Chefe de Secção":
                        permissoesSelect.innerHTML += "<option value='1'>Nivel 1</option>";
                        permissoesSelect.innerHTML += "<option value='2'>Nivel 2</option>";
                        permissoesSelect.innerHTML += "<option value='3'>Nivel 3</option>";
                        permissoesSelect.innerHTML += "<option value='4'>Nivel 4</option>";
                        permissoesSelect.innerHTML += "<option value='5'>Nivel 5</option>";
                        break;
                    case "Director Municipal":
                        permissoesSelect.innerHTML += "<option value='1'>Nivel 1</option>";
                        permissoesSelect.innerHTML += "<option value='2'>Nivel 2</option>";
                        permissoesSelect.innerHTML += "<option value='3'>Nivel 3</option>";
                        permissoesSelect.innerHTML += "<option value='4'>Nivel 4</option>";
                        permissoesSelect.innerHTML += "<option value='5'>Nivel 5</option>";
                        permissoesSelect.innerHTML += "<option value='6'>Nivel 6</option>";
                        break;
                    // Adicione mais casos para outras províncias aqui
                    default:
                        permissoesSelect.innerHTML += "<option value=''>Nenhum Nivel de Permissão Disponivel</option>";
                }
            }, 1000); // Simulando um atraso de 1 segundo para uma solicitação AJAX
        }
      </script>
    @endsection
