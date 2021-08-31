$(document).ready(function() {

});

function setearDatos1() {
    var id = document.getElementById('casilla1').value;

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


    document.getElementById('total').innerHTML = parseInt(document.getElementById('total1').innerHTML) +
        parseInt(document.getElementById('total2').innerHTML) + parseInt(document.getElementById('total3').innerHTML) +
        parseInt(document.getElementById('total4').innerHTML) + parseInt(document.getElementById('total5').innerHTML) +
        parseInt(document.getElementById('total6').innerHTML) + parseInt(document.getElementById('total7').innerHTML) +
        parseInt(document.getElementById('total8').innerHTML) + parseInt(document.getElementById('total9').innerHTML) +
        parseInt(document.getElementById('total10').innerHTML) + parseInt(document.getElementById('total11').innerHTML) +
        parseInt(document.getElementById('total12').innerHTML) + parseInt(document.getElementById('total13').innerHTML) +
        parseInt(document.getElementById('total14').innerHTML) + parseInt(document.getElementById('total15').innerHTML) +
        parseInt(document.getElementById('total16').innerHTML) + parseInt(document.getElementById('total17').innerHTML) +
        parseInt(document.getElementById('total18').innerHTML) + parseInt(document.getElementById('total19').innerHTML) +
        parseInt(document.getElementById('total20').innerHTML) + parseInt(document.getElementById('total21').innerHTML) +
        parseInt(document.getElementById('total22').innerHTML) + parseInt(document.getElementById('total23').innerHTML) +
        parseInt(document.getElementById('total24').innerHTML) + parseInt(document.getElementById('total25').innerHTML) +
        parseInt(document.getElementById('total26').innerHTML) + parseInt(document.getElementById('total27').innerHTML) +
        parseInt(document.getElementById('total28').innerHTML) + parseInt(document.getElementById('total29').innerHTML);

    console.log(document.getElementById('total').innerHTML);
}