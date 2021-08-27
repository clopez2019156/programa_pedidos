<?PHP
include("../bd/inicia_conexion.php");
include("../includes/header.php");

$sql = "select p.idPedidoUnhesa ,p.idTipoEntrega, p.direccion, p.telefono, DATE(p.fecha_despacho) as fecha_despacho, DATE(p.fecha_emision) as fecha_emision, p.hora, p.observacion,p.total, p.observacion_a, c.nombre as cliente, c.codigo as codigo from pedidounhesa p inner join usuario u on p.idvendedor = u.idusuario inner join tipoentrega t on p.idtipoentrega = t.idtipoentrega inner join cliente c on p.idcliente = c.idcliente inner join estado e on p.idestado = e.idestado";
$sql = $sql . " where p.idpedidounhesa = " . $_POST["idPedido2"];
$_SESSION["id_del_pedido"] = $_POST["idPedido2"];

$resultado = mysqli_query($con, $sql);
while ($fila = mysqli_fetch_array($resultado)) {
  $nombreCliente = $fila["cliente"];
  $codigoCliente = $fila["codigo"];
  $idTipoEntrega = $fila["idTipoEntrega"];
  $direccion = $fila["direccion"];
  $telefono = $fila["telefono"];
  $fecha_emision = $fila["fecha_emision"];
  $fecha_despacho = $fila["fecha_despacho"];
  $hora = $fila["hora"];
  $observacion = $fila["observacion"];
  $observacion_a = $fila["observacion_a"];
  $total = $fila["total"];
  $idPedidoUnhesaRep = $fila["idPedidoUnhesa"];
}
$id = $_SESSION["idUsuario"];

$sqlUsuario = "SELECT * FROM usuario WHERE idUsuario = " . $id;

$resultadoUsuario = mysqli_query($con, $sqlUsuario);
while ($fila = mysqli_fetch_array($resultadoUsuario)) {
  $nombreVendedor = $fila["nombre"];
}


?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<style>
  table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
  }

  th,
  td {
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2
  }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800 text-center">Repetir pedido # <?php echo $_POST["idPedido2"]; ?></h1>

</div>
<!-- /.container-fluid -->

