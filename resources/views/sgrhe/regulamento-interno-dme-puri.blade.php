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
                        REPÚBLICA DE ANGOLA GOVERNO PROVINCIAL DO VÍGE ADMINISTRAÇÃO MUNICIPAL DO PÚRI GABINETE DA ADMINISTRADORA
                        DESPACHO N° 0 3 / GAB. ADM.MUN.PU/2023
                        <br>
                        Havendo necessidade de se estabelecer o modo de estruturação, organização e funcionamento da Direcção Municipal da Educação do Púri, ajustado ao seu perfil das acções, actividades, programas, projectos e medidas de políticas no seu domínio, tendo em vista a realização das suas atribuições;
                        Em conformidade com n° 1 do artigo 88°, do Decreto Presidencial no 260/10, de 19 de Novembro, conjugado com a alínea d) do n° 4 do artigo 5 do Decreto Legislativo -Presidencial no 2/13, de forma a melhorar a disciplina, rentabilizar e racionalizar os recursos humanos e matérias, assim como adequá-lo a reforma geral da Administração Pública;
                        Administração Municipal do Púri, nos termos do n° 2do artigo 11o da Lei no 15/16, de 12 de Setembro, Lei da Administração local do Estado, conjugado com a alínea o) do artigo 11° do Decreto Presidencial n° 202/19 de 25 de Junho (Regulamento da Lei da Administração Local do Estado) e com n° 1 do artigo 1° do Decreto executivo no 56/20 de 17 de Fevereiro, que aprova o Estatuto Orgânico da Administração Municipal do Púri
                        determina o seguinte:
                        <br>
                        DETERMINA:
                        <br>
                        1º É aprovado o Estatuto orgânico da Direcção Municipal da Educação do Púri, anexo á presente Resolução e que dele faz parte integrante.
                        <br>
                        2º São revogadas todas as disposições que contrariem o disposto no presente despacho.
                        <br>
                        3º As dúvidas e omissões resultantes da interpretação e aplicação do presente despacho são resolvidos pela administração Municipal do Púri.
                        <br>
                        4º O presente despacho entra imediatamente em vigor 
                        <br>
                        PROPOSTA DE REGULAMENTO INTERNO DE ORGANIZAÇÃO E FUNCIONAMENTO DA DIRECÇÃO MUNICIPAL DA EDUCAÇÃO DO PÚRI.
                        <br>
                        CAPÍTULO. I
                        <br>
                        DISPOSIÇÕES GERAIS
                        <br>
                        Artigo 1°. (Objecto)
                        <br>
                        O presente instrumento regula os princípios de organização e funcionamento da Direcção Municipal da Educação do Púri bem como estabelece a sua estrutura orgânica.
                        <br>
                        Artigo 2.°
                        <br>
                        (Âmbito)
                        <br>
                        O presente regulamento aplica-se exclusivamente à Direcção Municipal da
                        <br>
                        Educação do Púri.
                        <br>
                        Artigo 3°.
                        <br>
                        (Definição, Provimento e Competências)
                        <br>
                        A Direcção Municipal da Educação é o serviço desconcentrado da Administração Municipal, incumbido de assegurar a execução das acções, actividades, programas, projectos e medidas de políticas, no domínio da Educação, do Ensino e Alfabetização ao nível do Município, bem coordenar programas Municipais que visem o desenvolvimento científico, tecnológico e a Inovação ao nível do Município.
                        <br>
                        Artigo 4.°
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
                        <br>
                        Artigo 5.°
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
          
        @endsection
  @section('scripts')

      <!--Edicao de Corte de imagen -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
          <!--Algoritmo interactivo no processo de delectar Objectos em SweetAlert 2-->
          <script src="{{ asset('plugins/sweetalert2/alerta-deletar.js')}}"></script>
          <script>
              var bs_modal = $('#modal');
              var image = document.getElementById('image');
              const btn_Actualizar = document.getElementById("btn-Actualizar");
              //const label_inputFotoPerfil = document.querySelector('label[for="inputFotoPerfil"]');
              var cropper, reader, file;

              $("body").on("change", ".image", function (e) {
                  var files = e.target.files;
                  var done = function (url) {
                      image.src = url;
                      bs_modal.modal('show');
                  };

                  if (files && files.length > 0) {
                      file = files[0];

                      if (URL) {
                          done(URL.createObjectURL(file));
                      } else if (FileReader) {
                          reader = new FileReader();
                          reader.onload = function (e) {
                              done(reader.result);
                          };
                          reader.readAsDataURL(file);
                      }
                  }
              });

              bs_modal.on('shown.bs.modal', function () {
                  cropper = new Cropper(image, {
                      aspectRatio: 1,
                      viewMode: 3,
                      preview: '.preview'
                  });
              }).on('hidden.bs.modal', function () {
                  cropper.destroy();
                  cropper = null;
              });

              $("#crop").click(function () {
                  canvas = cropper.getCroppedCanvas({
                      width: 160,
                      height: 160,
                  });
                  canvas.toBlob(function (blob) {
                      url = URL.createObjectURL(blob);
                      var reader = new FileReader();
                      reader.readAsDataURL(blob);
                      reader.onloadend = function () {
                          var base64data = reader.result;
                          // Exibir a imagem recortada no formulário (opcional)
                          $('#croppedImage').val(base64data);
                          bs_modal.modal('hide');
                          //Mostrar o Botao Actualizar Foto de Perfil
                          btn_Actualizar.classList.remove("d-none");
                          // Change the label text
                        //  label_inputFotoPerfil.textContent = 'Voçe escolheu a foto de perfil!';
                      };
                  });
              });
          </script>
      <!--Edicao de Corte de imagen para foto de perfil-->

      <!--Scripts para o modal de Addicionar documentos Do Funcionario-->
        <!-- Adicione script para lidar com a dinamicidade do formulário -->
        <script>
            $('.btn-modal-doc-edit').click(function() {
                var formAction = $(this).data('form-action');
                var modalId = $(this).data('target');
                
                $(modalId).find('form').attr('action', formAction);
            });
        </script>
      <!--/Scripts para o modal de Addicionar documentos Do Funcionario-->

      <!--Evento para Mudar a Menssagem do Ipntut pos escolha do cheiro-->
        <!-- Adicione script para lidar com a dinamicidade do formulário -->
        <script>
                $(document).ready(function(){
                  $(".custom-file-input").on("change", function() {
                      var fileName = $(this).val().split("\\").pop();
                      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                  });
              });
        </script>
      <!--/Evento para Mudar a Menssagem do Ipntut pos escolha do cheiro-->

      <script>
        function toggleInfo() {
          const btnToggles = document.querySelectorAll('.btn-toggle');

          btnToggles.forEach((btnToggle) => {
            btnToggle.addEventListener('click', () => {
              const targetId = btnToggle.dataset.target;
              const infoToggle = document.getElementById(targetId);

              infoToggle.classList.toggle('visible');
            });
          });
        }

        toggleInfo();
      </script>


