// Modais
const getElement = (...queries) => document.querySelector(...queries);
const button = getElement('.open-modal-button');
const container = getElement('.modal-container');
const modal = getElement('.modal');
const activeModalClass = 'modal-show';

// Funções
const openModal = () => container.classList.add(activeModalClass);
const closeModal = () => container.classList.remove(activeModalClass);

button.addEventListener('click', openModal);

container.addEventListener('click', (event) => {
    if (modal.contains(event.target)) return;
    closeModal();
});

document.querySelector('.table').addEventListener('click', function (event) {
    if (event.target && event.target.id === 'editar') {
        openModal();
    }
});

// Formulário Modal
const form = document.getElementById("form");
const username = document.getElementById("usuario");
const email = document.getElementById("Email");

form.addEventListener("submit", (event) => {
    event.preventDefault();
    checkForm();
});

email.addEventListener("blur", () => {
    checkInputEmail();
});

username.addEventListener("blur", () => {
    checkInputUsername();
});

function checkInputUsername() {
    const usernameValue = username.value;
    if (usernameValue === "") {
        errorInput(username, "Preencha um Usuário");
    } else {
        clearError(username);
    }
}

function checkInputEmail() {
    const emailValue = email.value;
    if (emailValue === "") {
        errorInput(email, "Preencha um Email");
    } else {
        clearError(email);
    }
}

// Outras funções e validações...

function checkForm() {
    checkInputUsername();
    checkInputEmail();
    // Adicione outras chamadas de validação aqui

    const formItems = form.querySelectorAll(".form-content");
    const isValid = [...formItems].every((item) => item.className === "form-content");

    if (isValid) {
        closeModal();
    } else {
        // Substitua o alert por uma notificação mais amigável
        swal("PREENCHA TODOS OS CAMPOS CORRETAMENTE", { icon: "error" });
    }
}

function errorInput(input, message) {
    const formItem = input.parentElement;
    const textMessage = formItem.querySelector("a");
    textMessage.innerText = message;
    formItem.className = "form-content error";
}

function clearError(input) {
    const formItem = input.parentElement;
    const textMessage = formItem.querySelector("a");
    textMessage.innerText = "";
    formItem.className = "form-content";
}

