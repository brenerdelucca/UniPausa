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
        @if (count($turnos) > 0)
          <div class="d-flex flex-row overflow-auto" style="max-height: 65vh;">
              <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      {{-- <th scope="col">ID</th> --}}
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
                        {{-- <td>{{$turno -> id}}</td> --}}
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
                          <a href="/alterarTurno/{{$turno -> id}}" title="Alterar"><i class="bi bi-pencil-fill link-dark"></i></a>
                          <a href="/consultarTurno/{{$turno -> id}}" title="Consultar"><i class="bi bi-search link-dark"></i></a>
                          <!--<a href=""><i class="bi bi-trash-fill link-dark"></i></a>-->
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
          </div>
        @else
          <div class="d-flex flex-row justify-content-evenly">
            <h3>Não há turnos cadastrados.</h3>
          </div>
        @endif
        <div class="d-flex flex-row-reverse">
            <div class="d-flex flex-column">
              <a class="btn btn-success" href="/cadastrarTurno">Cadastrar turno</a>
            </div>
            @if (count($turnos) > 1 || count($atendentes) == 0)
              <div class="d-flex flex-column me-1">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Excluir Turno
                </button>
                <form action="/deletarTurno" method="post">
                  @csrf
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Exclusão de turno</h5>
                          <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                        </div>
                        <div class="modal-body">
                          <label class="form-label">Selecione o turno a ser excluído:</label>
                          <select name="id" class="form-select">
                            @foreach ($turnos as $turno)
                              <option value="{{$turno->id}}">{{$turno->nome_turno}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="modal-footer">
                          <a type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</a>
                          <input type="submit" class="btn btn-danger" value="Excluir">
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            @endif
          </div>
          @if (session('warning'))
          <div class="container"></div>
            <div class="container">
              <div class="row alert alert-danger mt-3 justify-content-center">
                  {{session('warning')}}
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