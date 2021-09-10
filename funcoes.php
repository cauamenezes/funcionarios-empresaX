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
