<?php
use Illuminate\Support\Facades\Auth;
 //Carregar dados de perfil de Usuário Logado no Sistema 
 /*

    session(['FuncionarioLogado' => $funcionario]);
    session(['CargoLogado' => App\Models\Cargo::find($funcionario->idCargo)->first()]);
    session(['SeccaoLogado' => App\Models\Seccao::find($funcionario->idSeccao)->first()]);
    session(['PessoaLogado' =>  App\Models\Pessoa::find($funcionario->idPessoa)->first()]);
    session(['UnidadeOrganicaLogado' => App\Models\UnidadeOrganica::find($funcionario->idUnidadeOrganica)->first()]);
    session(['FotoPerfilLogado' => isset(App\Models\Arquivo::where('idFuncionario', $funcionario->id)->where('categoria','FotoPerfil')->first()->caminho) ? App\Models\Arquivo::where('idFuncionario',$funcionario->id)->where('categoria','FotoPerfil')->first()->caminho : "null"]); 

*/
//Dados Essenssiais 
   //Se funionario nao registrado
   if (!isset($funcionarioLogado)) {
   dd('O funcionário logado não esta Registrado na Sua Direcção Municipal');
 }
    session(['funcionario' => $funcionarioLogado]);
    session(['Cargo' => App\Models\Cargo::find($funcionarioLogado->idCargo)->first()]);
    session(['Seccao' => App\Models\Seccao::find($funcionarioLogado->idSeccao)->first()]);
    session(['Pessoa' =>  App\Models\Pessoa::find($funcionarioLogado->idPessoa)->first()]);
    session(['unidadeOrganica' => App\Models\UnidadeOrganica::find($funcionarioLogado->idUnidadeOrganica)->first()]);
    session(['fotoPerfil' => isset(App\Models\Arquivo::where('idFuncionario', $funcionarioLogado->id)->where('categoria','FotoPerfil')->first()->caminho) ? App\Models\Arquivo::where('idFuncionario',$funcionarioLogado->id)->where('categoria','FotoPerfil')->first()->caminho : "null"]);
    session(['idUnidadeOrganica' => App\Models\UnidadeOrganica::where('id', App\Models\Funcionario::where('id', $funcionarioLogado->id)->first()->idUnidadeOrganica)->first()->id]);
 ?>

