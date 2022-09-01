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
                                <a class="nav-link" href="#">Relatórios</a>
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
            <div class="col text-end menu">
                <?php echo auth()->user()->nome_atendente . ' ' . auth()->user()->sobrenome_atendente; ?>
                <i class="bi bi-person-circle"></i>
                <a href="/logout">Sair</a>
            </div>
        </div>
    </nav>