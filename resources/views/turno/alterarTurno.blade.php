<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link href="/componentes/css/menu.css" rel="stylesheet" type="text/css">
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
                  <h4>Alteração de turno</h4>
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
    <div class="container card mt-4 p-3">
      <form action="/alterarTurno/{{$turno->id}}" method="POST">
        @csrf
        <div class="row justify-content-evenly">
          <div class="col-3">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome_turno" value="{{$turno->nome_turno}}" pattern="[A-Za-z]{1,40}[0-9]{0,10}[\w\s]{0,}" required>
          </div>
          <div class="col-3">
            <label class="form-label">Hora de início</label>
            <input type="time" class="form-control" name="hr_inicio" value="{{$turno->hr_inicio}}" required>
          </div>
          <div class="col-3">
            <label class="form-label">Hora de fim</label>
            <input type="time" class="form-control" name="hr_fim" value="{{$turno->hr_fim}}" required>
          </div>
        </div>
        <div class="row mt-5 justify-content-evenly">
          <div class="col-3">
            <label class="form-label">Hora início almoço</label>
            <input type="time" class="form-control" name="hr_inicio_almoco" value="{{$turno->hr_inicio_almoco}}" required>
          </div>
          <div class="col-3">
            <label class="form-label">Hora fim almoço</label>
            <input type="time" class="form-control" name="hr_fim_almoco" value="{{$turno->hr_fim_almoco}}" required>
          </div>
          <div class="col-3"></div>
        </div>
        <div class="row mt-5 justify-content-evenly">
          <div class="col-3">
            <label class="form-label">Limite hr pausa manha</label>
            <input type="time" class="form-control" name="limite_hr_pausa_manha" value="{{$turno->limite_hr_pausa_manha}}" required>
          </div>
          <div class="col-3">
            <label class="form-label">Limite hr pausa tarde</label>
            <input type="time" class="form-control" name="limite_hr_pausa_tarde" value="{{$turno->limite_hr_pausa_tarde}}" required>
          </div>
          <div class="col-3 mt-auto">
            <label class="form-label">Status</label>
            @if ($turno->ativo == 1)
              <select class="form-select" name="ativo">
                <option value="1" selected>Ativo</option>
                <option value="0">Inativo</option>
              </select>
            @else
              <select class="form-select" name="ativo">
                <option value="1">Ativo</option>
                <option value="0" selected>Inativo</option>
              </select>
            @endif
          </div>
        </div>
        <div class="row mt-5 justify-content-evenly">
          <div class="col-3 text-center">
            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Cancelar</a>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza?</h5>
                    <a class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                  </div>
                  <div class="modal-body">
                    Deseja realmente cancelar a alteração?
                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-success" data-bs-dismiss="modal">Não</a>
                    <a class="btn btn-danger" href="/homeTurno">Sim</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-2 text-center">
            <input type="submit" class="btn btn-success" value="Alterar">
          </div>
        </div>
      </form>
      @if (session('erroHora'))
        <div class="alert alert-danger mt-2">
          {{session('erroHora')}}
        </div>
      @endif
    </div>
    
    <!-- Rodapé -->
    <?php
        include 'componentes/footer.php';   
    ?>
</body>
</html>