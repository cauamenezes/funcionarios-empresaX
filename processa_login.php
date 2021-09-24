<?php

//inicializa a sessão para o processo de login
session_start();

//importação do arquivo de funções
require_once("./funcoes.php");

// recebendo os dados do formulário
if (isset($_POST["txt_usuario"]) || isset($_POST["txt_senha"])) {

    $usuario = $_POST["txt_usuario"];
    $senha = $_POST["txt_senha"];

    realizarLogin($usuario, $senha, lerArquivo("./dados/usuarios.json"));
} else if ($_GET["logout"]) {

    finalizarLogin();
}
