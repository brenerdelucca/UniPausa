<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UniPausa</title>
</head>
<body>
    <!-- Menu -->
    <link href="/componentes/css/menu.css" rel="stylesheet" type="text/css">
    <nav class="navbar navbar-expand-lg navbar-light menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                  <h4>Parâmetros</h4>
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
    
    <!-- Conteúdo -->
    <div class="container card mt-4 p-4">
        <form action="/alterarParametros" method="POST">
            @csrf
            <div class="row justify-content-evenly">
                <div class="col-5">
                    <label class="form-label">Quantidade de pessoas em pausa simultaneamente</label>
                    <input type="text" class="form-control" name="qntd_pessoas_pausa" value="{{$parametros->qntd_pessoas_pausa}}" pattern="[0-9]{0,10}" required>
                </div>
            </div>
            <div class="row justify-content-evenly mt-5">
              <div class="col-5">
                <label class="form-label">Tempo de pausa</label>
                <input type="time" class="form-control" name="tempo_pausa" value="{{$parametros->tempo_pausa}}" required>
              </div>
            </div>
            <div class="row justify-content-evenly mt-5">
                <div class="col-5">
                  <label class="form-label">Pausas por dia por pessoa</label>
                  <input type="text" class="form-control" name="pausas_por_dia_por_pessoa" value="{{$parametros->pausas_por_dia_por_pessoa}}" pattern="[0-9]{0,10}">
                </div>
            </div>
            <div class="d-flex flex-row justify-content-evenly mt-4">
                <a class="btn btn-danger" href="/home">Cancelar</a>
                <div class="d-flex flex-column">
                    <input type="submit" class="btn btn-success" value="Alterar">
                </div>
            </div>
        </form>
        @if (session('success'))
        <div class="container">
            <div class="row justify-content-center alert alert-success mt-2">
                {{session('success')}}
            </div>
        </div>
        @endif
    </div>
    
    <!-- Rodapé -->
    <?php
        include 'componentes/footer.php';   
    ?>
</body>
</html>