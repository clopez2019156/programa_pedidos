$(document).ready(function() {
    correlativo();
});

function setearDatos1() {
    var id = document.getElementById('casilla1').value;
    document.getElementById('cantidad25').disabled = false;
    document.getElementById('precio25').disabled = false;
    $.ajax({
        url: '../inventarios_php/bd/servidor.php',
        type: 'GET',
        data: {
            quest: 'obtener_producto',
            id
        },
        success: function(res) {
            console.log(res);
            let lista = JSON.parse(res);
            lista.forEach(lista => {
                document.getElementById('nombre1').innerHTML = lista.nombre;

            });
        }
    })
}

function setearDatos2() {
    var id = document.getElementById('casilla2').value;
    document.getElementById('cantidad26').disabled = false;
    document.getElementById('precio26').disabled = false;
    $.ajax({
        url: '../inventarios_php/bd/servidor.php',
        type: 'GET',
        data: {
            quest: 'obtener_producto',
            id
        },
        success: function(res) {
            console.log(res);
            let lista = JSON.parse(res);
            lista.forEach(lista => {
                document.getElementById('nombre2').innerHTML = lista.nombre;

            });
        }
    })
}

function setearDatos3() {
    var id = document.getElementById('casilla3').value;
    document.getElementById('cantidad27').disabled = false;
    document.getElementById('precio27').disabled = false;
    $.ajax({
        url: '../inventarios_php/bd/servidor.php',
        type: 'GET',
        data: {
            quest: 'obtener_producto',
            id
        },
        success: function(res) {
            console.log(res);
            let lista = JSON.parse(res);
            lista.forEach(lista => {
                document.getElementById('nombre3').innerHTML = lista.nombre;

            });
        }
    })
}

function setearDatos4() {
    var id = document.getElementById('casilla4').value;
    document.getElementById('cantidad28').disabled = false;
    document.getElementById('precio28').disabled = false;

    $.ajax({
        url: '../inventarios_php/bd/servidor.php',
        type: 'GET',
        data: {
            quest: 'obtener_producto',
            id
        },
        success: function(res) {
            console.log(res);
            let lista = JSON.parse(res);
            lista.forEach(lista => {
                document.getElementById('nombre4').innerHTML = lista.nombre;

            });
        }
    })
}

function setearDatos5() {
    var id = document.getElementById('casilla5').value;
    document.getElementById('cantidad29').disabled = false;
    document.getElementById('precio29').disabled = false;
    $.ajax({
        url: '../inventarios_php/bd/servidor.php',
        type: 'GET',
        data: {
            quest: 'obtener_producto',
            id
        },
        success: function(res) {
            console.log(res);
            let lista = JSON.parse(res);
            lista.forEach(lista => {
                document.getElementById('nombre5').innerHTML = lista.nombre;

            });
        }
    })
}