<script>
    // Captura o botão de abrir a modal
    var abrirModalBtn = document.querySelector('.abrir-modal');

    // Captura a modal
    var modal = document.getElementById('myModal');

    // Ação ao clicar no botão de abrir a modal
    abrirModalBtn.addEventListener('click', function() {
        modal.style.display = 'block';
    });

    // Captura o botão de fechar a modal
    var fecharModalBtn = document.querySelector('.fechar-modal');

    // Ação ao clicar no botão de fechar a modal
    fecharModalBtn.addEventListener('click', function() {
        modal.style.display = 'none';
    });
</script>

<!--Limitar a Data por 7 dias no Maximo no Formulario Modal Pedido de Licensa-->
  <script>
    document.getElementById("formLicenca").addEventListener("submit", function(event) {
      event.preventDefault(); // Impede o envio do formulário
      
      // Obtém as datas de início e término
      var startDate = new Date(document.getElementById("dataInicio").value);
      var endDate = new Date(document.getElementById("dataFim").value);
      
      // Calcula a diferença em milissegundos entre as duas datas
      var difference = endDate.getTime() - startDate.getTime();
      
      // Converte a diferença de milissegundos para dias
      var numberOfDays = difference / (1000 * 3600 * 24);
      
      // Define o limite máximo de dias permitido
      var maxDays = 7; // Altere conforme necessário
      
      // Verifica se a data final é anterior à data inicial
      if (endDate < startDate) {
        document.getElementById("dateError").innerText = "A data de término não pode ser anterior à data de início!";
        document.getElementById("dateError").style.display = "block"; // Exibe a mensagem de erro
      } else if (numberOfDays > maxDays) {
        document.getElementById("dateError").innerText = "Os dis de licença não podem exceder " + maxDays + " dias. artigo ...!";
        document.getElementById("dateError").style.display = "block"; // Exibe a mensagem de erro
      } else {
        document.getElementById("dateError").style.display = "none"; // Oculta a mensagem de erro
        this.submit(); // Envio do formulário se estiver tudo correto
      }
    });
  </script>
