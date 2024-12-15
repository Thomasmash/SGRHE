<!-- Inclua o SweetAlert no seu layout -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" id="pushmenu" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf
            <button type="button" class="btn btn-danger" @click="confirmLogout">
                Sair / Logout
            </button>
        </form>
    </ul>
</nav>

<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Tem certeza?',
            text: "Confirmar sair do sistema?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sim, sair!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Se o usuário confirmar, submete o formulário
                document.querySelector('form').submit();
            }
        });
    }
</script>