function calcularTotales() {

    document.getElementById('total1').innerHTML = (document.getElementById('cantidad1').value * 67.50);
    document.getElementById('total2').innerHTML = (document.getElementById('cantidad2').value * 67.50);
    document.getElementById('total3').innerHTML = (document.getElementById('cantidad3').value * 67.50);
    document.getElementById('total4').innerHTML = (document.getElementById('cantidad4').value * 67.50);
    document.getElementById('total5').innerHTML = (document.getElementById('cantidad5').value * 67.50);
    document.getElementById('total6').innerHTML = (document.getElementById('cantidad6').value * 67.50);
    document.getElementById('total7').innerHTML = (document.getElementById('cantidad7').value * 67.50);
    document.getElementById('total8').innerHTML = (document.getElementById('cantidad8').value * 67.50);
    document.getElementById('total9').innerHTML = (document.getElementById('cantidad9').value * 67.50);
    document.getElementById('total10').innerHTML = (document.getElementById('cantidad10').value * 67.50);
    document.getElementById('total11').innerHTML = (document.getElementById('cantidad11').value * 67.50);
    document.getElementById('total12').innerHTML = (document.getElementById('cantidad12').value * 67.50);
    document.getElementById('total13').innerHTML = (document.getElementById('cantidad13').value * 67.50);
    document.getElementById('total14').innerHTML = (document.getElementById('cantidad14').value * 67.50);
    document.getElementById('total15').innerHTML = (document.getElementById('cantidad15').value * 67.50);
    document.getElementById('total16').innerHTML = (document.getElementById('cantidad16').value * 67.50);
    document.getElementById('total17').innerHTML = (document.getElementById('cantidad17').value * 67.50);
    document.getElementById('total18').innerHTML = (document.getElementById('cantidad18').value * 67.50);
    document.getElementById('total19').innerHTML = (document.getElementById('cantidad19').value * 67.50);
    document.getElementById('total20').innerHTML = (document.getElementById('cantidad20').value * 67.50);
    document.getElementById('total21').innerHTML = (document.getElementById('cantidad21').value * 67.50);
    document.getElementById('total22').innerHTML = (document.getElementById('cantidad22').value * 67.50);
    document.getElementById('total23').innerHTML = (document.getElementById('cantidad23').value * 120);
    document.getElementById('total24').innerHTML = (document.getElementById('cantidad24').value * 67.50);
    document.getElementById('total25').innerHTML = (document.getElementById('cantidad25').value * document.getElementById('precio25').value);
    document.getElementById('total26').innerHTML = (document.getElementById('cantidad26').value * document.getElementById('precio26').value);
    document.getElementById('total27').innerHTML = (document.getElementById('cantidad27').value * document.getElementById('precio27').value);
    document.getElementById('total28').innerHTML = (document.getElementById('cantidad28').value * document.getElementById('precio28').value);
    document.getElementById('total29').innerHTML = (document.getElementById('cantidad29').value * document.getElementById('precio29').value);


    document.getElementById('cantidad').innerHTML = parseInt(document.getElementById('cantidad1').value) +
        parseInt(document.getElementById('cantidad2').value) + parseInt(document.getElementById('cantidad3').value) +
        parseInt(document.getElementById('cantidad4').value) + parseInt(document.getElementById('cantidad5').value) +
        parseInt(document.getElementById('cantidad6').value) + parseInt(document.getElementById('cantidad7').value) +
        parseInt(document.getElementById('cantidad8').value) + parseInt(document.getElementById('cantidad9').value) +
        parseInt(document.getElementById('cantidad10').value) + parseInt(document.getElementById('cantidad11').value) +
        parseInt(document.getElementById('cantidad12').value) + parseInt(document.getElementById('cantidad13').value) +
        parseInt(document.getElementById('cantidad14').value) + parseInt(document.getElementById('cantidad15').value) +
        parseInt(document.getElementById('cantidad16').value) + parseInt(document.getElementById('cantidad17').value) +
        parseInt(document.getElementById('cantidad18').value) + parseInt(document.getElementById('cantidad19').value) +
        parseInt(document.getElementById('cantidad20').value) + parseInt(document.getElementById('cantidad21').value) +
        parseInt(document.getElementById('cantidad22').value) + parseInt(document.getElementById('cantidad23').value) +
        parseInt(document.getElementById('cantidad24').value) + parseInt(document.getElementById('cantidad25').value) +
        parseInt(document.getElementById('cantidad26').value) + parseInt(document.getElementById('cantidad27').value) +
        parseInt(document.getElementById('cantidad28').value) + parseInt(document.getElementById('cantidad29').value);


    document.getElementById('total').innerHTML = parseFloat(document.getElementById('total1').innerHTML) +
        parseFloat(document.getElementById('total2').innerHTML) + parseFloat(document.getElementById('total3').innerHTML) +
        parseFloat(document.getElementById('total4').innerHTML) + parseFloat(document.getElementById('total5').innerHTML) +
        parseFloat(document.getElementById('total6').innerHTML) + parseFloat(document.getElementById('total7').innerHTML) +
        parseFloat(document.getElementById('total8').innerHTML) + parseFloat(document.getElementById('total9').innerHTML) +
        parseFloat(document.getElementById('total10').innerHTML) + parseFloat(document.getElementById('total11').innerHTML) +
        parseFloat(document.getElementById('total12').innerHTML) + parseFloat(document.getElementById('total13').innerHTML) +
        parseFloat(document.getElementById('total14').innerHTML) + parseFloat(document.getElementById('total15').innerHTML) +
        parseFloat(document.getElementById('total16').innerHTML) + parseFloat(document.getElementById('total17').innerHTML) +
        parseFloat(document.getElementById('total18').innerHTML) + parseFloat(document.getElementById('total19').innerHTML) +
        parseFloat(document.getElementById('total20').innerHTML) + parseFloat(document.getElementById('total21').innerHTML) +
        parseFloat(document.getElementById('total22').innerHTML) + parseFloat(document.getElementById('total23').innerHTML) +
        parseFloat(document.getElementById('total24').innerHTML) + parseFloat(document.getElementById('total25').innerHTML) +
        parseFloat(document.getElementById('total26').innerHTML) + parseFloat(document.getElementById('total27').innerHTML) +
        parseFloat(document.getElementById('total28').innerHTML) + parseFloat(document.getElementById('total29').innerHTML);

}

