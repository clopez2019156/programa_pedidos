<?PHP
include("../bd/inicia_conexion.php");
include("../includes/header.php");
$sql = "select * from Cliente";
$sql = $sql . " where idCliente = " . $_POST["idCliente"];
$resultado = mysqli_query($con, $sql);
while ($fila = mysqli_fetch_array($resultado)) {
    $nombreCliente = $fila["nombre"];
    $codigoCliente = $fila["codigo"];
}
$id = $_SESSION["idUsuario"];
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
    <h1 class="h3 mb-4 text-gray-800 text-center">Agregar Nuevo Pedido</h1>

</div>
<!-- /.container-fluid -->

<!-- Inicia Formulario  -->
    <div>
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row" style="width: 100%" align="center">
                    <div class="col-lg">

                        <div class="p-5">
                            <div class="text-left">
                                <h1 class="h5 text-gray-900 mb-4 text-center">Por favor llene el siguiente formulario:</h1>
                            </div>
                            <form>
                                <div class="col-sm-10">

                                    <h2 class="h6 text-gray-700 mb-4" align="left">Datos del cliente:</h2>
                                    <input type="hidden" id="idCliente" value="<?= $_POST["idCliente"]; ?>">
                                    <input type="hidden" id="idVendedor" value="<?= $id ?>">
                                    <label>Codigo:</label>
                                    <input type="text" class="form-control form-control-user" id="codigo" name="codigo" value="<?= $codigoCliente; ?>" disabled required>
                                    <br>
                                    <label>Cliente:</label>
                                    <input type="text" class="form-control form-control-user" id="cliente" name="cliente" value="<?= $nombreCliente; ?>" disabled required>
                                    <br>
                                    <label>Tipo de entrega:</label>
                                    <select class="browser-default custom-select" id="idTipoEntrega" name="idTipoEntrega">
                                        <?php
                                        $sql = "select * from TipoEntrega";
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
                                    <input type="text" class="form-control form-control-user" id="direccion" name="direccion" placeholder="Dirección de entrega del pedido" required>
                                    <br>
                                    <input type="number" class="form-control form-control-user" id="telefono" name="telefono" placeholder="Teléfono de contacto" required>
                                    <br>
                                    <label>Fecha de despacho:</label>
                                    <input type="date" class="form-control form-control-user" id="fecha" name="fecha" required>
                                    <br>
                                    <label>Hora de entrega:</label>
                                    <input type="time" class="form-control form-control-user" id="hora" name="hora" required>
                                    <br>
                                    <input type="text" class="form-control form-control-user" id="observaciones" name="observaciones" placeholder="Observaciones">
                                    

                                    <div>
                                    <div class="p-5" style="overflow-x:auto;">
                                </div>
                                <div>
                                    <table class="table table-striped table-bordered nowrap" id="dataTable" width="100%" align="center" cellspacing="0" data-role="datatable" data-info="false">
                                        <tbody>
                                            <thead>
                                            <tr>
                                                <th>Código del Producto</th>
                                                <th>Nombre del producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>Total</th>
                                                <th>Opciones</th>
                                            </tr>
                                            </thead>        
                                            <tr>
                                                <td value="752">PTPPFR001</td>
                                                <td>Fri-Oso Fardo Uva 150 Barras</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="738">PTPPFR002</td>
                                                <td>Fri-Oso Fardo Naranja 150 Barras</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="722">PTPPFR003</td>
                                                <td>Fri-Oso Fardo Fresa 150 Barras</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="715">PTPPFR005</td>
                                                <td>Fri-Oso Fardo Chicle 150 Barras</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="741">PTPPFR006</td>
                                                <td>Fri-Oso Fardo Piña 150 Barras</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="748">PTPPFR015</td>
                                                <td>Fri-Oso Fardo Tamarindo 150 Barras</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="732">PTPPFR016</td>
                                                <td>Fri-Oso Fardo Manzana 150 Barras</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="736">PTPPFR039</td>
                                                <td>Fri-Oso Fardo Maracuya 150 Barras.</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="710">PTPPFR041</td>
                                                <td>Fri-Oso Fardo 15 Unidades (10 barras Surtidas)</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="751">PTPPFR044</td>
                                                <td>Fri-Oso Fardo Tamarindo-Enchilado 150 Barras</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                            
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="712">PTPPFR051</td>
                                                <td>Fri-Oso Fardo 15*Tenpack Sabores-Temporada (10 barras Surtidas)</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="704">PTPPFR053</td>
                                                <td>FRI-OSO Canasta Naranja 300 barras</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="700">PTPPFR054</td>
                                                <td>FRI-OSO Canasta Fresa 300 barras</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="697">PTPPFR055</td>
                                                <td>FRI-OSO Canasta Chicle 300 barras</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="709">PTPPFR056</td>
                                                <td>FRI-OSO Canasta Uva 300 barras.</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="702">PTPPFR057</td>
                                                <td>FRI-OSO Canasta Manzana 300 barras</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="705">PTPPFR058</td>
                                                <td>FRI-OSO Canasta Piña 300 barras</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="703">PTPPFR060</td>
                                                <td>Fri-Oso Canasta Maracuya 300 Barras</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="707">PTPPFR062</td>
                                                <td>Fri-Oso Canasta Tamarindo-Enchilado 300 Barras</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="699">PTPPFR063</td>
                                                <td>Fri-Oso Canasta Cola 300 Barras.</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="698">PTPPFR064</td>
                                                <td>Fri-Oso Canasta Coco-Fresa 300 Barras.</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="730">PTPPFR067</td>
                                                <td>Fri-Oso Fardo Limon-Pepita 150 Barras.</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                            
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="1277">PTPPGE044</td>
                                                <td>Gel-Oso Fardo 40 Unidades (10 barras Surtidas)PROMOCION.</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td>Q120.00</td>
                                                <td></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td value="1279">PTPPGE045</td>
                                                <td>Geloso Surtido 150 unidades</td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px" ></td>
                                                <td>Q67.50</td>
                                                <td></td>
                                            
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="idProducto"><form name="datos" method="post" action="AddPedidoPlantilla.php" onsubmit="return verifica_codigo(this);">
                                                    <div class="p-3">
                                                        <select class="idCliente browser-default custom-select" name="idCliente"></select>
                                                    </div>
                                                    <script type="text/javascript">
                                                        $('.idCliente').select2({
                                                            placeholder: 'Codigo del cliente',
                                                            ajax: {
                                                                url: 'producto.php',
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
                                                </form></td>
                                                <td></td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td><form name="datos" method="post" action="AddPedidoPlantilla.php" onsubmit="return verifica_codigo(this);">
                                                    <div class="p-3">
                                                        <select class="idCliente browser-default custom-select" name="idCliente"></select>
                                                    </div>
                                                    <script type="text/javascript">
                                                        $('.idCliente').select2({
                                                            placeholder: 'Codigo del cliente',
                                                            ajax: {
                                                                url: 'producto.php',
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
                                                </form></td>
                                                <td></td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td><form name="datos" method="post" action="AddPedidoPlantilla.php" onsubmit="return verifica_codigo(this);">
                                                    <div class="p-3">
                                                        <select class="idCliente browser-default custom-select" name="idCliente"></select>
                                                    </div>
                                                    <script type="text/javascript">
                                                        $('.idCliente').select2({
                                                            placeholder: 'Codigo del cliente',
                                                            ajax: {
                                                                url: 'producto.php',
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
                                                </form></td>
                                                <td></td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td><form name="datos" method="post" action="AddPedidoPlantilla.php" onsubmit="return verifica_codigo(this);">
                                                    <div class="p-3">
                                                        <select class="idCliente browser-default custom-select" name="idCliente"></select>
                                                    </div>
                                                    <script type="text/javascript">
                                                        $('.idCliente').select2({
                                                            placeholder: 'Codigo del cliente',
                                                            ajax: {
                                                                url: 'producto.php',
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
                                                </form></td>
                                                <td></td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>
                                            <tr>
                                                <td><form name="datos" method="post" action="AddPedidoPlantilla.php" onsubmit="return verifica_codigo(this);">
                                                    <div class="p-3">
                                                        <select class="idCliente browser-default custom-select" name="idCliente"></select>
                                                    </div>
                                                    <script type="text/javascript">
                                                        $('.idCliente').select2({
                                                            placeholder: 'Codigo del cliente',
                                                            ajax: {
                                                                url: 'producto.php',
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
                                                </form></select></td>
                                                <td></td>
                                                <td><input type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td></td>
                                                <td></td>
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px"></i></td>
                                            </tr>

                                        </tbody>
                                            
                                        
                                    </table>

                                    <br>
                                    <button type="button" class="btn btn-success" style="margin-right: 30px">Calcular Total</button>
                                    <button type="button" class="btn btn-primary">Enviar Pedido</button>
                                    
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?PHP
    //prueba
    include("../includes/footersindatatable.php");
    include("../bd/fin_conexion.php");
?>
<script src="../js/pedidoFrioso.js"></script>