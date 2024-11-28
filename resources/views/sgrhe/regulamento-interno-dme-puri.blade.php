<!--Layout Principal-->
@extends('layouts.app')
  @section('titulo' , 'Regulamento Interno ')
        @section('header')
        
             <!--Estilizacao do Previw foto de Perfil-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
               <!--Configuracao do Input da Foto de Perfil-->
                <style>
                  #inputFotoPerfil::before{
                    content: 'Actualizar Foto de Perfil'; /* Display the custom text */
              
                  }
                  .info-toggle {
                    display: none; 
                    transition: display 0.5s ease;
                  }

                  .info-toggle.visible {
                    display: block; 
                    transition: display 0.5s ease;
                    
                  }
                  .btn-toggle {
                    text-align: left;
                  }
                  .atrubutos-intem-funcionario{
                  /*  border: .5px dotted grey;*/
                    margin:10px;
                  }
                  .intem-funcionario{
                    border-radius: 10px;
                    background-color:rgba(0, 0, 0, 0.05);
                    margin: 10px;
                    padding: 10px;
                  }

                </style>    
              <!-- Scripts -->
        @endsection
        @section('conteudo_principal')
<div class="wrapper">
      <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
            <section class="content-header ">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>Regulamento Interno</h1>
                  </div>
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Página Inicial</a></li>
                      <li class="breadcrumb-item active">Regulamento Interno</li>
                    </ol>
                  </div>
                </div>
              </div>
            </section>
          <!-- Content Header (Page header) -->
          <section class="content">
                <div class="container-fluid">
                  <div class="row">
                  <div class="col-md-12">
                   <div class="card card-primary">
                    <div class="card-header">
                      <h3>Regulamento Interno da Direcção Municipal da Educação do Púri</h3>
                    </div>
                    <div class="card-body">
                        <p style="font-weight:bold; text-align:center;">
                        REPÚBLICA DE ANGOLA
                        </p>
                        <p style="font-weight:bold; text-align:center;">
                        GOVERNO PROVINCIAL DO UÍGE
                        </p>
                        <p style="font-weight:bold; text-align:center;">
                        ADMINISTRAÇÃO MUNICIPAL DO PÚRI GABINETE DA ADMINISTRADORA
                        </p>
                        <br>
                        <p style="font-weight:bold; text-align:center; color:red;">
                        DESPACHO N° 0 3 / GAB. ADM.MUN.PU/2023
                        </p>
                        <br>
                        <br>
                        <br>
                        <p style="text-align:center; text-align:justify;">
                        Havendo necessidade de se estabelecer o modo de estruturação, organização e funcionamento da Direcção Municipal da Educação do Púri, ajustado ao seu perfil das acções, actividades, programas, projectos e medidas de políticas no seu domínio, tendo em vista a realização das suas atribuições;
                        Em conformidade com n° 1 do artigo 88°, do Decreto Presidencial no 260/10, de 19 de Novembro, conjugado com a alínea d) do n° 4 do artigo 5 do Decreto Legislativo -Presidencial no 2/13, de forma a melhorar a disciplina, rentabilizar e racionalizar os recursos humanos e matérias, assim como adequá-lo a reforma geral da Administração Pública;
                        Administração Municipal do Púri, nos termos do n° 2do artigo 11o da Lei no 15/16, de 12 de Setembro, Lei da Administração local do Estado, conjugado com a alínea o) do artigo 11° do Decreto Presidencial n° 202/19 de 25 de Junho (Regulamento da Lei da Administração Local do Estado) e com n° 1 do artigo 1° do Decreto executivo no 56/20 de 17 de Fevereiro, que aprova o Estatuto Orgânico da Administração Municipal do Púri
                        determina o seguinte:
                        </p>
                        <p>
                        DETERMINA:
                        </p>
                        <p>
                        1º É aprovado o Estatuto orgânico da Direcção Municipal da Educação do Púri, anexo á presente Resolução e que dele faz parte integrante.
                        </p>
                        <p>
                        2º São revogadas todas as disposições que contrariem o disposto no presente despacho.
                        </p>
                        <p>
                        3º As dúvidas e omissões resultantes da interpretação e aplicação do presente despacho são resolvidos pela administração Municipal do Púri.
                        </p>
                        <p>
                        4º O presente despacho entra imediatamente em vigor  
                        </p>
                        <p style="font-weight:bold; text-align:center;">
                          PROPOSTA DE REGULAMENTO INTERNO DE ORGANIZAÇÃO E FUNCIONAMENTO DA DIRECÇÃO MUNICIPAL DA EDUCAÇÃO DO PÚRI.
                        </p>
                        <p style="font-weight:bold; text-align:left;">
                          CAPÍTULO. I
                        </p>
                        DISPOSIÇÕES GERAIS
                        <br>Artigo 1°. (Objecto)
                        <br>
                        O presente instrumento regula os princípios de organização e funcionamento da Direcção Municipal da Educação do Púri bem como estabelece a sua estrutura orgânica.
                        <br>Artigo 2.°
                        <br>
                        (Âmbito)
                        <br>
                        O presente regulamento aplica-se exclusivamente à Direcção Municipal da
                        <br>
                        Educação do Púri.
                        <br>Artigo 3°.
                        <br>
                        (Definição, Provimento e Competências)
                        <br>
                        A Direcção Municipal da Educação é o serviço desconcentrado da Administração Municipal, incumbido de assegurar a execução das acções, actividades, programas, projectos e medidas de políticas, no domínio da Educação, do Ensino e Alfabetização ao nível do Município, bem coordenar programas Municipais que visem o desenvolvimento científico, tecnológico e a Inovação ao nível do Município.
                        <br>Artigo 4.°
                        <br>
                        (Atribuições)
                        <br>
                        Direcção Municipal da Educação tem as seguintes atribuições:
                        <br>
                        a) Promover, controlar e coordenar a capacitação de funcionários ligados ao Sector, em estreita colaboração com Gabinete Provincial da
                        Educação;
                        <br>
                        b) Gerir estabelecimentos de Educação Pré-Escolar e do Ensino Primário; c) Programar a construção, apetrechamento e a manutenção dos estabelecimentos de Educação Pré-Escolar e Ensino Primário em estreita colaboração com o GEPE;
                        <br>
                        d) Colaborar na gestão da carreira do pessoal docente e administrativo dos estabelecimentos de ensino;
                        <br>
                        e) Promover o apetrechamento em mobiliário, material didáctico e manuais escolares, nos estabelecimentos de Ensino Pré-Escolar e ensino Primário;
                        <br>
                        f) Comparticipar no apoio às crianças da Educação Pré-Escolar e do Ensino primário no domínio da acção social e escolar;
                        <br>
                        g) Apoiar a educação extra-escolar e o desporto escolar, bem como o desenvolvimento de actividades complementares da acção educativa Pré-Escolar e Ensino Primário;
                        <br>
                        h) Promover a construção e a manutenção de estabelecimentos de Educação Pré-Escolar e Ensino Primário, bem como promover o transporte escolar;
                        <br>
                        i) Implementar a merenda escolar e gerir os refeitórios dos estabelecimentos de Educação Pré-Escolar e no Ensino Primário, preferencialmente com produtos locais;
                        <br>
                            j) Controlar as actividades dos institutos públicos do ramo, sob a orientação metodológica da estrutura competente ao nível central;
                        <br>
                            k) Promover actividades de educação da juventude e de desporto escolares, bem como dinamizar o desenvolvimento da cultura e da
                        recreação juvenil, ao nível do Município;
                        <br>
                            l) Promover actividade de desenvolvimento científico e tecnológico, bem como iniciativas que promovam a inovação;
                        <br>
                            m) Comparticipar no apoio às crianças da Educação Pré-Escolar e os alunos do Ensino Primário no domínio da acção social e escolar;
                        <br>
                            n) Exercer as demais competências estabelecidas por lei ou determinadas superiormente.
                            <br>
                        CAPÍTULO. II
                        <br>Artigo 5.°
                        <br>
                        (Definição)
                        <br>
                        O Director Municipal da Educação, é o órgão auxiliar do Administrador Municipal, a quem é incumbido em geral, dirigir e assegurar o normal funcionamento da Direcção, respondendo pela sua actividade perante o Administrador Municipal.
                        Artigo 6.°
                        <br>
                        (Provimento)
                        <br>
                        1. O Director Municipal da Educação é nomeado por despacho do Administrador Municipal.
                        <br>
                        <br>2. Os candidatos ao cargo de Director Municipal da Educação devem ter as habilitações mínima de técnico superior em Ciências da Educação e ser pessoal quadro definitivo.
                        <br> 3. Excepcionalmente, pode ser nomeado à Director Municipal, qualquer cidadão, mesmo sem vínculo laboral com a Administração Pública, desde que a sua nomeação se ache oportuna e vantajosa e cumpra com as disposições da lei de base da função pública, devendo para tal ser técnico superior em Ciências da Educação. 
                        Artigo 7. °
                        <br> (Competências)
                        <br> 1 Compete ao Director Municipal:
                        <br>  a) Orientar e controlar toda a actividade da Direcção Municipal, zelando pelo cumprimento das suas atribuições;
                        <br> b) Apresentar relatórios trimestrais das actividades realizadas ao Administrador Municipal bem como ao Director do Gabinete Provincial da Educação respectivamente;
                        <br> c) Apresentar ao Administrador Municipal, o plano anual de actividades da Direcção para a sua aprovação;
                        <br> d) Garantir os meios necessários para a prossecução das actividades da Direcção;
                        <br> e) Representar, assinar e visar toda a documentação em nome da Direcção;
                        <br> f) Emitir pareceres sobre as matérias que lhe forem solicitadas;
                        <br> g) Propor a promoção e transferência do pessoal do quadro do regime geral da Direcção;
                        <br> h) Executar as orientações emanadas pelo Administrador Municipal e as directrizes do Ministério em geral no estrito cumprimento da Constitucionalidade e da legalidade;
                        <br> i) Submeter ao Administrador Municipal os assuntos que careçam de apreciação superior;
                        <br> j) Assegurar e garantir o cumprimento zeloso das orientações metodológicas sobre o sistema de Ensino emanado pelo Ministério da Educação;
                        <br> k) Convocar as reuniões do Conselho de Direcção;
                        <br> l) Autorizar o gozo de licença disciplinar do pessoal do quadro do regime geral da Direcção, com excepção dos Chefes de Secções;
                        <br> m) Participar da avaliação de desempenho do pessoal afecto à Direcção;
                        <br> n) Executar as dotações orçamentais da Direcção nos termos da lei.
                        <br> o) Garantir os materiais necessários e equipamentos para o normal funcionamento da Direcção Municipal;
                        <br> p) Exercer as demais funções que lhe forem acometidas superiormente e por lei;
                        <br>2. Nas suas ausências o Director Municipal é substituído por um Chefe de Secção.
                        <br>Artigo 8. °
                        <br>(Forma dos actos)
                        <br> Os actos do Director Municipal obedecem a forma de pareceres, circulares, ordens de serviços, indicações e Comunicações Internas.
                        <br>CAPÍTULO.III
                        <br>Estrutura Orgânica Secção I Estrutura Orgânica em Geral
                        <br> Artigo 9. °
                        <br> (Estrutura orgânica)
                        <br>A Direcção Municipal da Educação é composta por: 
                        <br>1. Serviço de apoio consultivo:
                        <br> a) Conselho de Direcção, 
                        <br> b) Conselho Consultivo.
                        <br> 2. Serviços de apoio técnico;
                        <br> a) Secção de Educação e Ensino;
                        <br> b) Secção de Planeamento, Estatística e Recursos Humanos; c) Secção de Inspecção Escolar;
                        <br> d) Secção de Ciências, Tecnologia e Inovação. 
                        <br> 3. Serviço de Apoio Instrumental

                        <br> Secção II"
                        <br> (Da Organização em Especial)
                        <br> Subsecção I
                        <br> (Serviço de apoio Consultivo)
                        <br> Artigo 10. °
                        <br> 1. O Conselho Consultivo é um órgão de apoio ao Director Municipal, de actuação periódica, ao qual compete exercer atribuições de natureza consultiva, para a definição dos planos da Direcção, bem como avaliação dos resultados.
                        <br> 2. O conselho Consultivo reúne - se, em geral, ordinária ou extraordinariamente duas vezes por ano, e, quando as circunstâncias as exigirem, sempre convocado pelo Director Municipal;
                        <br> 3. O Director Municipal pode, sempre que necessário, convidar ou convocar outras entidades para participar nas sessões do Conselho Consultivo.
                        <br> 4. O Conselho Consultivo é presidido pelo Director Municipal e integra os seguintes membros:
                        <br> a) Secção de Educação e Ensino;
                        <br> b) Secção de Planeamento, Estatística e Recursos Humanos;
                        <br> c) Secção de Inspecção Escolar;
                        <br> d) Secção de Ciências, Tecnologia e Inovação;
                        <br> e) Directores de Escolas;
                        <br> c) Outros que o Director achar importante convidar. 
                        <br> Artigo 11.°
                        <br> (Conselho de Direcção)
                        <br> 1. O Conselho de Direcção é o órgão de Consulta do Director Municipal, em matérias de gestão, organização e funcionamento da Direcção, competindo-lhe:
                        <br> a) Emitir pareceres sobre a forma de materialização das atribuições da Direcção,
                        <br> b) Propor planos de desenvolvimento do sector;
                        <br> c) Balancear as actividades realizadas pela Direcção, numa periodicidade bimensal.
                        <br> d) Analisar as questões que o Director, pela sua importância, entenda remeter para a discussão.
                        <br> e) Deliberar as matérias atinentes a afectação de professores nas diversas escolas do Município;
                        <br> f) Aprovar trimestralmente o relatório de execução dos recursos financeiros afectos a Direcção;
                        <br> g) Analisar a situação do património da Direcção e propor a aquisição do novo acervo patrimonial;
                        <br> 2.O Conselho de Direcção é presidido pelo Director Municipal e integra os seguintes membros:
                        <br> a) Secção de Educação e Ensino;
                        <br> b) Secção de Planeamento, Estatística e Recursos Humanos;
                        <br> c) Secção de Inspecção Escolar;
                        <br> d) Secção de Ciências, Tecnologia e Inovação.
                        <br> e) Outros que o Director achar importante convidar, mas sem direito à voto.
                        <br> Artigo 11.°
                        <br> (Reuniões)
                        <br> 1. O Conselho de Direcção reúne-se bimensal de forma ordinária e extraordinariamente, quando as circunstâncias as exigirem.
                        <br> Subsecção II
                        <br> (Serviços de apoio técnico)
                        <br> Artigo 12.°
                        <br> (Secção de Educação e Ensino)
                        <br> 1. A Secção Municipal de Educação e Ensino é o serviço de apoio técnico do Director a quem é incumbida a tarefa de aplicar as estratégias e políticas educativas no domínio da Educação Pré-Escolar, Ensino Primário e subsistemas de Ensino geral.
                        <br> 2. A Secção Municipal de Educação e Ensino tem as seguintes competências:
                        <br> a) Garantir a aplicabilidade do calendário escolar a ser executado nos Centros Infantis e Escolas Primárias e Secundárias;
                        <br> b) Assegurar a orientação pedagógica e metodológica da prática educativa; 
                        <br> c) Identificar as necessidades sobre a reciclagem e superação dos educadores de infância, auxiliares de acção educativa e professores do ensino primário para as instituições de ensino sob sua dependência e submeter ao Director Municipal;
                        <br> d) Velar pelo cumprimento dos planos e programas de estudos aprovados para o subsistema de educação de adultos
                        <br> e) Exercer as demais competências estabelecidas por lei ou determinadas superiormente.
                        <br> Artigo 13.°
                        <br> (Secção de Planeamento, Estatística e Recursos Humanos)
                        <br> 1. A Secção Municipal de Planeamento e Estatística e Recursos Humanos é o serviço de apoio técnico do Director a quem é incumbida a tarefa elaborar estudos e análises sobre as matérias compreendidas da Direcção Municipal, planificar, coordenar a realização das actividades globais da Direcção bem como garantir a gestão administrativa e técnica do capital humano.
                        <br> 2. Compete à Secção Municipal Planeamento, Estatística e Recursos Humanos:
                        <br> a) No âmbito do Planeamento e Estatística:
                        <br> I.	Elaborar a programação e controlar a execução dos recursos financeiros atribuídas à Direcção;
                        <br> II.	Elaborar as estatísticas das diversas escolas e institutos afectos ao Município;
                        <br> III.	Organizar e actualizar a base de dados do acervo patrimonial da Direcção Municipal;
                        <br> IV.	Elaborar propostas de construção de novas escolas primárias a nível do Município;
                        <br> V.	Fazer distribuição de forma equitativa e proporcional os bens adquiridos pela Direcção as Escolas e diferentes Secções sob égide da Direcção;
                        <br> b) No âmbito dos Recursos Humanos:

                        <br> I.	Elaborar mapas estatísticos sobre assiduidade, horas acrescidas, absentismo, doenças e outros processos sobre o desempenho
                        <br> II.	laboral dos funcionários da Direcção Municipal;
                        <br> III.	Realizar a avaliação de desempenho e gerir as carreiras para funcionários de todas as secções;
                        <br> IV.	Elaborar a propostas de distribuição dos professores para as distintas escolas;
                        <br> V.	Emitir parecer sobre as propostas de transferência do pessoal do quadro geral para quaisquer outras áreas;
                        <br> VI.	Propor ciclos de formação para o pessoal do quadro docente e não docente;
                        <br> VII.	Propor ao órgão competente processos disciplinares para os agentes que infrinjam as normas do Sector;
                        <br> VIII.	Exercer as demais competências estabelecidas por lei e determinadas superiormente.
                        <br> Artigo 14.°
                        <br> (Secção de Inspecção Escolar)
                        <br> 1. A Secção de Inspecção Municipal de Educação é o serviço técnico que tem como função realizar o acompanhamento, controlo e fiscalização das actividades desenvolvidas no sistema de Educação e Ensino, cuja missão incide nas Instituições de Ensino público e privado.
                        <br> 2. Secção de Inspecção Municipal de Educação tem as seguintes competências:
                        <br> a) Realizar inspecções e auditorias, às instituições de ensino, em casos pontuais quando superiormente orientadas;
                        <br> b) Controlar a aplicação das políticas educacionais aprovadas pelo Ministério e Gabinete Provincial da Educação, ao nível do Município;
                        <br> c) Supervisionar a implementação dos currículos, planos e programas dos cursos, superiormente aprovados;
                        <br> d) Promover a cultura de auto-avaliação nas instituições de ensino;
                        <br> e) Comprovar o rendimento do Sistema de Educação e Ensino nos seus aspectos educativo e formativo;
                        <br> f) Informar aos órgãos competentes sobre os resultados do trabalho realizado, a situação real do sector e propor medidas correctivas com regularidade;
                        <br> g) Propor, de forma fundamenta, o encerramento dos centros infantis e instituições de ensino;
                        <br> h) Facilitar a instrução dos processos disciplinares e responsabilização administrativa em articulação com o órgão competente quando for devidamente solicitado;
                        <br> i)1 Exercer as demais competências estabelecidas por lei e determinadas
                        superiormente.
                        <br> Artigo 15.°
                        <br> (Secção de Ciências, Tecnologia e Inovação)
                        <br> 1. A Secção de Ciências, Tecnologia e Inovação, é um serviço de apoio técnico, responsável pelo desenvolvimento das tecnologias de informação e comunicação e manutenção dos sistemas de informação com vista a dar suporte às actividades de modernização e inovação, bem como elaborar, implementar, coordenar e monitorizar as políticas de comunicação institucional e imprensa da Direcção Municipal.
                        <br> 2. Secção de Ciências, Tecnologias e Inovação da Direcção Municipal de Educação, tem as seguintes competências:
                        <br> a) Garantir as políticas do Ministério no domínio das tecnologias de informação sejam implementas no sector da Educação a nível do Município;
                        <br> b) Emitir parecer sobre a aquisição de meios e equipamentos nos serviços da Direcção, em articulação com estes, em matéria de informática e de telecomunicações;
                        <br> c) Desenvolver e assegurar a manutenção das aplicações informáticas de suporte as estatísticas e respectivas bases de dados;
                        <br> d) Velar pelo bom funcionamento e manuseamento do equipamento informático e apoiar os utilizadores na exploração, gestão, manutenção dos equipamentos e sistemas informáticos e de telecomunicações;
                        <br> e) Planificar e implementar acções de formação e capacitação para técnicos de informática e utilizadores dos sistemas, sob gestão da Direcção;
                        <br> f) Propor a realização feiras de tecnologias e inovação a nível das escolas do Município bem como cooperar com as demais dos outros Municípios;
                        <br> g) Propor a criação de cursos técnicos e consequentemente de escolas técnicas voltadas na área de tecnologia a nível do Município;
                        <br> h) Promover a boa utilização dos sistemas informáticos instalados, a sua rentabilização e actualização, velando pelo bom funcionamento dos equipamentos;
                        <br> i) Criar sistema de monitorização de todas as escolas a nível do Município;
                        <br> j) Divulgar as actividades desenvolvidas pela Direcção e responder aos pedidos de informação dos órgãos de comunicação social;
                        <br> k) Produzir conteúdos informativos para a divulgação nos diversos canais de comunicação;
                        <br> l) Exercer as demais competências estabelecidas por lei ou determinadas superiormente.
                        <br> Subsecção I
                        <br> (Serviço de Apoio Instrumental)
                        <br> Artigo 16.° 
                        <br> (Área Jurídica)
                        <br> 1. A área Jurídica é serviço de apoio Instrumental, do Director Municipal incumbido de assegurar a execução de tarefas nos domínios de assessoria jurídica e de estudos nos domínios legislativos, regulamentar e contencioso administrativo.
                        <br> 2. A área Jurídica tem as seguintes competências:
                        <br> a) Emitir pareceres, estudos e informações, no domínio da educação, bem como apreciar reclamações e recursos hierárquicos dirigidos ao Director Municipal;
                        <br> b) Elaborar propostas, revisar os regulamentos e outros instrumentos jurídicos necessários para o desenvolvimento funcional da Educação no Município;
                        <br> c) Promover, participar, coordenar e assegurar a sua execução dos trabalhos preparatórios e as negociações conducentes à celebração de protocolos e contractos de âmbito Municipal bem como outros documentos jurídicos no domínio da Educação e Ensino conforme o caso;
                        <br> d) Velar pela correcta interpretação e aplicação dos diplomas legais;
                        <br> e) Contribuir para o incremento do acesso à informação de modo a promover a cultura jurídica, designadamente através da recolha, sistematização, actualização, compilação e anotações objectiva e divulgação da legislação e jurisprudência produzida ou relevante para o sector;
                        <br> f) Verificar e acompanhar a conformidade dos procedimentos administrativos;
                        <br> g) Exercer as demais competências estabelecidas por lei ou determinadas superiormente.
                        <br> 3. A área Jurídica é dirigida por um assessor, com habilitações mínimas de Licenciado em Direito, indicado pelo Director Municipal equiparado ao Chefe de Secção.
                        <br> Artigo 17.°
                        <br> (Área Administrativa)
                        <br> A área Administrativa é o serviço que se ocupa na tramitação das questões burocráticas, relações-públicas e higiene da Direcção Municipal.
                        <br> 1. Compete a Área Administrativa:
                        <br> a) Proceder a recepção e registo de entrada e saída da documentação;
                        <br> b) Reproduzir todos os documentos da Direcção e zelar pelo arquivo dos mesmos;
                        <br> c) Orientar e participar na implementação da base de dados da Direcção;
                        <br> d) Propor a aquisição de outros bens patrimoniais:
                        <br> e) Secretariar as reuniões do Conselho de Direcção
                        <br> f) Cumprir e fazer cumprir as orientações emanadas superiormente e impostas por lei.
                        <br> 2. A Área Administrativa é dirigida por um técnico da Direcção, indicado pelo Director Municipal.
                        <br> CAPÍTULO. VI
                        <br> (Disposições Finais) Artigo 18.°
                        <br> Dupla subordinação
                        <br> No âmbito de execução das suas atribuições a Direcção Municipal da Educação esta sujeita a dupla subordinação jurídica sendo funcional e administrativamente à administração municipal e metodologicamente ao Gabinete Provincial da Educação enquanto órgão desconcentrado do Ministério da Educação.
                        <br> Artigo 20.°
                        (Quadro do Pessoal)
                        <br> O quadro do pessoal da Direcção Municipal da Educação, consta do Anexo I do presente regulamento ao qual faz parte integrante.
                        <br> Artigo 21.°
                        <br> (Regime Supletivo)
                        <br> Em tudo que não estiver previsto no presente regulamento, aplicam-se supletivamente o Estatuto da Administração Municipal do Púri, aprovado pelo
                        <br> Decreto Executivo n.º 56/20, de 17 de Fevereiro - Ministério da Administração do Território e em geral toda a legislação que regula o funcionamento da Administração Local do Estado.
                        <br> Artigo 22.° (Nomeação)
                        <br> Os Chefes de Secções são nomeados pelo Administrador Municipal, ouvido o Director Municipal.
                        <br> Artigo 23.°
                        <br> (Organigrama)
                        <br> O organigrama da Direcção Municipal da Educação é o constante no Anexo I deste regulamento do qual faz parte integrante.
                        <br>Artigo 24.°
                        <br>(Aprovação)
                        <br> A presente Proposta de Regulamento Interno é aprovado pelo Administrador Municipal nos termos da lei.
                        <br>Artigo 25.°
                        <br>(Entrada em Vigor)
                        <br>O presente regulamento interno entra em vigor na data da sua publicação em Diário da República.

                    </div>
                   </div>
                  </div>
                  </div>
                </div>
          </section>

        </div>
       </div>   
        @endsection
  @section('scripts')
 @endsection