function caclularTotal() {
    document.getElementById('cantidad').innerHTML = parseInt(document.getElementById('cantidad1').value) +
        parseInt(document.getElementById('cantidad2').value) + parseInt(document.getElementById('cantidad3').value) +
        parseInt(document.getElementById('cantidad4').value) + parseInt(document.getElementById('cantidad5').value) +
        parseInt(document.getElementById('cantidad6').value) + parseInt(document.getElementById('cantidad7').value) +
        parseInt(document.getElementById('cantidad8').value) + parseInt(document.getElementById('cantidad9').value) +
        parseInt(document.getElementById('cantidad10').value) + parseInt(document.getElementById('cantidad11').value) +
        parseInt(document.getElementById('cantidad12').value) + parseInt(document.getElementById('cantidad13').value) +
        parseInt(document.getElementById('cantidad14').value) + parseInt(document.getElementById('cantidad15').value) +
        parseInt(document.getElementById('cantidad16').value) + parseInt(document.getElementById('cantidad17').value) +
        parseInt(document.getElementById('cantidad18').value) + parseInt(document.getElementById('cantidad19').value) +
        parseInt(document.getElementById('cantidad20').value) + parseInt(document.getElementById('cantidad21').value) +
        parseInt(document.getElementById('cantidad22').value) + parseInt(document.getElementById('cantidad23').value) +
        parseInt(document.getElementById('cantidad24').value) + parseInt(document.getElementById('cantidad25').value) +
        parseInt(document.getElementById('cantidad26').value) + parseInt(document.getElementById('cantidad27').value) +
        parseInt(document.getElementById('cantidad28').value) + parseInt(document.getElementById('cantidad29').value);


    document.getElementById('total').innerHTML = parseFloat(document.getElementById('total1').innerHTML) +
        parseFloat(document.getElementById('total2').innerHTML) + parseFloat(document.getElementById('total3').innerHTML) +
        parseFloat(document.getElementById('total4').innerHTML) + parseFloat(document.getElementById('total5').innerHTML) +
        parseFloat(document.getElementById('total6').innerHTML) + parseFloat(document.getElementById('total7').innerHTML) +
        parseFloat(document.getElementById('total8').innerHTML) + parseFloat(document.getElementById('total9').innerHTML) +
        parseFloat(document.getElementById('total10').innerHTML) + parseFloat(document.getElementById('total11').innerHTML) +
        parseFloat(document.getElementById('total12').innerHTML) + parseFloat(document.getElementById('total13').innerHTML) +
        parseFloat(document.getElementById('total14').innerHTML) + parseFloat(document.getElementById('total15').innerHTML) +
        parseFloat(document.getElementById('total16').innerHTML) + parseFloat(document.getElementById('total17').innerHTML) +
        parseFloat(document.getElementById('total18').innerHTML) + parseFloat(document.getElementById('total19').innerHTML) +
        parseFloat(document.getElementById('total20').innerHTML) + parseFloat(document.getElementById('total21').innerHTML) +
        parseFloat(document.getElementById('total22').innerHTML) + parseFloat(document.getElementById('total23').innerHTML) +
        parseFloat(document.getElementById('total24').innerHTML) + parseFloat(document.getElementById('total25').innerHTML) +
        parseFloat(document.getElementById('total26').innerHTML) + parseFloat(document.getElementById('total27').innerHTML) +
        parseFloat(document.getElementById('total28').innerHTML) + parseFloat(document.getElementById('total29').innerHTML);
}


