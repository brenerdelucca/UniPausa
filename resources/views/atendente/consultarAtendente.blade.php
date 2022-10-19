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
    @php
        include 'componentes/menu.php';   
    @endphp
    
    <!-- Conteúdo -->
    <div class="container card mt-2 p-2">
            <div class="d-flex flex-row justify-content-evenly">
                <div class="d-flex flex-column">
                    <label class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome_atendente" value="{{$atendente->nome_atendente}}" disabled>
                </div>
                <div class="d-flex flex-column">
                    <label class="form-label">Sobrenome</label>
                    <input type="text" class="form-control" name="sobrenome_atendente" value="{{$atendente->sobrenome_atendente}}" disabled>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-evenly mt-5">
              <div class="d-flex flex-column">
                <label class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" value="{{$atendente->email}}" disabled>
              </div>
              <div class="d-flex flex-column">
                <label class="form-label">Senha</label>
                <input type="password" name="password" class="form-control" disabled>
              </div>
            </div>
            <div class="d-flex flex-row justify-content-evenly mt-5">
              @if (isset($atendente->ddd))
                <div class="d-flex flex-column">
                  <label class="form-label">DDD</label>
                  <input type="number" class="form-control" name="ddd" value="{{$atendente->ddd}}" disabled>
                </div>
              @else
                <div class="d-flex flex-column">
                  <label class="form-label">DDD</label>
                  <input type="number" class="form-control" name="ddd"disabled>
                </div>
              @endif
              @if (isset($atendente->numero_celular))
                <div class="d-flex flex-column">
                  <label class="form-label">Celular</label>
                  <input type="number" class="form-control" name="numero_celular" value="{{$atendente->numero_celular}}" disabled>
                </div>
              @else
                <div class="d-flex flex-column">
                  <label class="form-label">Celular</label>
                  <input type="number" class="form-control" name="numero_celular" disabled>
                </div>
              @endif
            </div>
            <div class="d-flex flex-row justify-content-evenly mt-5">
                <div class="col-2">
                  <label class="form-label">Turno</label>
                  <select name="turno_id" class="form-select" disabled>
                    @foreach ($turnos as $turno)
                      @if ($atendente->turno_id == $turno->id)
                        <option value="{{$turno->id}}" selected>{{$turno->nome_turno}}</option>
                      @else
                      <option value="{{$turno->id}}">{{$turno->nome_turno}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
                @if (auth()->user()->is_adm)
                  <div class="col-2">
                      <label class="form-label">É supervisor?</label>
                      <select name="is_supervisor" class="form-select" disabled>
                        @if ($atendente->is_supervisor == 1)
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
                  <select name="ativo" class="form-select" disabled>
                    @if ($atendente->ativo == 1)
                      <option value="1" selected>Sim</option>
                      <option value="0">Não</option>
                    @else
                      <option value="1">Sim</option>
                      <option value="0" selected>Não</option>
                    @endif
                  </select>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-evenly mt-5">
                <div class="d-flex flex-column text-center">
                    <a class="btn btn-success" href="/homeAtendente">Voltar</a>
                </div>
            </div>
    </div>

    <!-- Rodapé -->
    <?php
        include 'componentes/footer.php';   
    ?>
</body>
</html>