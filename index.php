<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>SESSÕES NO PHP</title>

</head>

<body>

    <div class="container-geral">

        <div class="container-form">

            <form action="processa_login.php" method="POST">

                <div class="form-group">
                    <label for="txt_usuario">USUÁRIO</label>
                    <input type="text" class="form-control" name="txt_usuario" id="txt_usuario">
                </div>

                <div class="form-group">
                    <label for="txt_senha">SENHA</label>
                    <input type="password" class="form-control" name="txt_senha" id="txt_senha">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">LOGAR</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>