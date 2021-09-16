<?php

// torna obrigatória a inclusão do arquivo funcoes.php
require("./funcoes.php");

// variável que guarda a String do arquivo json indicado(que contém os dados dos funcionários), através de uma função que a transforma em array
$funcionarios = lerArquivo("empresaX.json");

// se o campo buscarFuncionario estiver com alguma informação,
// ele irá pegar o array de(String convertido) funcionários e buscar a informação desejada dentro da mesma
if (isset($_GET["buscarFuncionario"])) {
    $funcionarios = buscarFuncionario($funcionarios, $_GET["buscarFuncionario"]);
}

// if (isset($_GET["novoNomeFuncionario"])) {
//     $first_name = $_GET["novoNomeFuncionario"];
// } else if (isset($_GET["novoSobrenomeFuncionario"])) {
//     $last_name = $_GET["novoSobrenomeFuncionario"];
// } else if (isset($_GET["novoEmailFuncionario"])) {
//     $email = $_GET["novoEmailFuncionario"];
// } else if (isset($_GET["novoGeneroFuncionario"])) {
//     $gender = $_GET["novoGeneroFuncionario"];
// } else if (isset($_GET["novoIpFuncionario"])) {
//     $ip_adress = $_GET["novoIpFuncionario"];
// } else if (isset($_GET["novoPaisFuncionario"])) {
//     $country = $_GET["novoPaisFuncionario"];
// } else if (isset($_GET["NovoDptoFuncionario"])) {
//     $department = $_GET["NovoDptoFuncionario"];
// }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="scripts.js" defer></script>
    <title>Funcionários da Empresa X</title>
</head>

<body>
    <div class="content">
        <h1>Funcionários da Empresa X</h1>
        <h3>A empresa conta com <?= count(lerArquivo("empresaX.json")) ?> funcionários</h3>

        <!-- formulário criado que guarda um campo editável de texto que possui um ternário que diz que, se alguma informação for inserida nela,
     ela irá buscá-la na lista de funcionários, senão, o a tabela ficará vazia, por não encontrar nenhuma informação -->
        <form method="GET" class="search-form">
            <div class="input-group">
                <input type="search" value="<?= isset($_GET['buscarFuncionario']) ? $_GET['buscarFuncionario'] : "" ?>" name="buscarFuncionario" placeholder="Buscar funcionário" required>
            </div>
            <button class="material-icons">
                person_search
            </button>
        </form>

        <div class="button-container">
            <button name="adicionar" id="btnAddFuncionario">Adicionar</button>
        </div>

        <table>
            <!-- cabeçalho da tabela de funcionários -->
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>E-mail</th>
                <th>Sexo</th>
                <th>Endereço IP</th>
                <th>País</th>
                <th>Departamento</th>
                <th>Ações</th>
            </tr>
            <!-- loop que percorre o array de funcionários e cria uma nova linha na tabela para cada informação encontrada,
        nesse caso, para cada id, nome, sobrenome... -->
            <?php
            foreach ($funcionarios as $funcionario) :
            ?>
                <tr>
                    <td><?= $funcionario->id ?></td>
                    <td><?= $funcionario->first_name ?></td>
                    <td><?= $funcionario->last_name ?></td>
                    <td><?= $funcionario->email ?></td>
                    <td><?= $funcionario->gender ?></td>
                    <td><?= $funcionario->ip_address ?></td>
                    <td><?= $funcionario->country ?></td>
                    <td><?= $funcionario->department ?></td>
                    <td>
                        <button class="material-icons" onclick="deletar(<?= $funcionario->id ?>)">delete</button>
                        <button class="material-icons" onclick="editar(<?= $funcionario->id ?>)">edit</button>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </table>
        <div class="modal-form">
            <form class="container-form-funcionario" action="acoes.php" method="POST">
                <h1>Adicionar funcionário</h1>
                <input type="text" name="id" placeholder="Digite seu ID" required>
                <input type="text" name="first_name" placeholder="Digite seu nome" required>
                <input type="text" name="last_name" placeholder="Digite seu sobrenome" required>
                <input type="text" name="email" placeholder="Digite seu e-mail" required>
                <input type="text" name="gender" placeholder="Digite seu gênero" required>
                <input type="text" name="ip_address" placeholder="Digite seu endereço IP" required>
                <input type="text" name="country" placeholder="Digite seu país" required>
                <input type="text" name="department" placeholder="Digite seu departamento" required>
                <button class="buttonCadastrar">Cadastrar</button>
                <button class="buttonCancelar" type="button" onclick="exitModal()">Cancelar</button>
            </form>
        </div>
    </div>
</body>

</html>