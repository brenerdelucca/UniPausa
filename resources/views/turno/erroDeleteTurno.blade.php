<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <!-- Icons-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link href="/componentes/css/menu.css" rel="stylesheet">
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
                  <h4>Exclusão de turno</h4>
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
    <div class="container mt-5">
        <div class="row">
            <h5>O turno {{$turnoAntigo->nome_turno}} já foi usado no cadastro de atendentes, caso queira excluí-lo selecione abaixo um novo turno para esse(s) atendente(s), caso queira 
                desistir clique em voltar.</h5>
        </div>
        <form action="/trocarTurno" method="post">
          @csrf
          <div class="row mt-3">
            <label class="form-label">Novo turno para o(s) atendente(s):</label>
            <select name="turnoNovo" class="form-select">
              @foreach ($turnos as $turno)
                @if ($turno->id != $turnoAntigo->id)
                  <option value="{{$turno->id}}">{{$turno->nome_turno}}</option>
                @endif
              @endforeach
            </select>
          </div>
          <input type="hidden" value="{{$turnoAntigo->id}}" name="turnoAntigo">
          <div class="row mt-3 text-center">
            <div class="col">
              <a href="/homeTurno" class="btn btn-success">Voltar</a>
            </div>
            <div class="col">
              <input type="submit" value="Prosseguir" class="btn btn-danger">
            </div>
          </div>
        </form>
    </div>

    <!-- Rodapé -->
    <?php
        include 'componentes/footer.php';   
    ?>
</body>
</html>