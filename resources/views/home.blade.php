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
    <div class="container text-center mt-5">
        @if (count($atendentesEmPausa) > 0)
        <div class="d-flex flex-row overflow-auto" style="max-height: 65vh;">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Atendente</th>
                    <th scope="col">Hora de saída para pausa</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                  @foreach ($atendentesEmPausa as $atendente)
                    <tr>
                      <td>{{$atendente -> nome_atendente}} {{$atendente -> sobrenome_atendente}}</td>
                      <td>{{substr($atendente -> hr_inicio_pausa, 0, 5)}} do dia {{substr($atendente -> dt_pausa, 8)}}/{{substr($atendente -> dt_pausa, 5, 2)}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
        @else
            <h3>Não há atendentes em pausa no momento.</h3>
        @endif

        <div class="row">
            <div class="d-flex flex-row-reverse">
                <div class="d-flex flex-column me-1">
                    @if (auth()->user()->esta_em_pausa)
                        <form action="/sairDaPausa" method="post">
                            @csrf
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sair">Sair da pausa</a>
                            <!-- Modal -->
                            <div class="modal fade" id="sair" tabindex="-1" aria-labelledby="sairLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="sairLabel"></h1>
                                        <a class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer"></a>
                                    </div>
                                    <div class="modal-body">
                                        Sair da pausa?
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-secondary" data-bs-dismiss="modal">Não</a>
                                        <input type="submit" class="btn btn-success" value="Sim">
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                    @else
                        <form action="/entrarEmPausa" method="post">
                            @csrf
                            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#entrar">Entrar em pausa</a>
                            <!-- Modal -->
                            <div class="modal fade" id="entrar" tabindex="-1" aria-labelledby="entrarLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="entrarLabel"></h1>
                                            <a class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer"></a>
                                        </div>
                                        <div class="modal-body">
                                            Deseja realmente entrar em pausa?
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-secondary" data-bs-dismiss="modal">Não</a>
                                            <input type="submit" class="btn btn-success" value="Sim">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        @if (session('notPausa'))
            <div class="alert alert-danger mt-3">
                {{session('notPausa')}}
            </div>
        @endif
    </div>

    <!-- Rodapé -->
    <?php
        include 'componentes/footer.php';   
    ?>
</body>
</html>