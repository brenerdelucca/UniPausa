<link href="/componentes/css/menu.css" rel="stylesheet" type="text/css">
<nav class="navbar navbar-expand-lg navbar-light menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <?php if(auth()->user()->is_supervisor OR auth()->user()->is_adm){ ?>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/homeAtendente">Atendentes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/homeTurno">Turnos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/telaRelatorios">Relatórios</a>
                            </li>
                            <?php if(auth()->user()->is_adm){ ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/parametros">Parâmetros</a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="dropdown">
                <button class="btn btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="buttonUser">
                    <?php echo auth()->user()->nome_atendente . ' ' . auth()->user()->sobrenome_atendente; ?>
                    <i class="bi bi-person-circle"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end user-navigation">
                    <li><a class="dropdown-item" href="/telaAlterarSenha">Alterar senha</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="/logout">Sair</a></li>
                </ul>
            </div>
        </div>
    </nav>