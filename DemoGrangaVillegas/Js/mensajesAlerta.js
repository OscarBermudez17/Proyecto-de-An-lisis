

function Confirmar(ruta, rutaCancelar) {
    var mensaje = confirm("¿Deseas eliminar este registro ?");

    if (mensaje) {
        window.location.assign(ruta);
        return ruta
    } else {
        window.location(rutaCancelar);
    }
}

function Alerta (mensaje,ruta){
    
    alert(mensaje);
     window.location.assign(ruta);
    
}