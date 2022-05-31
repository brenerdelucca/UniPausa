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
    <nav class="navbar navbar-expand-lg navbar-light menu">
        <div class="container-fluid">
          <div class="row">
            <div class="col"><h5>Cadastro de atendente</h5></div>
          </div>
          <div class="col text-end menu">
            Fulano da Silva Santos
            <i class="bi bi-person-circle"></i>
          </div>
        </div>
    </nav>

    <!-- Conteúdo -->
    <div class="container">
        <form action="">
            @csrf
            <div class="d-flex flex-row justify-content-evenly mt-5">
                <div class="d-flex flex-column">
                    <label class="form-label">Nome</label>
                    <input type="text" class="form-control">
                </div>
                <div class="d-flex flex-column">
                    <label class="form-label">Sobrenome</label>
                    <input type="text" class="form-control">
                </div>
                <div class="d-flex flex-column">
                  <label class="form-label">E-mail</label>
                  <input type="email" class="form-control">
                </div>
            </div>
            <div class="d-flex flex-row justify-content-evenly mt-5">
                <div class="d-flex flex-column col-1">
                    <label class="form-label">DDD</label>
                    <input type="number" class="form-control" placeholder="043">
                </div>
                <div class="d-flex flex-column">
                    <label class="form-label">Celular</label>
                    <input type="number" class="form-control" placeholder="912345678">
                </div>
                <div class="flex flex-column">
                    <label class="form-label">Turno</label>
                    <select name="" id="" class="form-select">
                      <option value="">Turno 1</option>
                    </select>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-evenly mt-5">
                <div class="d-flex flex-column">
                    <label class="form-label">É supervisor?</label>
                    <select name="" id="" class="form-select">
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                </div>
                <div class="d-flex flex-column">
                  <label class="form-label">Ativo?</label>
                  <select name="" id="" class="form-select">
                      <option value="1">Sim</option>
                      <option value="0">Não</option>
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
                            <a class="btn btn-secondary" data-bs-dismiss="modal">Não</a>
                            <a class="btn btn-primary" href="/homeAtendente">Sim</a>
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

      <!-- Rodapé -->
    <?php
        include 'componentes/footer.php';   
    ?>
</body>
</html>