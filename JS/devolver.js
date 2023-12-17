
//script de devolver


document.addEventListener('DOMContentLoaded', function () {
    function escondeIcones(el) {
        var divElement = document.getElementById(el);
        var editIcon = divElement.querySelector('.edit');
        var trashIcon = divElement.querySelector('.trash');
    
        if (editIcon && trashIcon) {
            editIcon.style.display = 'none';
            trashIcon.style.display = 'none';
        }
    }
});

