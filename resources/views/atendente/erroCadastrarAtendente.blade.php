<!DOCTYPE html>
<html lang="en">
<head>
    <!-- jquery -->
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
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
    @php
        include 'componentes/menu.php';   
    @endphp

    <!-- Conteúdo -->
    <div class="container card mt-2 p-2">
      <h3>Cadastrar atendente</h3>
        <form action="/inserirAtendente" method="POST">
            @csrf
            <div class="d-flex flex-row justify-content-evenly">
                <div class="d-flex flex-column">
                    <label class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome_atendente" value="{{$dadosCadastro->nome_atendente}}" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]{1,60}[0-9]{0,10}[\w\s]{0,}" required>
                </div>
                <div class="d-flex flex-column">
                    <label class="form-label">Sobrenome</label>
                    <input type="text" class="form-control" name="sobrenome_atendente" value="{{$dadosCadastro->sobrenome_atendente}}" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]{1,60}[0-9]{0,10}[\w\s]{0,}" required>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-evenly mt-5">
              <div class="d-flex flex-column">
                <label class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="d-flex flex-column">
                <label class="form-label">Senha</label>
                <input type="password" name="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#])[0-9a-zA-Z$*&@#]{8,}" required>
              </div>
            </div>
            <div class="d-flex flex-row justify-content-evenly mt-5">
                <div class="d-flex flex-column">
                    <label class="form-label">DDD</label>
                    @if (is_null($dadosCadastro->ddd))
                      <input type="text" class="form-control" placeholder="043" name="ddd" pattern="[0-9]{2}">
                    @else
                      <input type="text" class="form-control" placeholder="043" name="ddd" value="{{$dadosCadastro->ddd}}" pattern="[0-9]{2}">
                    @endif
                </div>
                <div class="d-flex flex-column">
                    <label class="form-label">Celular</label>
                    @if (is_null($dadosCadastro->numero_celular))
                      <input type="text" class="form-control" placeholder="912345678" name="numero_celular" pattern="[9]{1}[0-9]{8}">
                    @else
                      <input type="text" class="form-control" placeholder="912345678" name="numero_celular" value="{{$dadosCadastro->numero_celular}}" pattern="[9]{1}[0-9]{8}">
                    @endif
                </div>
            </div>
            <div class="d-flex flex-row justify-content-evenly mt-5">
              <div class="col-2">
                <label class="form-label">Turno</label>
                <select name="turno_id" class="form-select" required>
                  @foreach ($turnos as $turno)
                    @if ($turno->ativo == 1)
                      @if ($dadosCadastro->turno_id == $turno->id)
                        <option value="{{$turno->id}}" selected>{{$turno->nome_turno}}</option>  
                      @else
                        <option value="{{$turno->id}}">{{$turno->nome_turno}}</option> 
                      @endif
                    @endif
                  @endforeach
                </select>
              </div>
              @if (auth()->user()->is_adm)
                <div class="col-2">
                    <label class="form-label">É supervisor?</label>
                    <select name="is_supervisor" class="form-select" required>
                      @if ($dadosCadastro->is_supervisor == 1)
                        <option value="1" selected>Sim</option>
                        <option value="0">Não</option>
                      @else
                        <option value="1">Sim</option>
                        <option value="0" selected>Não</option>
                      @endif
                    </select>
                </div>
              @endif
              <div class="col-2">
                <label class="form-label">Status</label>
                <select name="ativo" class="form-select" required>
                  @if ($dadosCadastro->ativo == 1)
                    <option value="1" selected>Ativo</option>
                    <option value="0">Inativo</option>
                  @else
                    <option value="1">Ativo</option>
                    <option value="0" selected>Inativo</option>
                  @endif
                </select>
              </div>
            </div>            
            <div class="d-flex flex-row justify-content-evenly mt-5">
                <div class="d-flex flex-column">
                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Cancelar</a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tem certeza?</h5>
                            <a class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                          </div>
                          <div class="modal-body">
                            Deseja realmente cancelar o cadastro?
                          </div>
                          <div class="modal-footer">
                            <a class="btn btn-success" data-bs-dismiss="modal">Não</a>
                            <a class="btn btn-danger" href="/homeAtendente">Sim</a>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <input type="submit" class="btn btn-success" value="Cadastrar">
                </div>
            </div>
        </form>
    </div>

<!-- Modal -->
<div class="modal fade" id="modalErro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">E-mail já utilizado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        O e-mail {{$dadosAlteracao->email}} já está sendo usado, por favor utilize outro.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(window).on('load',function(){
  $('#modalErro').modal('show'); });
</script>

      <!-- Rodapé -->
    <?php
        include 'componentes/footer.php';   
    ?>
</body>
</html>