function limpiarDatos1() {
    document.getElementById('cantidad1').value = 0;
    document.getElementById('total1').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos2() {
    document.getElementById('cantidad2').value = 0;
    document.getElementById('total2').innerHTML = 0;

    caclularTotal();

}

function limpiarDatos3() {
    document.getElementById('cantidad3').value = 0;
    document.getElementById('total3').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos4() {
    document.getElementById('cantidad4').value = 0;
    document.getElementById('total4').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos5() {
    document.getElementById('cantidad5').value = 0;
    document.getElementById('total5').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos6() {
    document.getElementById('cantidad6').value = 0;
    document.getElementById('total6').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos7() {
    document.getElementById('cantidad7').value = 0;
    document.getElementById('total7').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos8() {
    document.getElementById('cantidad8').value = 0;
    document.getElementById('total8').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos9() {
    document.getElementById('cantidad9').value = 0;
    document.getElementById('total9').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos10() {
    document.getElementById('cantidad10').value = 0;
    document.getElementById('total10').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos11() {
    document.getElementById('cantidad11').value = 0;
    document.getElementById('total11').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos12() {
    document.getElementById('cantidad12').value = 0;
    document.getElementById('total12').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos13() {
    document.getElementById('cantidad13').value = 0;
    document.getElementById('total13').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos14() {
    document.getElementById('cantidad14').value = 0;
    document.getElementById('total14').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos15() {
    document.getElementById('cantidad15').value = 0;
    document.getElementById('total15').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos16() {
    document.getElementById('cantidad16').value = 0;
    document.getElementById('total16').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos17() {
    document.getElementById('cantidad17').value = 0;
    document.getElementById('total17').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos18() {
    document.getElementById('cantidad18').value = 0;
    document.getElementById('total18').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos19() {
    document.getElementById('cantidad19').value = 0;
    document.getElementById('total19').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos20() {
    document.getElementById('cantidad20').value = 0;
    document.getElementById('total20').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos21() {
    document.getElementById('cantidad21').value = 0;
    document.getElementById('total21').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos22() {
    document.getElementById('cantidad22').value = 0;
    document.getElementById('total22').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos23() {
    document.getElementById('cantidad23').value = 0;
    document.getElementById('total23').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos24() {
    document.getElementById('cantidad24').value = 0;
    document.getElementById('total24').innerHTML = 0;

    caclularTotal();


}

function limpiarDatos25() {
    document.getElementById('casilla1').innerHTML = '';
    document.getElementById('nombre1').innerHTML = '';
    document.getElementById('cantidad25').value = 0;
    document.getElementById('precio25').value = 0;
    document.getElementById('total25').innerHTML = 0;
    document.getElementById('cantidad25').disabled = true;
    document.getElementById('precio25').disabled = true;
    caclularTotal();


}

function limpiarDatos26() {
    document.getElementById('casilla2').innerHTML = '';
    document.getElementById('nombre2').innerHTML = '';
    document.getElementById('cantidad26').value = 0;
    document.getElementById('precio26').value = 0;
    document.getElementById('total26').innerHTML = 0;
    document.getElementById('cantidad26').disabled = true;
    document.getElementById('precio26').disabled = true;
    caclularTotal();


}

function limpiarDatos27() {
    document.getElementById('casilla3').innerHTML = '';
    document.getElementById('nombre3').innerHTML = '';
    document.getElementById('cantidad27').value = 0;
    document.getElementById('precio27').value = 0;
    document.getElementById('total27').innerHTML = 0;
    document.getElementById('cantidad27').disabled = true;
    document.getElementById('precio27').disabled = true;
    caclularTotal();


}

function limpiarDatos28() {
    document.getElementById('casilla4').innerHTML = '';
    document.getElementById('nombre4').innerHTML = '';
    document.getElementById('cantidad28').value = 0;
    document.getElementById('precio28').value = 0;
    document.getElementById('total28').innerHTML = 0;
    document.getElementById('cantidad28').disabled = true;
    document.getElementById('precio28').disabled = true;
    caclularTotal();


}

function limpiarDatos29() {
    document.getElementById('casilla5').innerHTML = '';
    document.getElementById('nombre5').innerHTML = '';
    document.getElementById('cantidad29').value = 0;
    document.getElementById('precio29').value = 0;
    document.getElementById('total29').innerHTML = 0;
    document.getElementById('cantidad29').disabled = true;
    document.getElementById('precio29').disabled = true;
    caclularTotal();


}

function correlativo() {
    $.ajax({
        url: '../inventarios_php/bd/servidor.php',
        type: 'GET',
        data: {
            quest: 'obtener_correlativo'
        },
        success: function(res) {
            let lista = JSON.parse(res);
            lista.forEach(lista => {
                sessionStorage.setItem('correlativo', lista.correlativo);

            });
        }
    });
}

function idPedido() {
    $.ajax({
        url: '../inventarios_php/bd/servidor.php',
        type: 'GET',
        data: {
            quest: 'obtener_idPedido'
        },
        success: function(res) {
            let lista = JSON.parse(res);
            lista.forEach(lista => {
                sessionStorage.setItem('id', lista.id);

            });
        }
    });
}

function agregarPedido() {
    calcularTotales();
    caclularTotal();

    var correlativo = sessionStorage.getItem('correlativo');
    var fecha_despacho = document.getElementById('fecha').value;
    var direccion = document.getElementById('direccion').value;
    var observacion = document.getElementById('observacion').value;
    var telefono = document.getElementById('telefono').value;
    var hora = document.getElementById('hora').value;
    var observacion_A = document.getElementById('observacion_A').value;
    var total = document.getElementById('total').innerHTML;
    var idVendedor = document.getElementById('idVendedor').value;
    var idTipoEntrega = document.getElementById('idTipoEntrega').value;
    var idCliente = document.getElementById('idCliente').value;

    console.log(correlativo,
        fecha_despacho,
        direccion,
        observacion,
        telefono,
        hora,
        observacion_A,
        total,
        idVendedor,
        idTipoEntrega,
        idCliente);

    $.ajax({
        url: '../inventarios_php/bd/servidor.php',
        type: 'POST',
        data: {
            quest: 'agregar_pedido_frioso',
            correlativo,
            fecha_despacho,
            direccion,
            observacion,
            telefono,
            hora,
            observacion_A,
            total,
            idVendedor,
            idTipoEntrega,
            idCliente

        },
        success: function(res) {
            if (res == 'Success') {
                Swal.fire(
                    'Agregado con exito',
                    'El pedido ha sido ingresado correctamente! ',
                    'success'
                )
                idPedido();
                agregarDetallePedido(sessionStorage.getItem('id'));
            } else {
                Swal.fire(
                    'Falló',
                    'El pedido que intentó ingresar, no ha sido ingresado correctamente',
                    'error'
                )
                idPedido();
                agregarDetallePedido(sessionStorage.getItem('id'));
            }
        }

    });
}

function agregarDetallePedido(idPedido) {
    var registro1 = "INSERT INTO detallepedidounhesa (cantidad, precio, total, idPedidoUnhesa,idProducto) VALUES (" + document.getElementById('cantidad1').value + "," + 67.50 + "," + document.getElementById('total1').innerHTML + "," + idPedido + ",752)";
    console.log(registro1);
}