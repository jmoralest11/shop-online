// Actualizar item carrito

$(document).ready(function(){
    $('.btn-update-item').on('click', function(e){
        e.preventDefault();
        // Obtengo mi valor id almacenado en el atributo data del enlace
        var id = $(this).data('id');
        
        // Obtengo mi valor href almacenado en el atributo data del href
        var href = $(this).data('href');

        // Obtengo mi cantidad trayendo el valor de mi input por medio de su id
        var quantity = $("#producto_"+id).val();

        window.location.href = href + "/" + quantity;
    });
});