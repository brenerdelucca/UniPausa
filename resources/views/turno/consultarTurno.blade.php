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
    @php
        include 'componentes/menu.php';   
    @endphp
    
    <!-- Conteúdo -->
    <div class="container card mt-5 p-4">
        <div class="row justify-content-evenly">
          <div class="col-3">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome_turno" value="{{$turno->nome_turno}}" disabled>
          </div>
          <div class="col-3">
            <label class="form-label">Hora de início</label>
            <input type="time" class="form-control" name="hr_inicio" value="{{$turno->hr_inicio}}" disabled>
          </div>
          <div class="col-3">
            <label class="form-label">Hora de fim</label>
            <input type="time" class="form-control" name="hr_fim" value="{{$turno->hr_fim}}" disabled>
          </div>
        </div>
        <div class="row mt-5 justify-content-evenly">
          <div class="col-3">
            <label class="form-label">Hora início almoço</label>
            <input type="time" class="form-control" name="hr_inicio_almoco" value="{{$turno->hr_inicio_almoco}}" disabled>
          </div>
          <div class="col-3">
            <label class="form-label">Hora fim almoço</label>
            <input type="time" class="form-control" name="hr_fim_almoco" value="{{$turno->hr_fim_almoco}}" disabled>
          </div>
          <div class="col-3"></div>
        </div>
        <div class="row mt-5 justify-content-evenly">
          <div class="col-3">
            <label class="form-label">Limite hr pausa manha</label>
            <input type="time" class="form-control" name="limite_hr_pausa_manha" value="{{$turno->limite_hr_pausa_manha}}" disabled>
          </div>
          <div class="col-3">
            <label class="form-label">Limite hr pausa tarde</label>
            <input type="time" class="form-control" name="limite_hr_pausa_tarde" value="{{$turno->limite_hr_pausa_tarde}}" disabled>
          </div>
          <div class="col-3 mt-auto">
            <label class="form-label">Status</label>
            @if ($turno->ativo == 1)
              <select class="form-select" name="ativo" disabled>
                <option value="1" selected>Ativo</option>
                <option value="0">Inativo</option>
              </select>
            @else
              <select class="form-select" name="ativo" disabled>
                <option value="1">Ativo</option>
                <option value="0" selected>Inativo</option>
              </select>
            @endif
          </div>
        </div>
        <div class="row mt-5 justify-content-evenly">
          <div class="col-2 text-center">
            <a class="btn btn-success" href="/homeTurno">Voltar</a>
          </div>
        </div>
    </div>
    
    <!-- Rodapé -->
    <?php
        include 'componentes/footer.php';   
    ?>
</body>
</html>