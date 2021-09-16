"use strict"

function showModal() {
    document.querySelector(".modal-form").style.display = "flex";
}

function exitModal() {
    document.querySelector(".modal-form").style.display = "none";
}

function deletar(idFuncionario) {
    // pede confirmação ao usuário
    let confimacao = confirm("Deseja deletar o funcionário?");

    // se confirmar que quer apagar, redireciona para arquivo de ação
    // com o id como parâmetro
    if (confimacao) {
        // redireciona o usuário para a página indicada
        window.location = "acaoDeletar.php?id=" + idFuncionario;
    }
}

// função de editar
function editar(idFuncionario) {

    // teste de recebimento
    window.location = "editar.php?id=" + idFuncionario

}

document.getElementById("btnAddFuncionario")
    .addEventListener("click", showModal);