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
    @php
        include 'componentes/menu.php';   
    @endphp

    <!-- Conteúdo -->
    <div class="container-fluid">
        <div class="d-flex flex-row">
            <h3>Atendentes</h3>
        </div>
        @if (count($atendentes) > 0)
            <div class="d-flex flex-row overflow-auto" style="max-height: 65vh;">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                            <tr>
                                {{-- <th scope="rol">ID</th> --}}
                                <th scope="rol">Nome completo</th>
                                <th scope="rol">E-mail</th>
                                <th scope="rol">Número</th>
                                @if (auth()->user()->is_adm)
                                    <th scope="rol">Usuário</th>
                                @endif
                                <th scope="rol">Turno</th>
                                <th scope="rol">Status</th>
                                <th scope="rol" class="text-center">Ações</th>
                            </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($atendentes as $atendente)
                            <tr>
                                {{-- <td>{{$atendente->id}}</td> --}}
                                <td>{{$atendente->nome_atendente}} {{$atendente->sobrenome_atendente}}</td>
                                <td>{{$atendente->email}}</td>
                                @if (isset($atendente->ddd) && isset($atendente->numero_celular))
                                    <td>({{$atendente->ddd}}) {{substr($atendente->numero_celular, 0, 5)}}-{{substr($atendente->numero_celular, 5)}}</td>
                                @else
                                    <td>Número não cadastrado</td>
                                @endif
                                @if (auth()->user()->is_adm)
                                    @if ($atendente->is_supervisor == 1)
                                        <td>Supervisor</td>
                                    @else
                                        <td>Atendente</td>
                                    @endif
                                @endif
                                <td>{{$atendente->nome_turno}}</td>
                                @if ($atendente->ativo == 1)
                                    <td>Ativo</td>
                                @else
                                    <td>Inativo</td>
                                @endif
                                <td class="text-center">
                                    <a href="/alterarAtendente/{{$atendente->id}}" title="Alterar"><i class="bi bi-pencil-fill link-dark"></i></a>
                                    <a href="/consultarAtendente/{{$atendente->id}}" title="Consultar"><i class="bi bi-search link-dark"></i></a>
                                    <!--<a href=""><i class="bi bi-trash-fill link-dark"></i></a>-->
                                    <a href="/relatorioPausa/{{$atendente->id}}" title="Relatório individual"><i class="bi bi-file-spreadsheet-fill link-dark"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="d-flex flex-row justify-content-evenly">
                <h3>Não há atendentes cadastrados.</h3>
            </div>
        @endif
        <div class="d-flex flex-row-reverse">
            <div class="d-flex flex-column">
                <a class="btn btn-success" href="/cadastrarAtendente">Cadastrar atendente</a>
            </div>
            @if (count($atendentes) > 0)
                <div class="d-flex flex-column me-1">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Excluir atendente
                    </button>
                    <form action="/deletarAtendente" method="post">
                        @csrf
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Exclusão de atendente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <label class="form-label">Selecione o atendente a ser excluído:</label>
                                <select name="id" class="form-select">
                                    @foreach ($atendentes as $atendente)
                                        @if (!$atendente->is_adm)
                                            <option value="{{$atendente->id}}">{{$atendente->nome_atendente}} {{$atendente->sobrenome_atendente}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                                <input type="submit" class="btn btn-danger" value="Excluir">
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
    
    <!-- Rodapé -->
    <?php
        include 'componentes/footer.php';   
    ?>
</body>
</html>