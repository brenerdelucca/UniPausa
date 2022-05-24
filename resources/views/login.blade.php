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
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
            height: 100vh;
        }
        #login .container #login-row #login-column #login-box {
            margin-top: 20%;
            max-width: 600px;
            height: 270px;
            
            background-color: #ffffff;
            box-shadow: 1px 1px 1px 1px rgb(134, 134, 134, 0.5);
            border-radius: 10px;
            
        }
            #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }
            #login .container #login-row #login-column #login-box #login-form #register-link {
            text-decoration: none;
            margin-bottom: 5%;
        }
    </style>
</head>
<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Email</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Senha</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="row" style="margin-top: 5%;">
                                <div class="col-6" >
                                    <a href="#" id="register-link" class="text-info">Esqueceu a senha?</a>
                                </div>
                                <div class="col-6 text-end">
                                    <input type="submit" name="submit" class="btn btn-info btn-md" value="Entrar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>