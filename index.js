

function Eliminar() {
    var respuesta = confirm("¿Seguro que desea eliminar este registro?");
    if (respuesta) {
        return true; 
    } else {
        event.preventDefault();
        return false;
    }
}

