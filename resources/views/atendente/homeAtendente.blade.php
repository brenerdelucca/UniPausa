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
            <h3>Atendentes</h3>
        </div>
        <div class="d-flex flex-row">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="rol">ID</th>
                        <th scope="rol">Nome</th>
                        <th scope="rol">teste1</th>
                        <th scope="rol">teste2</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <td>1</td>
                        <td>Jose</td>
                        <td>rs</td>
                        <td>ks</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex flex-row-reverse">
            <div class="d-flex flex-column">
                <a class="btn btn-success" href="">Cadastrar atendente</a>
            </div>
        </div>
    </div>
    
    <!-- Rodapé -->
    <?php
        include 'componentes/footer.php';   
    ?>
</body>
</html>