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
    <div class="container">
        <form action="/alterarSenha" method="POST" class="card mt-2 p-3">
            @csrf
            <div class="d-flex flex-row justify-content-evenly">
                <div class="d-flex flex-column">
                    <label class="form-label">Senha antiga</label>
                    <input type="password" class="form-control" name="senhaAntiga" required>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-evenly">
                <div class="d-flex flex-column">
                    <label class="form-label">Senha nova</label>
                    <input type="password" class="form-control" name="senhaNova" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#])[0-9a-zA-Z$*&@#]{8,}" required>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-evenly">
                <div class="d-flex flex-column">
                    <label class="form-label">Confirmar senha nova</label>
                    <input type="password" class="form-control" name="confirmaSenhaNova" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#])[0-9a-zA-Z$*&@#]{8,}" required>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-evenly">
                <a class="btn btn-danger" href="/home">Cancelar</a>
                <div class="d-flex flex-column">
                    <input type="submit" class="btn btn-success" value="Alterar senha">
                </div>
            </div>
        </form>
        @if (session('dangerOld'))
            <div class="d-flex flex-row justify-content-evenly mt-2 p-2">
                <div class="alert alert-danger">
                    {{session('dangerOld')}}
                </div>
            </div>
        @endif
        @if (session('dangerNew'))
            <div class="d-flex flex-row justify-content-evenly mt-2 p-2">
                <div class="alert alert-danger">
                    {{session('dangerNew')}}
                </div>
            </div>
        @endif
        @if (session('success'))
            <div class="d-flex flex-row justify-content-evenly mt-2 p-2">
                <div class="alert alert-success">
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