@php
  $permissoes = session()->only(['Cargo'])['Cargo']->permissoes;
  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }} - @yield('titulo') </title>
         <!--
        Google Font: Source Sans Pro

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap" rel="stylesheet">
        -->

        <!-- NPM-->
        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('build/assets/app-3ac3577e.css') }}">
         <!--Livewire-->
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        <!--Sweet Alert-->
        <link rel="stylesheet" href="{{ asset('dist/css/sweet-alert2.css') }}">

        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
        
        <!--Bootstrap-->
        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        
        <!--Icones e Fontes-->
        <!-- Ionicons -->
        <link rel="stylesheet"href="{{ asset('plugins/bootstrap-icon/css/bootstrap-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/ionicons-2.0.1/css/ionicons.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    
        
        
        <!--Admin LTE -->
        <!-- Theme style -->
        <link rel="stylesheet" href=" {{ asset('dist/css/adminlte.min.css') }}">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }} ">
         <!-- overlayScrollbars -->
         <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

         <!--Outros-->
        <style>
            @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css");

            .content {
               /* background-image:url("{{ asset('/img/sgrhe-icon-branca.png') }}");
                background-repeat: repeat;
                background-size: 1px;
                background-position: 0 0;*/
            }
            .item-1 {
              font-size: large;
            }

            .item-2 {
             padding-left: 15px;
            }
            
            table tr:hover{
                background-color: #f5f5f5;
                color: #000000;
                
            }
            #elemento > p{
                margin: 0;
                padding: 0;
            }

            
  
            .notificacaoActiva {
                text-color:red;
            }
        </style>


        @yield('header')
    </head>
    <body class="font-sans antialiased hold-transition sidebar-mini layout-fixed">
        <x-banner />
            <x-sgrhe-navbar />
             <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Logo -->
                <x-sgrhe-logo />
                <!-- /.logo -->
                <!-- Sidebar -->
                <x-sgrhe-sidebar />
                <!-- /.sidebar -->
            </aside>
            <!-- Page Content -->
            <main>
                @yield('conteudo_principal')
            </main>
            <!-- Footer -->
            <x-sgrhe-footer />
            
            
        <!--JS LiveWire-->
        <script src="{{ asset('build/assets/app-ddee773b.js') }}"></script>
        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }} "></script>
        <!-- jquery-validation -->
        <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }} "></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <!-- Bootstrap 4 -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
        <!-- daterangepicker -->
        <script src="{{ asset('plugins/moment/moment.min.js') }} "></script>
        <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }} "></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }} "></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }} "></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    
        <script src="{{ asset('dist/js/pages/dashboard.js') }} "></script>
        <!--Alertas Menssagens de erros com Sweet Alerts Lib-->
        <script src="{{ asset('dist/js/sweet-alertt2.js') }}"></script>
        <!--Script para Ocultar o Nome do Funcionario quando o menu é escondido-->
        <script>
                // Ouvinte de eventos para o botão de alternância do menu
                $('#pushmenu').click(function() {
                    // Verifica se o menu está aberto ou fechado
                    var menuAberto = $('#menu').hasClass('menu-open');
                    // Se o menu estiver fechado, oculta o elemento filho
                    if (menuAberto) {
                        $('#elemento').hide();
                    }
                });
        </script>


            <script>
            // Função para alternar o estado do link
            function toggleLink() {
                var link = document.getElementById('toggleLink');
                if (link.classList.contains('active')) {
                link.classList.remove('active');
                } else {
                link.classList.add('active');
                }
            }

            // Função para alternar o estado do link seção
            function toggleLinkSeccao() {
                var linkSeccao = document.getElementById('toggleLinkSeccao');
                if (linkSeccao.classList.contains('active')) {
                linkSeccao.classList.remove('active');
                } else {
                linkSeccao.classList.add('active');
                }
            }

            // Chama as funções assim que a página é carregada
            window.onload = function() {
               // toggleLink(); // Primeira chamada para ativar o efeito fade
				//toggleLinkSeccao(); // Primeira chamada para ativar o efeito fade
                
				setInterval(toggleLink, 500); // Chama a função a cada 500ms
                setInterval(toggleLinkSeccao, 700); // Chama a função a cada 500ms
            };
            </script>

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


        
        @yield('scripts')
        @stack('modals')
        @livewireScripts
        <!--Area de Mensagens de erros, alertas e avisos vindo do-->
                                                @if ($errors->any())
                                                 <!--Mensagens com erros de valdacao de formulario-->
                                                    <script>                                              
                                                            Swal.fire({
                                                            icon: "error",
                                                            title: "Erro!",
                                                            html:" @foreach ( $errors->all() as $erro)   {{ $erro }} <br>   @endforeach  ",
                                                            });                                                
                                                    </script>
                                                    @php
                                                        unset($errors);
                                                    @endphp
                                                @endif
                                                @if (session('error') && $errors->any())                               
                                                    <!--Menssagen outros erros de negocios vindo do controller-->
                                                        <script>                           
                                                                Swal.fire({
                                                                icon: "error",
                                                                title: "Erro!!",
                                                                text: "{{ session('error') }}",
                                                                html:" @foreach ( $errors->all() as $erro)  {{ $erro }} <br> @endforeach  ",
                                                                });                                                        
                                                        </script>
                                                    @php
                                                        Session::forget('error');
                                                        unset($errors);
                                                    @endphp
                                                @elseif (session('error'))  
                                                <script>                              
                                                        Swal.fire({
                                                        icon: "error",
                                                        title: "Erro!",
                                                        text: "{{ session('error') }}",
                                                       // timer: 2000
                                                        });                                
                                                </script>
                                                    @php
                                                        Session::forget('error');
                                                    @endphp   
                                                @endif
                                                                                   
                                                @if (session('success'))
                                                <!--Menssagem se processo concluido-->
                                                    <script>                             
                                                            Swal.fire({
                                                            icon: "success",
                                                            title: "Feito!",
                                                            text: "{{ session('success') }}",
                                                            timer: 3000
                                                            });                                   
                                                    </script>
                                                    @php
                                                        Session::forget('success');
                                                    @endphp                        
                                                @endif
                                                                                   
                                                @if (session('aviso'))
                                                <!--Menssagem de Aviso vindo do controller pelas sessoes e nao das validacoes-->
                                                    <script>
                               
                                                            Swal.fire({
                                                            icon: "warning",
                                                            title: "Aviso!",
                                                            text: "{{ session('aviso') }}",
                                                            }); 
                                    
                                                    </script>
                                                    @php
                                                        Session::forget('aviso');
                                                    @endphp                        
                                                @endif

                                                @if (isset($feito))
                                                <!--Menssagem de feito vindo do controller pelas sessoes e nao das validacoes-->
                                                    <script>
                               
                                                            Swal.fire({
                                                            icon: "success",
                                                            title: "Feito!",
                                                            text: "{{ $feito }}",
                                                            //timer: 2000
                                                            }); 
                                    
                                                    </script>
                                                    @php
                                                        unset($feito);
                                                    @endphp                      
                                                @endif
        <!--/Area de Mensagens e erros--> 
    </body>
</html>
