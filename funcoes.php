<?php

//recebe o nome do arquivo
function lerArquivo($nomeArquivo)
{

    //lê o arquivo como string
    $arquivo = file_get_contents($nomeArquivo);

    //transforma a string em array
    $jsonArray = json_decode($arquivo);

    //devolve o array
    return $jsonArray;
}

//busca o funcionário dentro da lista e devolve os funcionários encontrados
// function buscarFuncionario(array $funcionarios, $propriedade)
// {

//     foreach ($funcionarios as $funcionario) {
//         if ($funcionario->id  == $propriedade) {
//             $funcionariosFiltro[] = $funcionario;
//         } else if ($funcionario->first_name  == $propriedade) {
//             $funcionariosFiltro[] = $funcionario;
//         } else if ($funcionario->last_name  == $propriedade) {
//             $funcionariosFiltro[] = $funcionario;
//         } else if ($funcionario->email  == $propriedade) {
//             $funcionariosFiltro[] = $funcionario;
//         } else if ($funcionario->gender  == $propriedade) {
//             $funcionariosFiltro[] = $funcionario;
//         } else if ($funcionario->ip_address  == $propriedade) {
//             $funcionariosFiltro[] = $funcionario;
//         } else if ($funcionario->country  == $propriedade) {
//             $funcionariosFiltro[] = $funcionario;
//         } else if ($funcionario->department  == $propriedade) {
//             $funcionariosFiltro[] = $funcionario;
//         }
//     }
//     return $funcionariosFiltro;
// }


function buscarFuncionario($funcionarios, $filtro)
{

    $funcionariosFiltro = [];

    foreach ($funcionarios as $funcionario) {
        if (
            strpos($funcionario->first_name, $filtro) !== false
            ||
            strpos($funcionario->last_name, $filtro) !== false
            ||
            strpos($funcionario->department, $filtro) !== false
        ) {
            $funcionariosFiltro[] = $funcionario;
        }
    }

    return $funcionariosFiltro;
}

function adicionarFuncionario($nomeArquivo, $novoFuncionario)
{

    $funcionarios = lerArquivo($nomeArquivo);

    $funcionarios[] = $novoFuncionario;

    $json = json_encode($funcionarios);

    file_put_contents($nomeArquivo, $json);
}

function deletarFuncionario($nomeArquivo, $idFuncionario)
{

    $funcionarios = lerArquivo($nomeArquivo);

    foreach ($funcionarios as $chave => $funcionario) {
        if ($funcionario->id == $idFuncionario) {
            unset($funcionarios[$chave]);
        }
    }

    $json = json_encode(array_values($funcionarios));

    file_put_contents($nomeArquivo, $json);
}

// buscar funcionário por ID
function buscarFuncionarioPorId($nomeArquivo, $idFuncionario)
{
    $funcionarios = lerArquivo($nomeArquivo);

    foreach ($funcionarios as $funcionario) {
        if ($funcionario->id == $idFuncionario) {

            return $funcionario;
        }
    }

    return false;
}

function editarFuncionario($nomeArquivo, $funcionarioEditado)
{

    $funcionarios = lerArquivo($nomeArquivo);

    foreach ($funcionarios as $chave => $funcionario) {
        if ($funcionario->id == $funcionarioEditado["id"]) {
            $funcionarios[$chave] = $funcionarioEditado;
        }
    }

    $json = json_encode(array_values($funcionarios));

    file_put_contents($nomeArquivo, $json);
}

// login

//parâmetros da função:
//1 - usuário vindo do form
//2 - senha vinda do form
//3 - dados do arquivo json de usuário e senha
function realizarLogin($usuario, $senha, $dados)
{

    foreach ($dados as $dado) {
        if ($dado->usuario == $usuario && $dado->senha == $senha) {

            // Variáveis de sessão
            $_SESSION["usuario"] = $dado->usuario;
            $_SESSION["id"] = session_id();
            $_SESSION["data_hora"] = date("d/m/Y - h:i:ss");

            header("location: area_restrita.php");
            exit;
        }
    }

    header("location: index.php");
}

function verificarLogin()
{

    if ($_SESSION["id"] != session_id() || (empty($_SESSION["id"]))) {

        header("location: index.php");
    }
}

function finalizarLogin()
{
    session_unset(); //limpa todas as variáveis da sessão
    session_destroy(); //destrói a sessão ativa

    header("location: index.php");
}
