@php
  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
  $permissoes = $cargoLogado->permissoes;
@endphp
<!--Layout Principal-->
@extends('layouts.app')
  @section('titulo' , isset($pessoa) ? 'Editar Pessoa' : 'Cadastrar Pessoa' )
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
                    <h3 class="title">Cadastrar Funcionario</h3>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">{{isset($pessoa)?'Editar Pessoa':'Cadastrar Funcionário'}}</li>
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
                              <h3 class="card-title"> {{isset($pessoa)?'Editar Pessoa':'Dados Pessoais'}}</h3>  
                        </div>
                        <div class="card-body">
                           <!-- form-->
                            <form id="quickForm" action="{{ isset($pessoa) ? route('pessoas.update',['id' => $pessoa->id]) : route('pessoas.store') }}" method="post">
                              @csrf
                              @method('post')
                          
                              <label>Identificação</label>
                              <div class="form-group">
                                <label for="nomeCompleto"><span class="text-danger">*</span>Nome Completo</label>
                                <input type="text" name="nomeCompleto" class="form-control" id="nomeCompleto" placeholder="Nome Completo" maxlength="250" required value="{{ isset($pessoa) ? $pessoa->nomeCompleto : ''}}">
                                <label for="dataNascimento"><span class="text-danger">*</span>Data de Nascimento</label>
                                <input type="date" name="dataNascimento" class="form-control" id="dataNascimento"  required value="{{ isset($pessoa) ? $pessoa->dataNascimento : ''}}" >
                              </div>
                              <div class="form-group">
                                <label for="numeroBI"> <span class="text-danger">*</span> Bilhete de Identidade "BI"</label>
                                <input type="text" name="numeroBI" class="form-control" id="numeroBI" maxlength="14" placeholder="002223421AE042" required value="{{ isset($pessoa) ? $pessoa->numeroBI : ''}}">
                                <label for="validadeBI"><span class="text-danger">*</span> Validade do Bilhete de Identidade "BI"</label>
                                <input type="date" name="validadeBI" class="form-control" id="validadeBI" placeholder="12-12-2000" required value="{{ isset($pessoa) ? $pessoa->validadeBI : ''}}">
                              </div>
                              <label>Naturalidade</label>
                              <div  class="form-group">
                              <label for="provincia"><span class="text-danger">*</span>Escolha uma Província:</label>
                                  <select name="provincia" id="provincia" onchange="carregarMunicipios()" class="form-control select2" style="width: 100%;" required>
                                      <option value="{{isset($naturalidade) ? $naturalidade->provincia : ''}}">{{isset($naturalidade) ? $naturalidade->provincia : 'Seleccione Uma Província'}}</option>
                                          <option value="Bengo">Bengo</option>
										  <option value="Benguela">Benguela</option>
										  <option value="Bié">Bié</option>
										  <option value="Cabinda">Cabinda</option>
										  <option value="Cuando">Cuando</option>
										  <option value="Cubango">Cubango</option>
										  <option value="Cuanza Norte">Cuanza Norte</option>
										  <option value="Cuanza Sul">Cuanza Sul</option>
										  <option value="Cunene">Cunene</option>
										  <option value="Huambo">Huambo</option>
										  <option value="Huíla">Huíla</option>
										  <option value="Icolo e Bengo">Icolo e Bengo</option>
										  <option value="Luanda">Luanda</option>
										  <option value="Lunda Norte">Lunda Norte</option>
										  <option value="Lunda Sul">Lunda Sul</option>
										  <option value="Malanje">Malanje</option>
										  <option value="Moxico">Moxico</option>
										  <option value="Moxico Leste">Moxico Leste</option>
										  <option value="Namibe">Namibe</option>
										  <option value="Uíge">Uíge</option>
										  <option value="Zaire">Zaire</option>
                                  
                                      <!-- Adicione mais opções de província aqui -->
                              
                                    </select>
                                  <label for="municipio"><span class="text-danger">*</span>Escolha um Município:</label>
                                  <select id="municipio" name="municipio" class="form-control select2" style="width: 100%;" required>
                                      <option value="{{isset($naturalidade) ? $naturalidade->municipio : ''}}">{{isset($naturalidade) ? $naturalidade->municipio : 'Seleccione o Município'}}</option>
                                  </select>
                              </div>


                              <div class="form-group">
                                <label for="genero"><span class="text-danger">*</span>Genero</label>
                                  <select name="genero" class="form-control select2" style="width: 100%;" required>
                                      <option selected="{{isset($pessoa) ? $pessoa->genero : ''}}">{{isset($pessoa) ? $pessoa->genero : 'Seleccione o Genero'}}</option>
                                      <option>Feminino</option>
                                      <option>Maculino</option>
                                  </select>
                              </div>
                          
                              <label>Parentesco:</label>
                              <div class="form-group">
                                <label for="nomePai"><span class="text-danger">*</span>Nome do Pai</label>
                                <input type="text" name="nomePai" class="form-control" id="nomePai" maxlength="250" placeholder="Nome Completo do Pai" value="{{ isset($parente) ? $parente->nomePai : ''}}" required>
                                <label for="nomeMae"><span class="text-danger">*</span>Nome da Mãe</label>
                                <input type="text" name="nomeMae" class="form-control" id="nomeMae" maxlength="250" placeholder="Nome Completo do Mãe" value="{{ isset($parente) ? $parente->nomeMae : ''}}" required>
                              </div>
                              <div class="form-group">
                                <label for="grupoSanguineo">Grupo Sanguineo</label>
                                  <select name="grupoSanguineo" class="form-control select2" style="width: 100%;">
                                      <option value="{{isset($pessoa) ? $pessoa->grupoSanguineo : ''}}"> {{ isset($pessoa) ? $pessoa->grupoSanguineo : 'Seleccione o Grupo Sanguíneo' }} </option>
                                      <option >A+</option>
                                      <option >A-</option>
                                      <option >B+</option>
                                      <option >B-</option>
                                      <option >AB+</option>
                                      <option >AB-</option>
                                      <option >O+</option>
                                      <option >O-</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                <label for="estadoCivil"><span class="text-danger">*</span>Estado Civil</label>
                                  <select name="estadoCivil" class="form-control select2" style="width: 100%;" Required>
                                      <option value="{{isset($pessoa) ? $pessoa->estadoCivil : ''}}">{{isset($pessoa) ? $pessoa->estadoCivil : 'Seleccione o Estado Cívil'}}</option>
                                      <option>Casados(a)</option>
                                      <option>Solteiro(a)</option>
                                  </select>
                              </div>
                              <div  class="form-group {{ isset($pessoa) ? 'd-none' : '' }}">
                              <label>Endereço</label>
                              <br>
                              <label for="provinciaEndereco">Escolha uma Província:</label>
                                  <select name="provinciaEndereco" id="provinciaEndereco" onchange="carregarMunicipiosEndereco()" class="form-control select2" style="width: 100%;" >
                                      <option value="{{isset($naturalidade) ? $naturalidade->provincia : ''}}">{{isset($naturalidade) ? $naturalidade->provincia : 'Seleccione Uma Província'}}</option>
                                      <option value="Bengo">Bengo</option>
                                      <option value="Benguela">Benguela</option>
                                      <option value="Bié">Bié</option>
                                      <option value="Cabinda">Cabinda</option>
                                      <option value="Cuando">Cuando</option>
                                      <option value="Cubango">Cubango</option>
									  <option value="Cuanza Norte">Cuanza Norte</option>
                                      <option value="Cuanza Sul">Cuanza Sul</option>
                                      <option value="Cunene">Cunene</option>
                                      <option value="Huambo">Huambo</option>
                                      <option value="Huíla">Huíla</option>
									  <option value="Icolo e Bengo">Icolo e Bengo</option>
                                      <option value="Luanda">Luanda</option>
                                      <option value="Lunda Norte">Lunda Norte</option>
                                      <option value="Lunda Sul">Lunda Sul</option>
                                      <option value="Malanje">Malanje</option>
                                      <option value="Moxico">Moxico</option>
									  <option value="Moxico Leste">Moxico Leste</option>
                                      <option value="Namibe">Namibe</option>
                                      <option value="Uíge">Uíge</option>
                                      <option value="Zaire">Zaire</option>
                                  
                                      <!-- Adicione mais opções de província aqui -->
                              
                                    </select>
                                  <label for="municipioEndereco">Escolha um Município:</label>
                                  <select id="municipioEndereco" name="municipioEndereco" class="form-control select2" style="width: 100%;" >
                                      <option value="{{isset($naturalidade) ? $naturalidade->municipio : ''}}">{{isset($naturalidade) ? $naturalidade->municipio : 'Seleccione o Município'}}</option>
                                  </select>
                                  <label for="bairro">Bairro</label>
                                  <input type="text" name="bairro" class="form-control"  placeholder="Bairro Popular nº 2" maxlength="250"  value="{{ isset($pessoa) ? $pessoa->nomeCompleto : ''}}">
                                  <label for="zona">Zona</label>
                                  <input type="text" name="zona" class="form-control"  placeholder="Bairro Popular nº 2" maxlength="250"  value="{{ isset($pessoa) ? $pessoa->nomeCompleto : ''}}">
                                  <label for="quarteirao">Quarteirão</label>
                                  <input type="text" name="quarteirao" class="form-control"  placeholder="Quarteirão nº 2" maxlength="250"  value="{{ isset($pessoa) ? $pessoa->nomeCompleto : ''}}">
                                  <label for="rua">Rua</label>
                                  <input type="text" name="rua" class="form-control"  placeholder="Rua F " maxlength="100"  value="{{ isset($pessoa) ? $pessoa->nomeCompleto : ''}}">
                                  <label for="casa">Casa</label>
                                  <input type="text" name="casa" class="form-control"  placeholder="30" maxlength="10"  value="{{ isset($pessoa) ? $pessoa->nomeCompleto : ''}}">
                              </div>
                              <div  class="form-group {{ isset($pessoa) ? 'd-none' : '' }}">
                                
                                <input type="radio" name="cadastrar" value="cadastrarPessoa" class="" require checked>
                                <label for="cadastrar">Cadastrar mais Pessoas</label>
                                <br>
                                <input type="radio" name="cadastrar" value="cadastrarFunionario" class="" require>
                                <label for="cadastrarFunionario">Prosseguir para os dados de Funcionário </label>
                               
                              </div>
                              <button type="submit" class="btn btn-primary" style="width: 100%;">{{ isset($pessoa) ? 'Actualizar ' : 'Cadastrar'}}</button>
                            </form>
                            <!-- /form-->
                        </div>
                        <div class="card-footer">
                          <a href="{{route('pessoas.index')}}" class="btn btn-primary" style="width: 100%;">Dados Pessoais / Index</a>
                        </div>
                    </div>
                    <!-- /.card -->
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
      <!--Sscripts para Popular o SelectOption das Procincias de Forma Dinamica-->
          <script>
              function carregarMunicipios() {
                  const provincia = document.getElementById("provincia").value;
                  const municipioSelect = document.getElementById("municipio");

                  // Limpe os municípios anteriores
                  municipioSelect.innerHTML = "<option value=''>Carregando...</option>";

                  // Simule uma solicitação AJAX para obter municípios com base na província selecionada
                  setTimeout(() => {
                      municipioSelect.innerHTML = "<option value=''>Selecione um município</option>";
                      switch (provincia) {
                          case "Bengo":
                              municipioSelect.innerHTML += "<option value='Ambriz'>Ambriz </option>";
							  municipioSelect.innerHTML += "<option value='Barra do Dande'>Barra do Dande </option>";
                              municipioSelect.innerHTML += "<option value='Bula Atumba'>Bula Atumba </option>";
                              municipioSelect.innerHTML += "<option value='Dande'>Dande </option>";
							  municipioSelect.innerHTML += "<option value='Muxaluando'>Muxaluando </option>";
                              municipioSelect.innerHTML += "<option value='Nambuangongo'>Nambuangongo </option>";
                              municipioSelect.innerHTML += "<option value='Quibaxe'>Quibaxe </option>";
							  municipioSelect.innerHTML += "<option value='Quicunzo'>Quicunzo </option>";
							  municipioSelect.innerHTML += "<option value='Panguila'>Panguila </option>";
							  municipioSelect.innerHTML += "<option value='Pango Aluquém'>Pango Aluquém </option>";
							  municipioSelect.innerHTML += "<option value='Piri'>Piri </option>";
							  municipioSelect.innerHTML += "<option value='Úcua'>Úcua </option>";
							  
                              break;
                          case "Benguela": 
                              municipioSelect.innerHTML += "<option value='Baia Farta'>Baia Farta </option>";
                              municipioSelect.innerHTML += "<option value='Balombo'>Balombo </option>";
							  municipioSelect.innerHTML += "<option value='Babaera'>Babaera </option>";
                              municipioSelect.innerHTML += "<option value='Benguela'>Benguela </option>";
							  municipioSelect.innerHTML += "<option value='Biópio'>Biópio </option>";
							  municipioSelect.innerHTML += "<option value='Bolonguera'>Bolonguera </option>";
                              municipioSelect.innerHTML += "<option value='Bocoio'>Bocoio </option>"; 
                              municipioSelect.innerHTML += "<option value='Caimbambo'>Caimbambo </option>";
							  municipioSelect.innerHTML += "<option value='Capupa'>Capupa </option>";
							  municipioSelect.innerHTML += "<option value='Catumbela'>Catumbela </option>";
							  municipioSelect.innerHTML += "<option value='Catengue'>Catengue </option>";
                              municipioSelect.innerHTML += "<option value='Chongoroi'>Chongoroi </option>";
							  municipioSelect.innerHTML += "<option value='Canhamela'>Canhamela </option>";
							  municipioSelect.innerHTML += "<option value='Chila'>Chila </option>";
							  municipioSelect.innerHTML += "<option value='Chicuma'>Chicuma </option>";
							  municipioSelect.innerHTML += "<option value='Chindumbo'>Chindumbo </option>";
                              municipioSelect.innerHTML += "<option value='Cubal'>Cubal </option>";
							  municipioSelect.innerHTML += "<option value='Dombe Grande'>Dombe Grande </option>";
							  municipioSelect.innerHTML += "<option value='Egito Praia'>Egito Praia </option>";
							  municipioSelect.innerHTML += "<option value='Iambala'>Iambala </option>";
                              municipioSelect.innerHTML += "<option value='Ganda'>Ganda </option>";
                              municipioSelect.innerHTML += "<option value='Lobito'>Lobito </option>";
							  municipioSelect.innerHTML += "<option value='Navegantes'>Navegantes </option>";

                              break;
                          case "Bié":
                              municipioSelect.innerHTML += "<option value='Andulo'> Andulo </option>";
							  municipioSelect.innerHTML += "<option value='Belo Horizonte'> Belo Horizonte </option>";
							  municipioSelect.innerHTML += "<option value='Calucinga'>Calucinga</option>";
                              municipioSelect.innerHTML += "<option value='Camacupa'> Camacupa </option>";
							  municipioSelect.innerHTML += "<option value='Cambândua'> Cambândua </option>";
                              municipioSelect.innerHTML += "<option value='Catabola'> Catabola </option>";
							  municipioSelect.innerHTML += "<option value='Chicala'>Chicala</option>";
                              municipioSelect.innerHTML += "<option value='Chinguar'> Chinguar </option>";
							  municipioSelect.innerHTML += "<option value='Chipeta'> Chipeta </option>";
                              municipioSelect.innerHTML += "<option value='Chitembo'> Chitembo </option>";
							  municipioSelect.innerHTML += "<option value='Cuemba'> Cuemba </option>";
                              municipioSelect.innerHTML += "<option value='Cunhinga'> Cunhinga </option>";
                              municipioSelect.innerHTML += "<option value='Cuito'> Cuito </option>";
							  municipioSelect.innerHTML += "<option value='Luando'>Luando</option>";
							  municipioSelect.innerHTML += "<option value='Lúbia'> Lúbia </option>";
                              municipioSelect.innerHTML += "<option value='Nhârea'> Nhârea </option>";
							  municipioSelect.innerHTML += "<option value='Mumbué'>Mumbué</option>";
							  municipioSelect.innerHTML += "<option value='Ringoma'>Ringoma</option>";
							  municipioSelect.innerHTML += "<option value='Umpulo'> Umpulo </option>";
                            
                              break;
                          case "Cabinda":
                              municipioSelect.innerHTML += "<option value='Belize'>Belize </option>";
                              municipioSelect.innerHTML += "<option value='Buco Zau'>Buco Zau </option>";
                              municipioSelect.innerHTML += "<option value='Cabinda'>Cabinda </option>";
                              municipioSelect.innerHTML += "<option value='Cangongo'>Cangongo </option>";
							  municipioSelect.innerHTML += "<option value='Liambo'>Liambo </option>";
                              municipioSelect.innerHTML += "<option value='Massabi'>Massabi </option>";
                              municipioSelect.innerHTML += "<option value='Necuto'>Necuto </option>";
							  municipioSelect.innerHTML += "<option value='Ngoio'>Ngoio </option>";
							  municipioSelect.innerHTML += "<option value='Miconje'>Miconje </option>";
							  municipioSelect.innerHTML += "<option value='Tando Zinze'>Tando Zinze </option>";
							  
                              break;
                          case "Cuando":
                              municipioSelect.innerHTML += "<option value='Cuito'>Cuito Cuanavale</option>";
							  municipioSelect.innerHTML += "<option value='Dima'> Dima </option>";
                              municipioSelect.innerHTML += "<option value='Dirico'>Dirico </option>";
							  municipioSelect.innerHTML += "<option value='Luengue'> Luengue </option>";
							  municipioSelect.innerHTML += "<option value='Luiana'> Luiana </option>";
                              municipioSelect.innerHTML += "<option value='Mavinga'>Mavinga </option>";
							  municipioSelect.innerHTML += "<option value='Mucusso'> Mucusso </option>";
                              municipioSelect.innerHTML += "<option value='Rivungo'>Rivungo </option>";
							  municipioSelect.innerHTML += "<option value='Xipundo'> Xipundo </option>";
                            
                              break;
					    case "Cubango":
                              municipioSelect.innerHTML += "<option value='Calai'>Calai </option>";
							  municipioSelect.innerHTML += "<option value='Caiundo'> Caiundo </option>";
							  municipioSelect.innerHTML += "<option value='Chinguanja'> Chinguanja </option>";
                              municipioSelect.innerHTML += "<option value='Cuangar'>Cuangar </option>";
                              municipioSelect.innerHTML += "<option value='Cuchi'>Cuchi </option>";
							  municipioSelect.innerHTML += "<option value='Cutato'> Cutato </option>";
                              municipioSelect.innerHTML += "<option value='Longa'>Longa </option>";
                              municipioSelect.innerHTML += "<option value='Menongue'>Menongue </option>";
                              municipioSelect.innerHTML += "<option value='Mavengue'>Mavengue </option>";
                              municipioSelect.innerHTML += "<option value='Nancova'>Nancova </option>";
							  municipioSelect.innerHTML += "<option value='Savate'> Savate </option>";
                            
                              break;
                          case "Cuanza Norte":
						      municipioSelect.innerHTML += "<option value='Aldeia Nova'> Aldeia Nova </option>";
                              municipioSelect.innerHTML += "<option value='Ambaca'> Ambaca </option>";
                              municipioSelect.innerHTML += "<option value='Banga'> Banga </option>";
                              municipioSelect.innerHTML += "<option value='Bolongongo'> Bolongongo </option>";
                              municipioSelect.innerHTML += "<option value='Cambambe'> Cambambe </option>";
							  municipioSelect.innerHTML += "<option value='Cazengo'> Cazengo </option>";
							  municipioSelect.innerHTML += "<option value='Cêrca'> Cêrca </option>";
							  municipioSelect.innerHTML += "<option value='Caculo Cabaça'> Caculo Cabaça </option>";
                              municipioSelect.innerHTML += "<option value='Golungo Alto'> Golungo Alto </option>";
                              municipioSelect.innerHTML += "<option value='Luinga'> Luinga </option>";
							  municipioSelect.innerHTML += "<option value='Massangano'> Massangano </option>";
                              municipioSelect.innerHTML += "<option value='Ngonguembo'> Ngonguembo </option>";
                              municipioSelect.innerHTML += "<option value='Quiculungo'> Quiculungo </option>";
                              municipioSelect.innerHTML += "<option value='Samba Cajú'> Samba Cajú </option>";
                              municipioSelect.innerHTML += "<option value='Santa Isabel'> Santa Isabel </option>";
							  municipioSelect.innerHTML += "<option value='Tango'> Tango </option>";
							  municipioSelect.innerHTML += "<option value='Terreiro'> Terreiro </option>";
                            
                              break;
                          case "Cuanza Sul":
							  municipioSelect.innerHTML += "<option value='Amboiva'> Amboiva </option>";
							  municipioSelect.innerHTML += "<option value='Boa Entrada'> Boa Entrada </option>";
							  municipioSelect.innerHTML += "<option value='Calulo'> Calulo </option>";
                              municipioSelect.innerHTML += "<option value='Cela'> Cela  </option>";
							  municipioSelect.innerHTML += "<option value='Cassongue'> Cassongue </option>";
                              municipioSelect.innerHTML += "<option value='Conda'> Conda  </option>";
							  municipioSelect.innerHTML += "<option value='Condé'> Condé </option>";
                              municipioSelect.innerHTML += "<option value='Ebo'> Ebo  </option>";
							  municipioSelect.innerHTML += "<option value='Gangula'> Gangula </option>";
							  municipioSelect.innerHTML += "<option value='Gungo'> Gungo </option>";
							  municipioSelect.innerHTML += "<option value='Lonhe'> Lonhe </option>";
							  municipioSelect.innerHTML += "<option value='Munenga'> Munenga </option>";
                              municipioSelect.innerHTML += "<option value='Mussende'> Mussende  </option>";
                              municipioSelect.innerHTML += "<option value='Porto Amboim'> Porto Amboim  </option>";
							  municipioSelect.innerHTML += "<option value='Quenha'> Quenha </option>";
                              municipioSelect.innerHTML += "<option value='Quibala'> Quibala  </option>";
                              municipioSelect.innerHTML += "<option value='Quilenda'> Quilenda  </option>";
							  municipioSelect.innerHTML += "<option value='Quirimbo'> Quirimbo </option>";
							  municipioSelect.innerHTML += "<option value='Quissongo'> Quissongo </option>";
							  municipioSelect.innerHTML += "<option value='Pambangala'> Pambangala </option>";
							  municipioSelect.innerHTML += "<option value='Poto Amboím'> Porto Amboím </option>";
							  municipioSelect.innerHTML += "<option value='Sanga'> Sanga </option>";
                              municipioSelect.innerHTML += "<option value='Seles'> Seles  </option>";
							  municipioSelect.innerHTML += "<option value='Waku Kungo'> Waku Kungo </option>";
                              break;
                          case "Cunene":
                              municipioSelect.innerHTML += "<option value='Cahama'> Cahama </option>";
							  municipioSelect.innerHTML += "<option value='Cafima'> Cafima </option>";
							  municipioSelect.innerHTML += "<option value='Chiéde'> Chiéde </option>";
							  municipioSelect.innerHTML += "<option value='Chissuata'> Chissuata </option>";
							  municipioSelect.innerHTML += "<option value='Chitato'> Chitato </option>";
                              municipioSelect.innerHTML += "<option value='Cuanhama'> Cuanhama </option>";
							  municipioSelect.innerHTML += "<option value='Curoca'> Curoca </option>";
							  municipioSelect.innerHTML += "<option value='Cuvelai'> Cuvelai </option>";
							  municipioSelect.innerHTML += "<option value='Humbe'> Humbe </option>";
							  municipioSelect.innerHTML += "<option value='Mupa'> Mupa </option>";
                              municipioSelect.innerHTML += "<option value='Namacunde'> Namacunde </option>";
							  municipioSelect.innerHTML += "<option value='Naulila'> Naulila </option>";
							  municipioSelect.innerHTML += "<option value='Nehone'> Nehone </option>";
                              municipioSelect.innerHTML += "<option value='Ombadja'> Ombadja </option>";
                        case "Icolo e Bengo":
							  municipioSelect.innerHTML += "<option value='Bom Jesus'> Bom Jesus </option>";
                              municipioSelect.innerHTML += "<option value='Catete'> Catete </option>";
							  municipioSelect.innerHTML += "<option value='Calumbo'> Calumbo </option>";
							  municipioSelect.innerHTML += "<option value='Cabiri'> Cabiri </option>";
							  municipioSelect.innerHTML += "<option value='Cabo Ledo'> Cabo Ledo </option>";
							  municipioSelect.innerHTML += "<option value='Quiçama'> Quiçama </option>";
							  municipioSelect.innerHTML += "<option value='Sequele'> Sequele </option>";
							  
							  
                              break;
						  case "Huambo":
						      municipioSelect.innerHTML += "<option value='Alto Hama'> Alto Hama </option>";
                              municipioSelect.innerHTML += "<option value='Bailundo'> Bailundo </option>";
							  municipioSelect.innerHTML += "<option value='Bimbe'> Bimbe </option>";
							  municipioSelect.innerHTML += "<option value='Caála'> Caála </option>";
							  municipioSelect.innerHTML += "<option value='Cachiungo'> Cachiungo </option>";
							  municipioSelect.innerHTML += "<option value='Chicala Choloanga'> Chicala Choloanga </option>";
							  municipioSelect.innerHTML += "<option value='Chilata'> Chilata </option>";
							  municipioSelect.innerHTML += "<option value='Chinjenje'> Chinjenje </option>";
							  municipioSelect.innerHTML += "<option value='Cuima'> Cuima </option>";
                              municipioSelect.innerHTML += "<option value='Ecunha'> Ecunha </option>";
							  municipioSelect.innerHTML += "<option value='Galanga'> Galanga </option>";
                              municipioSelect.innerHTML += "<option value='Huambo'> Huambo </option>";
                              municipioSelect.innerHTML += "<option value='Londuimbali'> Londuimbali </option>";
                              municipioSelect.innerHTML += "<option value='Longonjo'> Longonjo </option>";
                              municipioSelect.innerHTML += "<option value='Mungo'> Mungo </option>";
							  municipioSelect.innerHTML += "<option value='Sambo'> Sambo </option>";
                              municipioSelect.innerHTML += "<option value='Ucuma'> Ucuma </option>";
                              break;
                          case "Huíla":
                              municipioSelect.innerHTML += "<option value='Caconda'> Caconda </option>";
                              municipioSelect.innerHTML += "<option value='Cacula'> Cacula </option>";
                              municipioSelect.innerHTML += "<option value='Caluquembe'> Caluquembe </option>";
							  municipioSelect.innerHTML += "<option value='Capelongo'> Capelongo </option>";
							  municipioSelect.innerHTML += "<option value='Capunda Cavilongo'> Capunda Cavilongo </option>";
                              municipioSelect.innerHTML += "<option value='Chicomba'> Chicomba </option>";
                              municipioSelect.innerHTML += "<option value='Chibia'> Chibia </option>";
                              municipioSelect.innerHTML += "<option value='Chipindo'> Chipindo </option>";
							  municipioSelect.innerHTML += "<option value='Chituto'> Chituto </option>";
							  municipioSelect.innerHTML += "<option value='Chicungo'> Chicungo </option>";
							  municipioSelect.innerHTML += "<option value='Cuvango'> Cuvango </option>";
							  municipioSelect.innerHTML += "<option value='Dongo'> Dongo </option>";
							  municipioSelect.innerHTML += "<option value='Galangue'> Galangue </option>";
							  municipioSelect.innerHTML += "<option value='Gambos'> Gambos </option>";
							  municipioSelect.innerHTML += "<option value='Hoque'> Hoque </option>";
                              municipioSelect.innerHTML += "<option value='Humpata'> Humpata </option>";
							  municipioSelect.innerHTML += "<option value='Jamba Mineira'> Jamba Mineira </option>";
                              municipioSelect.innerHTML += "<option value='Lubango'> Lubango </option>";
							  municipioSelect.innerHTML += "<option value='Matala'> Matala </option>";
							  municipioSelect.innerHTML += "<option value='Palanca'> Palanca </option>";
                              municipioSelect.innerHTML += "<option value='Quilengues'> Quilengues </option>";
							  municipioSelect.innerHTML += "<option value='Quipungo'> Quipungo </option>";
							  municipioSelect.innerHTML += "<option value='Viti Vivali'> Viti Vivali </option>";
                              break;
                          case "Luanda":
                              municipioSelect.innerHTML += "<option value='Belas'> Belas </option>";
                              municipioSelect.innerHTML += "<option value='Cacuaco'> Cacuaco </option>";
							  municipioSelect.innerHTML += "<option value='Camama'> Camama </option>";
                              municipioSelect.innerHTML += "<option value='Cazenga'> Cazenga </option>";
							  municipioSelect.innerHTML += "<option value='Hoji ya Henda'> Hoji ya Henda </option>";
							  municipioSelect.innerHTML += "<option value='Ingombota'>Ingombota </option>";
							  municipioSelect.innerHTML += "<option value='Kilamba Kiaxi'>Kilamba Kiaxi </option>";
							  municipioSelect.innerHTML += "<option value='Kilamba'> Kilamba </option>";
							  municipioSelect.innerHTML += "<option value='Maianga'> Maianga </option>";
							  municipioSelect.innerHTML += "<option value='Mulevos'> Mulevos </option>";
							  municipioSelect.innerHTML += "<option value='Mussulo'>Mussulo </option>";
							  municipioSelect.innerHTML += "<option value='Rangel'> Rangel </option>";
                              municipioSelect.innerHTML += "<option value='Sambizanga'> Sambizanga </option>";
							  municipioSelect.innerHTML += "<option value='Samba'> Samba </option>";
                              municipioSelect.innerHTML += "<option value='Talatona'> Talatona </option>";
                              municipioSelect.innerHTML += "<option value='Viana'> Viana </option>";
                              break;
                          case "Lunda Norte":
                              municipioSelect.innerHTML += "<option value='Cambulo'> Cambulo </option>";
							  municipioSelect.innerHTML += "<option value='Camaxilo'> Camaxilo </option>";
							  municipioSelect.innerHTML += "<option value='Canzar'> Canzar </option>";
							  municipioSelect.innerHTML += "<option value='Cafunfu'> Cafunfu </option>";
                              municipioSelect.innerHTML += "<option value='Capenda Camulemba'> Capenda Camulemba </option>";
                              municipioSelect.innerHTML += "<option value='Caungula'> Caungula </option>";
							  municipioSelect.innerHTML += "<option value='Cassanje Calucala'> Cassanje Calucala </option>";
                              municipioSelect.innerHTML += "<option value='Chitato'> Chitato </option>";
                              municipioSelect.innerHTML += "<option value='Cuango'> Cuango </option>";
							  municipioSelect.innerHTML += "<option value='Cuilo'> Cuilo </option>";
							  municipioSelect.innerHTML += "<option value='Dundo'> Dundo </option>";
                              municipioSelect.innerHTML += "<option value='Lóvua'> Lóvua </option>";
							  municipioSelect.innerHTML += "<option value='Luangue'> Luangue </option>";
                              municipioSelect.innerHTML += "<option value='Lubalo'> Lubalo </option>";
                              municipioSelect.innerHTML += "<option value='Lucapa'> Lucapa </option>";
							  municipioSelect.innerHTML += "<option value='Luremo'> Luremo </option>";
							  municipioSelect.innerHTML += "<option value='Mussungue'> Mussungue </option>";
                              municipioSelect.innerHTML += "<option value='Xá Muteba'> Xá Muteba </option>";
							  municipioSelect.innerHTML += "<option value='Xá Cassau'> Xá Cassau </option>";
                              
                              break;
                          case "Lunda Sul":
						      municipioSelect.innerHTML += "<option value='Alto Chipaca'> Alto Chipaca </option>";
							  municipioSelect.innerHTML += "<option value='Chiluange'> Chuluage </option>";
							  municipioSelect.innerHTML += "<option value='Cassai-Sul'> Cassai-Sul </option>";
                              municipioSelect.innerHTML += "<option value='Cacolo'> Cacolo </option>";
							  municipioSelect.innerHTML += "<option value='Cassengo'> Cassengo </option>";
							  municipioSelect.innerHTML += "<option value='Cazage'> Cazage </option>";
                              municipioSelect.innerHTML += "<option value='Dala'> Dala </option>";
							  municipioSelect.innerHTML += "<option value='Mangueji'> Mangueji </option>";
							  municipioSelect.innerHTML += "<option value='Luma Cassai'> Luma Cassai </option>";
                              municipioSelect.innerHTML += "<option value='Muconda'> Muconda </option>";
							  municipioSelect.innerHTML += "<option value='Murienge'> Murienge </option>";
							  municipioSelect.innerHTML += "<option value='Sombo'> Sombo </option>";
                              municipioSelect.innerHTML += "<option value='Saurimo'> Saurimo </option>";
							  municipioSelect.innerHTML += "<option value='Xassengue'> Xassengue </option>";
                              break;
                          case "Malanje":
                              municipioSelect.innerHTML += "<option value='Cahombo'> Cahombo </option>";
							  municipioSelect.innerHTML += "<option value='Cambundi Catembo'> Cambundi Catembo </option>";
                              municipioSelect.innerHTML += "<option value='Caculama'> Caculama </option>";
							  municipioSelect.innerHTML += "<option value='Cacuso'> Cacuso </option>";
                              municipioSelect.innerHTML += "<option value='Calandula'> Calandula </option>";
                              municipioSelect.innerHTML += "<option value='Cangandala'> Cangandala </option>";
							  municipioSelect.innerHTML += "<option value='Cateco Cangola'> Cateco Cangola </option>";
							  municipioSelect.innerHTML += "<option value='Capunda'> Capunda </option>";
							  municipioSelect.innerHTML += "<option value='Cauale'> Cuale </option>";
							  municipioSelect.innerHTML += "<option value='Kiwaba Nzoji'> Kiwaba Nzoji </option>";
                              municipioSelect.innerHTML += "<option value='Kunda dya Baze'> Kunda dya Baze </option>";
                              municipioSelect.innerHTML += "<option value='Luquembo'> Luquembo </option>";
                              municipioSelect.innerHTML += "<option value='Malanje'> Malanje </option>";
							  municipioSelect.innerHTML += "<option value='Ngola Luiji'> Ngola Luigi </option>";
                              municipioSelect.innerHTML += "<option value='Marimba'> Marimba </option>";
                              municipioSelect.innerHTML += "<option value='Massango'> Massango </option>";
							  municipioSelect.innerHTML += "<option value='Mabanji ya Ngola'> Mabanji ya Ngola </option>";
							  municipioSelect.innerHTML += "<option value='Milando'> Milando </option>";
							  municipioSelect.innerHTML += "<option value='Muquixe'> Muquixe </option>";
                              municipioSelect.innerHTML += "<option value='Quela'> Quela </option>";
							  municipioSelect.innerHTML += "<option value='Quêssua'> Quêssua </option>";
							  municipioSelect.innerHTML += "<option value='Quihuhu'> Quihuhu </option>";
							  municipioSelect.innerHTML += "<option value='Quirima'> Quirima </option>";
							  municipioSelect.innerHTML += "<option value='Quitapa'> Quitapa </option>";
							  municipioSelect.innerHTML += "<option value='Pungo a Ndongo'> Pungo a Ndongo </option>";
							  municipioSelect.innerHTML += "<option value='Xandel'> Xandel </option>";
							  municipioSelect.innerHTML += "<option value='Cambo Suingine'> Cambo Suingine </option>";
                              break;
                          case "Moxico":
                              municipioSelect.innerHTML += "<option value='Alto Cuito'> Alto Cuito </option>";
							  municipioSelect.innerHTML += "<option value='Camanongue'> Camanongue </option>";
							  municipioSelect.innerHTML += "<option value='Chíume'> Chíume </option>";
                              municipioSelect.innerHTML += "<option value='Cangamba'> Cangamba </option>";
							  municipioSelect.innerHTML += "<option value='Cangumbe'> Cangumbe </option>";
							  municipioSelect.innerHTML += "<option value='Lubala Nguimbo'> Lubala Nguimbo </option>";
							  municipioSelect.innerHTML += "<option value='Léua'> Léua </option>";
							  municipioSelect.innerHTML += "<option value='Luena'> Luena </option>";
							  municipioSelect.innerHTML += "<option value='Lucusse'> Lucusse </option>";
							  municipioSelect.innerHTML += "<option value='Lutembo'> Lutembo </option>";
							  municipioSelect.innerHTML += "<option value='Lutuai'> Lutuai </option>";
							  municipioSelect.innerHTML += "<option value='Ninda'> Ninda </option>";

                              break;
						  case "Moxico Leste":
                              municipioSelect.innerHTML += "<option value='Caianda'> Caianda </option>";
							  municipioSelect.innerHTML += "<option value='Cameia'> Cameia </option>";
							  municipioSelect.innerHTML += "<option value='Cazombo'> Cazombo </option>";
							  municipioSelect.innerHTML += "<option value='Lago Dilolo'> Lago Dilolo </option>";
							  municipioSelect.innerHTML += "<option value='Lóvua do Zambeze'> Lóvua do Zambeze </option>";
                              municipioSelect.innerHTML += "<option value='Luau'> Luau </option>";
							  municipioSelect.innerHTML += "<option value='Luacano'> Luacano </option>";
							  municipioSelect.innerHTML += "<option value='Nana Candundo'> Nana Candundo </option>";
							  municipioSelect.innerHTML += "<option value='Macondo'> Macondo </option>";
							  
                          case "Namibe":
                              municipioSelect.innerHTML += "<option value='Bibala'> Bibala </option>";
							  municipioSelect.innerHTML += "<option value='Cacimbas'> Cacimbas </option>";
                              municipioSelect.innerHTML += "<option value='Camucuio'> Camucuio </option>";
							  municipioSelect.innerHTML += "<option value='Iona'> Iona </option>";
							  municipioSelect.innerHTML += "<option value='Lucira'> Lucira </option>";
                              municipioSelect.innerHTML += "<option value='Moçâmedes'> Moçâmedes </option>";
							  municipioSelect.innerHTML += "<option value='Sacomar'> Sacomar </option>";
							  municipioSelect.innerHTML += "<option value='Tômbwa'> Tômbwa </option>";
							  municipioSelect.innerHTML += "<option value='Virei'> Virei </option>";
                              break;
                          case "Uíge":
							  municipioSelect.innerHTML += "<option value='Ambuila'>Ambuila </option>";
							  municipioSelect.innerHTML += "<option value='Alto Zaza'>Alto Zaza </option>";
                              municipioSelect.innerHTML += "<option value='Bembe'> Bembe </option>";
                              municipioSelect.innerHTML += "<option value='Bungo'> Bungo </option>";
							  municipioSelect.innerHTML += "<option value='Cangola'>Cangola </option>";
                              municipioSelect.innerHTML += "<option value='Damba'> Damba </option>";
							  municipioSelect.innerHTML += "<option value='Dange Quitexe'>Dange Quitexe </option>";
							  municipioSelect.innerHTML += "<option value='Lucunga'>Lucunga </option>";
                              municipioSelect.innerHTML += "<option value='Maquela do Zombo'> Maquela do Zombo </option>";
							  municipioSelect.innerHTML += "<option value='Massau'>Massau </option>";
                              municipioSelect.innerHTML += "<option value='Milunga'> Milunga </option>";
							  municipioSelect.innerHTML += "<option value='Mucaba'>Mucaba </option>";
                              municipioSelect.innerHTML += "<option value='Negage'> Negage </option>";
							  municipioSelect.innerHTML += "<option value='Nova Esperança'>Nova Esperança </option>";
							  municipioSelect.innerHTML += "<option value='Nsosso'>Nsosso </option>";
                              municipioSelect.innerHTML += "<option value='Puri'> Puri </option>";
							  municipioSelect.innerHTML += "<option value='Quipedro'>Quipedro </option>";
                              municipioSelect.innerHTML += "<option value='Quimbele'> Quimbele </option>";
							  municipioSelect.innerHTML += "<option value='Sacandica'>Sacandica </option>";
                              municipioSelect.innerHTML += "<option value='Sanza Pombo'> Sanza Pombo </option>";
                              municipioSelect.innerHTML += "<option value='Songo'> Songo </option>";
							  municipioSelect.innerHTML += "<option value='Vista Alegre'>Vista Alegre </option>";
                              municipioSelect.innerHTML += "<option value='Uíge'> Uíge </option>";
							  
                              break;
                          case "Zaire":
                              municipioSelect.innerHTML += "<option value='Cuimba'> Cuimba </option>";
							  municipioSelect.innerHTML += "<option value='Luvo'>Luvo </option>";
							  municipioSelect.innerHTML += "<option value='Lufico'>Lufico </option>";
                              municipioSelect.innerHTML += "<option value='Mbanza Kongo'> Mbanza Kongo </option>";
                              municipioSelect.innerHTML += "<option value='Nóqui'> Nóqui </option>";
                              municipioSelect.innerHTML += "<option value='Nzeto'> Nzeto </option>";
							  municipioSelect.innerHTML += "<option value='Quêlo'>Quêlo </option>";
							  municipioSelect.innerHTML += "<option value='Quindeje'>Quindeje </option>";
							  municipioSelect.innerHTML += "<option value='Serra de Canda'>Serra de Canda </option>";
                              municipioSelect.innerHTML += "<option value='Soyo'> Soyo </option>";
							  municipioSelect.innerHTML += "<option value='Tomboco'>Tomboco </option>";

							  
							  
                              break;  
                          // Adicione mais casos para outras províncias aqui
                          default:
                              municipioSelect.innerHTML += "<option value=''>Nenhum município disponível</option>";
                      }
                  }, 1000); // Simulando um atraso de 1 segundo para uma solicitação AJAX
              }
          </script>
              <!--Sscripts para Popular o SelectOption das Procincias de Forma Dinamica-->
              <script>
              function carregarMunicipiosEndereco() {
                  const provincia = document.getElementById("provinciaEndereco").value;
                  const municipioSelectEndereco = document.getElementById("municipioEndereco");

                  // Limpe os municípios anteriores
                  municipioSelectEndereco.innerHTML = "<option value=''>Carregando...</option>";

                  // Simule uma solicitação AJAX para obter municípios com base na província selecionada
                  setTimeout(() => {
                      municipioSelectEndereco.innerHTML = "<option value=''>Selecione um município</option>";
                           switch (provincia) {
                          case "Bengo":
                              municipioSelectEndereco.innerHTML += "<option value='Ambriz'>Ambriz </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Barra do Dande'>Barra do Dande </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Bula Atumba'>Bula Atumba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Dande'>Dande </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Muxaluando'>Muxaluando </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Nambuangongo'>Nambuangongo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quibaxe'>Quibaxe </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Quicunzo'>Quicunzo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Panguila'>Panguila </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Pango Aluquém'>Pango Aluquém </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Piri'>Piri </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Úcua'>Úcua </option>";
							  
                              break;
                          case "Benguela": 
                              municipioSelectEndereco.innerHTML += "<option value='Baia Farta'>Baia Farta </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Balombo'>Balombo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Babaera'>Babaera </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Benguela'>Benguela </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Biópio'>Biópio </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Bolonguera'>Bolonguera </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Bocoio'>Bocoio </option>"; 
                              municipioSelectEndereco.innerHTML += "<option value='Caimbambo'>Caimbambo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Capupa'>Capupa </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Catumbela'>Catumbela </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Catengue'>Catengue </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chongoroi'>Chongoroi </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Canhamela'>Canhamela </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Chila'>Chila </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Chicuma'>Chicuma </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Chindumbo'>Chindumbo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cubal'>Cubal </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Dombe Grande'>Dombe Grande </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Egito Praia'>Egito Praia </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Iambala'>Iambala </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ganda'>Ganda </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lobito'>Lobito </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Navegantes'>Navegantes </option>";

                              break;
                          case "Bié":
                              municipioSelectEndereco.innerHTML += "<option value='Andulo'> Andulo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Belo Horizonte'> Belo Horizonte </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Calucinga'>Calucinga</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Camacupa'> Camacupa </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cambândua'> Cambândua </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Catabola'> Catabola </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Chicala'>Chicala</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chinguar'> Chinguar </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Chipeta'> Chipeta </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chitembo'> Chitembo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cuemba'> Cuemba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cunhinga'> Cunhinga </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cuito'> Cuito </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Luando'>Luando</option>";
							  municipioSelectEndereco.innerHTML += "<option value='Lúbia'> Lúbia </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Nhârea'> Nhârea </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Mumbué'>Mumbué</option>";
							  municipioSelectEndereco.innerHTML += "<option value='Ringoma'>Ringoma</option>";
							  municipioSelectEndereco.innerHTML += "<option value='Umpulo'> Umpulo </option>";
                            
                              break;
                          case "Cabinda":
                              municipioSelectEndereco.innerHTML += "<option value='Belize'>Belize </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Buco Zau'>Buco Zau </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cabinda'>Cabinda </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cangongo'>Cangongo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Liambo'>Liambo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Massabi'>Massabi </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Necuto'>Necuto </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Ngoio'>Ngoio </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Miconje'>Miconje </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Tando Zinze'>Tando Zinze </option>";
							  
                              break;
                          case "Cuando":
                              municipioSelectEndereco.innerHTML += "<option value='Cuito'>Cuito Cuanavale</option>";
							  municipioSelectEndereco.innerHTML += "<option value='Dima'> Dima </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Dirico'>Dirico </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Luengue'> Luengue </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Luiana'> Luiana </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Mavinga'>Mavinga </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Mucusso'> Mucusso </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Rivungo'>Rivungo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Xipundo'> Xipundo </option>";
                            
                              break;
					    case "Cubango":
                              municipioSelectEndereco.innerHTML += "<option value='Calai'>Calai </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Caiundo'> Caiundo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Chinguanja'> Chinguanja </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cuangar'>Cuangar </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cuchi'>Cuchi </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cutato'> Cutato </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Longa'>Longa </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Menongue'>Menongue </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Mavengue'>Mavengue </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Nancova'>Nancova </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Savate'> Savate </option>";
                            
                              break;
                          case "Cuanza Norte":
						      municipioSelectEndereco.innerHTML += "<option value='Aldeia Nova'> Aldeia Nova </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ambaca'> Ambaca </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Banga'> Banga </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Bolongongo'> Bolongongo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cambambe'> Cambambe </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cazengo'> Cazengo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cêrca'> Cêrca </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Caculo Cabaça'> Caculo Cabaça </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Golungo Alto'> Golungo Alto </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Luinga'> Luinga </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Massangano'> Massangano </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ngonguembo'> Ngonguembo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quiculungo'> Quiculungo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Samba Cajú'> Samba Cajú </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Santa Isabel'> Santa Isabel </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Tango'> Tango </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Terreiro'> Terreiro </option>";
                            
                              break;
                          case "Cuanza Sul":
							  municipioSelectEndereco.innerHTML += "<option value='Amboiva'> Amboiva </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Boa Entrada'> Boa Entrada </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Calulo'> Calulo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cela'> Cela  </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cassongue'> Cassongue </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Conda'> Conda  </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Condé'> Condé </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ebo'> Ebo  </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Gangula'> Gangula </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Gungo'> Gungo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Lonhe'> Lonhe </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Munenga'> Munenga </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Mussende'> Mussende  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Porto Amboim'> Porto Amboim  </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Quenha'> Quenha </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quibala'> Quibala  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quilenda'> Quilenda  </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Quirimbo'> Quirimbo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Quissongo'> Quissongo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Pambangala'> Pambangala </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Poto Amboím'> Porto Amboím </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Sanga'> Sanga </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Seles'> Seles  </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Waku Kungo'> Waku Kungo </option>";
                              break;
                          case "Cunene":
                              municipioSelectEndereco.innerHTML += "<option value='Cahama'> Cahama </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cafima'> Cafima </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Chiéde'> Chiéde </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Chissuata'> Chissuata </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Chitato'> Chitato </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cuanhama'> Cuanhama </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Curoca'> Curoca </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cuvelai'> Cuvelai </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Humbe'> Humbe </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Mupa'> Mupa </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Namacunde'> Namacunde </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Naulila'> Naulila </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Nehone'> Nehone </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ombadja'> Ombadja </option>";
                        case "Icolo e Bengo":
							  municipioSelectEndereco.innerHTML += "<option value='Bom Jesus'> Bom Jesus </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Catete'> Catete </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Calumbo'> Calumbo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cabiri'> Cabiri </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cabo Ledo'> Cabo Ledo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Quiçama'> Quiçama </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Sequele'> Sequele </option>";
							  
							  
                              break;
						  case "Huambo":
						      municipioSelectEndereco.innerHTML += "<option value='Alto Hama'> Alto Hama </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Bailundo'> Bailundo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Bimbe'> Bimbe </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Caála'> Caála </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cachiungo'> Cachiungo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Chicala Choloanga'> Chicala Choloanga </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Chilata'> Chilata </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Chinjenje'> Chinjenje </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cuima'> Cuima </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ecunha'> Ecunha </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Galanga'> Galanga </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Huambo'> Huambo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Londuimbali'> Londuimbali </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Longonjo'> Longonjo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Mungo'> Mungo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Sambo'> Sambo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ucuma'> Ucuma </option>";
                              break;
                          case "Huíla":
                              municipioSelectEndereco.innerHTML += "<option value='Caconda'> Caconda </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cacula'> Cacula </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Caluquembe'> Caluquembe </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Capelongo'> Capelongo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Capunda Cavilongo'> Capunda Cavilongo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chicomba'> Chicomba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chibia'> Chibia </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chipindo'> Chipindo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Chituto'> Chituto </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Chicungo'> Chicungo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cuvango'> Cuvango </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Dongo'> Dongo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Galangue'> Galangue </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Gambos'> Gambos </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Hoque'> Hoque </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Humpata'> Humpata </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Jamba Mineira'> Jamba Mineira </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lubango'> Lubango </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Matala'> Matala </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Palanca'> Palanca </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quilengues'> Quilengues </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Quipungo'> Quipungo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Viti Vivali'> Viti Vivali </option>";
                              break;
                          case "Luanda":
                              municipioSelectEndereco.innerHTML += "<option value='Belas'> Belas </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cacuaco'> Cacuaco </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Camama'> Camama </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cazenga'> Cazenga </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Hoji ya Henda'> Hoji ya Henda </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Ingombota'>Ingombota </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Kilamba Kiaxi'>Kilamba Kiaxi </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Kilamba'> Kilamba </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Maianga'> Maianga </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Mulevos'> Mulevos </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Mussulo'>Mussulo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Rangel'> Rangel </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Sambizanga'> Sambizanga </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Samba'> Samba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Talatona'> Talatona </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Viana'> Viana </option>";
                              break;
                          case "Lunda Norte":
                              municipioSelectEndereco.innerHTML += "<option value='Cambulo'> Cambulo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Camaxilo'> Camaxilo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Canzar'> Canzar </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cafunfu'> Cafunfu </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Capenda Camulemba'> Capenda Camulemba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Caungula'> Caungula </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cassanje Calucala'> Cassanje Calucala </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chitato'> Chitato </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cuango'> Cuango </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cuilo'> Cuilo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Dundo'> Dundo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lóvua'> Lóvua </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Luangue'> Luangue </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lubalo'> Lubalo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lucapa'> Lucapa </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Luremo'> Luremo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Mussungue'> Mussungue </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Xá Muteba'> Xá Muteba </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Xá Cassau'> Xá Cassau </option>";
                              
                              break;
                          case "Lunda Sul":
						      municipioSelectEndereco.innerHTML += "<option value='Alto Chipaca'> Alto Chipaca </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Chiluange'> Chuluage </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cassai-Sul'> Cassai-Sul </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cacolo'> Cacolo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cassengo'> Cassengo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cazage'> Cazage </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Dala'> Dala </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Mangueji'> Mangueji </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Luma Cassai'> Luma Cassai </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Muconda'> Muconda </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Murienge'> Murienge </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Sombo'> Sombo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Saurimo'> Saurimo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Xassengue'> Xassengue </option>";
                              break;
                          case "Malanje":
                              municipioSelectEndereco.innerHTML += "<option value='Cahombo'> Cahombo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cambundi Catembo'> Cambundi Catembo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Caculama'> Caculama </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cacuso'> Cacuso </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Calandula'> Calandula </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cangandala'> Cangandala </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cateco Cangola'> Cateco Cangola </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Capunda'> Capunda </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cauale'> Cuale </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Kiwaba Nzoji'> Kiwaba Nzoji </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Kunda dya Baze'> Kunda dya Baze </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Luquembo'> Luquembo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Malanje'> Malanje </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Ngola Luiji'> Ngola Luigi </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Marimba'> Marimba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Massango'> Massango </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Mabanji ya Ngola'> Mabanji ya Ngola </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Milando'> Milando </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Muquixe'> Muquixe </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quela'> Quela </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Quêssua'> Quêssua </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Quihuhu'> Quihuhu </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Quirima'> Quirima </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Quitapa'> Quitapa </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Pungo a Ndongo'> Pungo a Ndongo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Xandel'> Xandel </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cambo Suingine'> Cambo Suingine </option>";
                              break;
                          case "Moxico":
                              municipioSelectEndereco.innerHTML += "<option value='Alto Cuito'> Alto Cuito </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Camanongue'> Camanongue </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Chíume'> Chíume </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cangamba'> Cangamba </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cangumbe'> Cangumbe </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Lubala Nguimbo'> Lubala Nguimbo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Léua'> Léua </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Luena'> Luena </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Lucusse'> Lucusse </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Lutembo'> Lutembo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Lutuai'> Lutuai </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Ninda'> Ninda </option>";

                              break;
						  case "Moxico Leste":
                              municipioSelectEndereco.innerHTML += "<option value='Caianda'> Caianda </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cameia'> Cameia </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cazombo'> Cazombo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Lago Dilolo'> Lago Dilolo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Lóvua do Zambeze'> Lóvua do Zambeze </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Luau'> Luau </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Luacano'> Luacano </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Nana Candundo'> Nana Candundo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Macondo'> Macondo </option>";
							  
                          case "Namibe":
                              municipioSelectEndereco.innerHTML += "<option value='Bibala'> Bibala </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cacimbas'> Cacimbas </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Camucuio'> Camucuio </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Iona'> Iona </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Lucira'> Lucira </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Moçâmedes'> Moçâmedes </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Sacomar'> Sacomar </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Tômbwa'> Tômbwa </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Virei'> Virei </option>";
                              break;
                          case "Uíge":
							  municipioSelectEndereco.innerHTML += "<option value='Ambuila'>Ambuila </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Alto Zaza'>Alto Zaza </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Bembe'> Bembe </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Bungo'> Bungo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Cangola'>Cangola </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Damba'> Damba </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Dange Quitexe'>Dange Quitexe </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Lucunga'>Lucunga </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Maquela do Zombo'> Maquela do Zombo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Massau'>Massau </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Milunga'> Milunga </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Mucaba'>Mucaba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Negage'> Negage </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Nova Esperança'>Nova Esperança </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Nsosso'>Nsosso </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Puri'> Puri </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Quipedro'>Quipedro </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quimbele'> Quimbele </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Sacandica'>Sacandica </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Sanza Pombo'> Sanza Pombo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Songo'> Songo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Vista Alegre'>Vista Alegre </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Uíge'> Uíge </option>";
							  
                              break;
                          case "Zaire":
                              municipioSelectEndereco.innerHTML += "<option value='Cuimba'> Cuimba </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Luvo'>Luvo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Lufico'>Lufico </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Mbanza Kongo'> Mbanza Kongo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Nóqui'> Nóqui </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Nzeto'> Nzeto </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Quêlo'>Quêlo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Quindeje'>Quindeje </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Serra de Canda'>Serra de Canda </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Soyo'> Soyo </option>";
							  municipioSelectEndereco.innerHTML += "<option value='Tomboco'>Tomboco </option>";
                              break;  
                          // Adicione mais casos para outras províncias aqui
                          default:
                              municipioSelectEndereco.innerHTML += "<option value=''>Nenhum município disponível</option>";
                      }
                  }, 1000); // Simulando um atraso de 1 segundo para uma solicitação AJAX
              }
          </script>
    @endsection
