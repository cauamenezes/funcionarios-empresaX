"use strict"

function showModal() {
    document.querySelector(".modal-form").style.display = "flex";
}

document.getElementById("btnAddFuncionario")
    .addEventListener("click", showModal);