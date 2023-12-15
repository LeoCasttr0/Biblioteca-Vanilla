/*const form = document.getElementById("#form");
const EditoraInput = document.querySelector("#editora");
const CidadeInput = document.querySelector("#cidade");


form.addEventListener("submit", (event) => {
    event.preventDefault();

    if (EditoraInput.value === "") {
        alert("por favor, preencha o nome da Editora");
        return;
    }


});*/


const form = document.getElementById("form");
const EditoraInput = document.querySelector("editora");
const CidadeInput = document.querySelector("cidade");


form.addEventListener("submit", (event) => {
    event.preventDefault();
    
checkEditoraInput();
});