<!-- Inicia Formulario  -->
<div>
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row" style="width:'100%'" align="center">
        <div class="col-lg">
          <div class="p-5">
            <div class="text-left">
              <h1 class="h5 text-gray-900 mb-4 text-center ">Detalles del pedido</h1>
            </div>
            <form>
              <div class="col-sm-10">
                <h2 class="h6 text-gray-700 mb-4" align="left">Datos del cliente:</h2>
                
                
                <input type="hidden" id="idVendedor" value="<?= $id ?>">

                <br>
                <label>Codigo:</label>
                <input type="text" class="form-control form-control-user" id="codigo" name="codigo" value="<?= $codigoCliente; ?>" disabled required>
                <br>
                <label>Cliente:</label>
                <input type="text" class="form-control form-control-user" id="cliente" name="cliente" value="<?= $nombreCliente; ?>" disabled required>
                <br>
                <br>
                <label>Vendedor:</label>
                <input type="text" class="form-control form-control-user" id="vendedor" name="vendedor" value="<?= $nombreVendedor; ?>" required>
                <br>
                <label>Tipo de entrega:</label>
                <select class="browser-default custom-select" id="idTipoEntrega" name="idTipoEntrega" >
                  <?php
                  $sql = "select  *from TipoEntrega";
                  $resultado = mysqli_query($con, $sql);
                  while ($fila = mysqli_fetch_array($resultado)) {
                    $seleccionado = "";
                    if ($idTipoEntrega == $fila["idTipoEntrega"]) {
                      $seleccionado = "selected";
                    }
                    echo "<option value='" . $fila["idTipoEntrega"] . "' " . $seleccionado . ">" . $fila["nombre"] . "</option>";
                  }
                  ?>
                </select>
                <br>
                <br>
                <label>Dirección de despacho:</label>
                <input type="text" class="form-control form-control-user" id="direccion" name="direccion" value="<?= $direccion; ?>"  required>
                <br>
                <label>Teléfono:</label>
                <input type="text" class="form-control form-control-user" id="telefono" name="telefono" value="<?= $telefono; ?>"  required>
                <br>
                <label>Fecha de despacho:</label>
                <input type="date" class="form-control form-control-user" id="fecha" name="fecha" value="<?= $fecha_despacho; ?>" required>
                <br>
                <label>Hora de entrega:</label>
                <input type="time" class="form-control form-control-user" id="hora" name="hora" value="<?= $hora; ?>" required>
                <br>
                <label>Observaciones:</label>
                <input type="text" class="form-control form-control-user" id="observaciones" name="observaciones" value="<?= $observacion; ?>" >
                <br>

                <hr>
                <div class="row">
                  <div class="col 1">
                  <h2 class="h6 text-gray-700 mb-4" align="left">Detalles del pedido:</h2>
                  </div>
                </div>
                <br><br>
                <label>Agregar un detalle nuevo al pedido predeterminado:</label>
                                <br> <br>
                                <select class="idProducto browser-default custom-select" id="idProducto" name="idProducto"></select>
                                <script type="text/javascript">
                                    $('.idProducto').select2({
                                        placeholder: 'Codigo del Producto',
                                        ajax: {
                                            url: 'productos.php',
                                            dataType: 'json',
                                            delay: 250,
                                            processResults: function(data) {
                                                return {
                                                    results: data
                                                };
                                            },
                                            cache: true
                                        }
                                    });
                                </script>
                                <br>
                                <br>
                                <label>Cantidad:</label>
                                <input type="number" id="cantidad" min="0" value=1 class="form-control form-control-user" name="cantidad" placeholder="cantidad" required>
                                <br>
                                <label>Precio:</label>
                                <input type="number" id="precio" min="0" value=1 class="form-control form-control-user" name="precio" placeholder="cantidad" required>
                                <br>
                                <input type="text" class="form-control form-control-user" id="observacionesProducto" name="observacionesProducto" placeholder="Observaciones">
                                <br>
                                <button class="btn btn-warning" type="button" onclick="guardarElemento()">Ingresar Detalle</button>
                            </div>
                    </div>
                    <div class="p-5" style="overflow-x:auto;">
                        <table class="table table-striped table-bordered nowrap" id="dataTable1" width="100%" align="center" cellspacing="0" data-role="datatable" data-info="false">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                    <th>Observaciones</th>
                                    <th><i class="fas fa-trash-alt"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                              <!-- Los detalles del pedido, traerlos y cargarlos en la tabla  -->
                            <?php
                            $detalles = "SELECT concat(r.codigo,'-',r.nombre) as Producto, d.cantidad as Cantidad, d.precio as Precio,d.total as Total, d.observaciones as Observaciones
                            FROM detallepedidounhesa d inner join pedidounhesa p on d.idPedidoUnhesa = p.idPedidoUnhesa 
                            inner join producto r on d.idProducto = r.idProducto WHERE d.idPedidoUnhesa = $idPedidoUnhesaRep;";

                            $resultadorep = mysqli_query($con, $detalles);
                            ?>
                                <script>
                                  $(document).ready(function () {
                                    <?php
                                    while ($fila = mysqli_fetch_array($resultadorep)) {
                                    echo 'myFunction('.$fila["Cantidad"].', '.$fila["Precio"].', "'.$fila["Observaciones"].'", "'.$fila["Producto"].'", 0);';
                                    }
                                    ?>
                                  });
                                </script>
                            </tbody>
                        </table>
                        <br>
                      </form>
              </div>
                    <div class="container col-sm-10">
                      <!-- INGRESAR UN NUEVO DETALLE AL PEDIDO -->
                      <label>Observaciones Adicionales:</label>
                      <input type="text" class="form-control form-control-user " id="observacion_a" name="observacion_a" value="<?= $observacion_a; ?>" >
                      <br>
                      <form action="../inventarios_php/bd/servidor.php" method="POST" enctype="multipart/form-data">
                          <label class="col-sm-2 control-label">Foto del recibo</label>
                          <input type="file" class="form-control-file" id="imagen" name="imagen">
                          <button type="submit" name="foto_pedido" id="foto_pedido" hidden class="btn btn-primary btn-block">Guardar</button>
                      </form>
                      <br>
                      <br>
                      <input id="btn_enviar" type="button" onclick="myFunction2()" class="btn btn-primary" value="Ingresar Pedido">
                      <br><br><br><br><br>
                    </div>  
                </div>
              </div>
          </div>
        </div>
      </div>
      
      
      


      <!-- Termina Formulario  -->
      <!-- End of Main Content -->
    <script>
        var elementos = new Array();
        var aux = 1;
        totalidad = 0;
        function guardarElemento(){
          myFunction(document.getElementById('cantidad').value, document.getElementById('precio').value, document.getElementById('observacionesProducto').value, document.getElementById('idProducto'), 1);
        }
        function myFunction(cantidadF, precioF, observacionF, producto, opcionI) {
            var sel = producto;
            if (opcionI == 1) {
              var opt = sel.options[sel.selectedIndex];
            }
            if (sel.value == "" || cantidadF == "" || cantidadF == "0" ||
                precioF == "" || precioF == "0") {
                Swal.fire({
                    icon: 'error',
                    title: 'Datos Inválidos',
                    text: 'Los datos que ha ingresado son inválidos, asegurese de haber escogido un código de producto',
                    footer: '<a href></a>'
                });
                return false;
            }
            var table = document.getElementById("dataTable1").getElementsByTagName('tbody')[0];
            var row = table.insertRow(0);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            if (opcionI == 1) {
              cell1.innerHTML = opt.text;
            }else{
              cell1.innerHTML = producto;
            }
            cell2.innerHTML = cantidadF;
            cell3.innerHTML = precioF;
            cell4.innerHTML = (cantidadF * precioF);
            cell5.innerHTML = observacionF;
            cell6.innerHTML = '<input type="button" class="btn btn-danger" value="Eliminar componente" onclick="deleteRow(this, ' + aux + ', ' + (document.getElementById('cantidad').value * document.getElementById('precio').value) + ')"/>';
            elementos.push({
                idelemento: aux,
                idProducto: sel.value,
                cantidad: cantidadF,
                precio: precioF,
                total: (cantidadF * precioF),
                observacionesProducto: observacionF,
            });
            totalidad = totalidad + (document.getElementById('cantidad').value * document.getElementById('precio').value);
            aux++;
            console.log(totalidad);
        }
        function myFunction2() {
            if (document.getElementById("direccion").value == "" || document.getElementById("telefono").value == "" ||
                document.getElementById("fecha").value == "" || document.getElementById("hora").value == "") {

                Swal.fire({
                    icon: 'error',
                    title: 'Datos Inválidos',
                    text: 'Los datos que ha ingresado son inválidos, asegurese de haber escogido un código de producto',
                    footer: '<a href></a>'
                });
                return false;
            }
            var urlUsers = 'Pedido_i.php';
            var data = new FormData();
            data.append("fechaDespacho", document.getElementById("fecha").value);
            data.append("direccion", document.getElementById("direccion").value);
            data.append("telefono", document.getElementById("telefono").value);
            data.append("observacion", document.getElementById("observaciones").value);
            data.append("hora", document.getElementById("hora").value);
            data.append("observacionesA", document.getElementById("observacionesA").value);
            data.append("total", totalidad);
            data.append("idVendedor", document.getElementById("idVendedor").value);
            data.append("idTipoEntrega", document.getElementById("idTipoEntrega").value);
            data.append("idCliente", document.getElementById("idCliente").value);
            data.append("tablita", JSON.stringify(elementos));
            axios.post(urlUsers, data).then(response => {
                console.log(response.data);
                if (response.status == 200) {
                    if (response.data == "funciono") {
                        document.getElementById("foto_pedido").click();
                    }
                }
            });
        }

        function deleteRow(btn, aux, total2) {
            var index = elementos.map(function(e) {
                return e.idelemento;
            }).indexOf(aux);
            if (index > -1) {
                elementos.splice(index, 1);
            }
            var row = btn.parentNode.parentNode;
            //console.log(row);
            row.parentNode.removeChild(row);
            totalidad = totalidad - total2;
            console.log(elementos);
            console.log(totalidad);
        }
    </script>
    
      <?PHP
      include("../includes/footer.php");
      include("../bd/fin_conexion.php");
      ?>