<!--Limitar a Data por 7 dias no Maximo no Formulario Modal Pedido de Licensa-->
<!--Scripts de controolo de caracter da classe Texo-->
  <script>
        // Seleciona o input de texto e o contador de caracteres
      const textoInput = document.getElementById('texto');
      const contadorCaracteres = document.getElementById('contadorCaracteres');

      // Define o limite de caracteres
      const limiteCaracteres = 100;

      // Adiciona um evento de input ao input de texto
      textoInput.addEventListener('input', function() {
          // Obtém o número de caracteres digitados
          const numCaracteres = textoInput.value.length;
          
          // Atualiza o contador de caracteres
          contadorCaracteres.textContent = numCaracteres + '/' + limiteCaracteres;
          
          // Verifica se o número de caracteres excede o limite
          if (numCaracteres > limiteCaracteres) {
              // Trunca o texto para o limite de caracteres
              textoInput.value = textoInput.value.substring(0, limiteCaracteres);
          }
      });
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
                              municipioSelectEndereco.innerHTML += "<option value='Bula Atumba'>Bula Atumba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Dande'>Dande </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Nambuangongo'>Nambuangongo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quibaxe'>Quibaxe </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Caxito'> Caxito </option>";
                              break;
                          case "Benguela":
                              municipioSelectEndereco.innerHTML += "<option value='Baia Farta'>Baia Farta </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Balombo'>Balombo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Benguela'>Benguela </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Bocoio'>Bocoio </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Caimbambo'>Caimbambo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chongoroi'>Chongoroi </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cubal'>Cubal </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ganda'>Ganda </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lobito'>Lobito </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Vaváu'>Vaváu </option>";
                              break;
                          case "Bié":
                              municipioSelectEndereco.innerHTML += "<option value='Andulo'>Andulo</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Camacupa'>Camacupa</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Catabola'>Catabola</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chinguar'>Chinguar</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chitembo'>Chitembo</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cuemba'>Cuemba</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Huambo'>Huambo</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cunhinga'>Cunhinga</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Kuito'>Kuito</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Nhârea'>Nhârea</option>";
                            
                              break;
                          case "Cabinda":
                              municipioSelectEndereco.innerHTML += "<option value='Belize'>Belize </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Buco-Zau'>Buco-Zau </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cabinda'>Cabinda </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cangongo'>Cangongo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Dinge'>Dinge </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lândana'>Lândana </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Luali'>Luali </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Massabi'>Massabi </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Necuto'>Necuto </option>";
                            
                              break;
                          case "Cuando Cubango":
                              municipioSelectEndereco.innerHTML += "<option value='Calai'>Calai </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cuangar'>Cuangar </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cuchi'>Cuchi </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cuito'>Cuito Cuanavale</option>";
                              municipioSelectEndereco.innerHTML += "<option value='Dirico'>Dirico </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Longa'>Longa </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Menongue'>Menongue </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Mavinga'>Mavinga </option>";
                              municipioSelectEndereco.innerHTML += "<option value='NAncova'>NAncova </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Rivungo'>Rivungo </option>";
                            
                              break;
                          case "Cuanza Norte":
                              municipioSelectEndereco.innerHTML += "<option value='Ambaca'> Ambaca </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Banga'> Banga </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Bolongongo'> Bolongongo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cambambe'> Cambambe </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Golungo'> Golungo Alto </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lucala'> Lucala </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ngonguembo'> Ngonguembo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quiculungo'> Quiculungo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Samba Cajú'> Samba Cajú </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Santa Isabel'> Santa Isabel </option>";
                            
                              break;
                          case "Cuanza Sul":
                              municipioSelectEndereco.innerHTML += "<option value='Amboim'> Amboim  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cela'> Cela  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Conda'> Conda  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ebo'> Ebo  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Libolo'> Libolo  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Mussende'> Mussende  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Porto Amboim'> Porto Amboim  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quibala'> Quibala  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quilenda'> Quilenda  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Seles'> Seles  </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Sumbe'> Sumbe </option>";
                              break;
                          case "Cunene":
                              municipioSelectEndereco.innerHTML += "<option value='Cahama'> Cahama </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Kuanhama'> Kuanhama </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Kuvelai'> Kuvelai </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Namacunde'> Namacunde </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ombadja'> Ombadja </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ondjiva'> Ondjiva </option>";
                          case "Huambo":
                              municipioSelectEndereco.innerHTML += "<option value='Bailundo'> Bailundo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ekunha'> Ekunha </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Huambo'> Huambo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Londuimbali'> Londuimbali </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Longonjo'> Longonjo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Mungo'> Mungo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Tchicala'> Tchicala Tcholoanga </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Ucuma'> Ucuma </option>";
                              break;
                          case "Huíla":
                              municipioSelectEndereco.innerHTML += "<option value='Caconda'> Caconda </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cacula'> Cacula </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Caluquembe'> Caluquembe </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chicomba'> Chicomba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chibia'> Chibia </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chipindo'> Chipindo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Humpata'> Humpata </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lubango'> Lubango </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Matala'> Matala </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quilengues'> Quilengues </option>";
                              break;
                          case "Luanda":
                              municipioSelectEndereco.innerHTML += "<option value='Belas'> Belas </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cacuaco'> Cacuaco </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cazenga'> Cazenga </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Icolo e Bengo'> Icolo e Bengo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Luanda'> Luanda </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quiçama'> Quiçama </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Talatona'> Talatona </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Viana'> Viana </option>";
                              break;
                          case "Lunda Norte":
                              municipioSelectEndereco.innerHTML += "<option value='Cambulo'> Cambulo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Capenda'> Capenda Camulemba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Caungula'> Caungula </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Chitato'> Chitato </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cuango'> Cuango </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lóvua'> Lóvua </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lubalo'> Lubalo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lucapa'> Lucapa </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Xá Muteba'> Xá Muteba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cuilo'> Cuilo </option>";
                              break;
                          case "Lunda Sul":
                              municipioSelectEndereco.innerHTML += "<option value='Cacolo'> Cacolo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Dala'> Dala </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Muconda'> Muconda </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Saurimo'> Saurimo </option>";
                              break;
                          case "Malanje":
                              municipioSelectEndereco.innerHTML += "<option value='Cahombo'> Cahombo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Caculama'> Caculama </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Calandula'> Calandula </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cangandala'> Cangandala </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Kangandala'> Kangandala </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Kunda'> Kunda dya Baze </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Luquembo'> Luquembo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Malanje'> Malanje </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Marimba'> Marimba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Massango'> Massango </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Mucari'> Mucari </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quela'> Quela </option>";
                              break;
                          case "Moxico":
                              municipioSelectEndereco.innerHTML += "<option value='Alto Zambeze'> Alto Zambeze </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Bundas'> Bundas </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Camanongue'> Camanongue </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Cameia'> Cameia </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Luacano'> Luacano </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Luchazes'> Luchazes </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Luena'> Luena </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lumeje'> Lumeje </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Luau'> Luau </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Lutembo'> Lutembo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Moxico'> Moxico </option>";
                              break;
                          case "Namibe":
                              municipioSelectEndereco.innerHTML += "<option value='Bibala'> Bibala </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Camucuio'> Camucuio </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Moçâmedes'> Moçâmedes </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Namibe'> Namibe </option>";
                              break;
                          case "Uíge":
                              municipioSelectEndereco.innerHTML += "<option value='Bembe'> Bembe </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Buengas'> Buengas </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Bungo'> Bungo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Damba'> Damba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Maquela do Zombo'> Maquela do Zombo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Milunga'> Milunga </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Negage'> Negage </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Puri'> Puri </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quimbele'> Quimbele </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Quitexe'> Quitexe </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Sanza Pombo'> Sanza Pombo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Songo'> Songo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Alto Cauale'> Alto Cauale </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Uíge'> Uíge </option>";
                              break;
                          case "Zaire":
                              municipioSelectEndereco.innerHTML += "<option value='Cuimba'> Cuimba </option>";
                              municipioSelectEndereco.innerHTML += "<option value='M'banza-Kongo'> M'banza-Kongo </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Nóqui'> Nóqui </option>";
                              municipioSelectEndereco.innerHTML += "<option value='N'zeto'> N'zeto </option>";
                              municipioSelectEndereco.innerHTML += "<option value='Soyo'> Soyo </option>";
                              break;  
                          // Adicione mais casos para outras províncias aqui
                          default:
                              municipioSelectEndereco.innerHTML += "<option value=''>Nenhum município disponível</option>";
                      }
                  }, 1000); // Simulando um atraso de 1 segundo para uma solicitação AJAX
              }
            </script>

 @endsection