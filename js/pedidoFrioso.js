$(document).ready(function() {
    listarProductos();

});

function listarProductos() {


    $.ajax({
        url: '../inventarios_php/bd/servidor.php',
        type: 'GET',
        data: {
            quest: 'listar_productos'
        },
        success: function(res) {
            console.log(res);
            try {
                $("#select_pruductos").html('');
                let lista = JSON.parse(res);
                let template = '';
                lista.forEach(lista => {
                    template += `<option>${lista.codigo}-${lista.nombre}</option>`
                });
                $("#select_pruductos").html(template);
            } catch (error) {
                console.log(error);

            }
        }
    })
}