<?php

require("./funcoes.php");

$idFuncionario = $_GET["id"];

deletarFuncionario("./dados/empresaX.json", $idFuncionario);

header("location: area_restrita.php");
