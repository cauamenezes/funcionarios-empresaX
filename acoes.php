<?php

require("./funcoes.php");

$novoFuncionario = [
    "id" => $_POST["id"],
    "first_name" => $_POST["first_name"],
    "last_name" => $_POST["last_name"],
    "email" => $_POST["email"],
    "gender" => $_POST["gender"],
    "ip_address" => $_POST["ip_address"],
    "country" => $_POST["country"],
    "department" => $_POST["department"]
];

adicionarFuncionario("./dados/empresaX.json", $novoFuncionario);

// redireciona o servidor para a página indicada
header("location: area_restrita.php");
