var pesquisar = document.getElementById('search');

pesquisar.addEventListener("keydown", function(event){
  if(event.key === "Enter"){
    event.preventDefault();
    searchData();
  }  
});

function searchData(){

  if (pesquisar.value.trim() !== "") {
    window.location = 'Editoras.php?search=' + encodeURIComponent(pesquisar.value);
  }
}

function searchData(){
  // Certifique-se de que o valor não esteja vazio antes de redirecionar
  if (pesquisar.value.trim() !== "") {
    window.location = 'Usuarios.php?search=' + encodeURIComponent(pesquisar.value);
  }
}