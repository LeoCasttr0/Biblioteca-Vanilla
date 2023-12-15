var pesquisar = document.getElementById('search');

pesquisar.addEventListener("keydown", function (event) {
  if (event.key === "Enter") {
    event.preventDefault();
    searchData();
  }
});

function searchData() {
  if (pesquisar.value.trim() !== "") {
    window.location = 'Editoras.php?search=' + encodeURIComponent(pesquisar.value);
  }
}