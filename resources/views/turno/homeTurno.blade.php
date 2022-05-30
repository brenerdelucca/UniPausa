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
    <?php
        include 'componentes/menu.php';   
    ?>
    
    <!-- Conteúdo -->
    <div class="container-fluid">
        <div class="d-flex flex-row">
            <h3>Turnos</h3>
        </div>
        <div class="d-flex flex-row overflow-auto" style="max-height: 65vh;">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Hora de início</th>
                    <th scope="col">Hora de fim</th>
                    <th scope="col">Hora início almoço</th>
                    <th scope="col">Hora fim almoço</th>
                    <th scope="col">Limite hr pausa manhã</th>
                    <th scope="col">Limite hr pausa tarde</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Ações</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                  @foreach ($turnos as $turno)
                    <tr>
                      <td>{{$turno -> id}}</td>
                      <td>{{$turno -> nome_turno}}</td>
                      <td>{{$turno -> hr_inicio}}</td>
                      <td>{{$turno -> hr_fim}}</td>
                      <td>{{$turno -> hr_inicio_almoco}}</td>
                      <td>{{$turno -> hr_fim_almoco}}</td>
                      <td>{{$turno -> limite_hr_pausa_manha}}</td>
                      <td>{{$turno -> limite_hr_pausa_tarde}}</td>
                      @if ($turno -> ativo == 1)
                        <td>Ativo</td>
                      @else
                        <td>Inativo</td>
                      @endif
                      <td class="text-center">
                        <a href="/alterarTurno/{{$turno -> id}}"><i class="bi bi-pencil-fill link-dark"></i></a>
                        <a href="/consultarTurno/{{$turno -> id}}"><i class="bi bi-search link-dark"></i></a>
                        <a href="/deletarTurno/{{$turno -> id}}"><i class="bi bi-trash-fill link-dark"></i></a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
        <div class="d-flex flex-row-reverse">
            <div class="d-flex flex-column">
              <a class="btn btn-success" href="/cadastrarTurno">Cadastrar turno</a>
            </div>
        </div>
    </div>
    
    <!-- Rodapé -->
    <?php
        include 'componentes/footer.php';   
    ?>
</body>
</html>