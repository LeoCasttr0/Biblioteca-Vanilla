const form = document.getElementById("#FormLogin");
const senhaInput = document.querySelector('#Nomesenha');
const userInput = document.querySelector('#Nomeuser');

form.addEventListener("submit", (event) => {
    event.preventDefault();

if(userInput.value===""){
    alert("por favor, preencha o nome de usuario")
    return;
}

form.submit();
});

