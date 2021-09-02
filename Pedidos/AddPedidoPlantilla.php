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
                                    <input type="text" class="form-control form-control-user" id="observacion" name="observacion" placeholder="Observaciones">
                                    <br>
                                    <input type="text" class="form-control form-control-user" id="observacion_A" name="observacion_A" placeholder="Observaciones Adicionales">

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
                                                <td id="codigo1" value="752">PTPPFR001</td>
                                                <td id="nombreP1">Fri-Oso Fardo Uva 150 Barras</td>
                                                <td><input id="cantidad1" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio1" value="67.50">Q67.50</td>
                                                <td id="total1"></td>
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos1()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="codigo2"  value="738">PTPPFR002</td>
                                                <td id="nombreP2">Fri-Oso Fardo Naranja 150 Barras</td>
                                                <td><input id="cantidad2" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio2" value="67.50" value="67.50">Q67.50</td>
                                                <td id="total2"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos2()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="codigo3"  value="722">PTPPFR003</td>
                                                <td  id="nombreP3">Fri-Oso Fardo Fresa 150 Barras</td>
                                                <td><input id="cantidad3" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio3" value="67.50">Q67.50</td>
                                                <td id="total3"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos3()"></i></td>
                                            </tr>
                                            <tr>
                                                <td  id="codigo4" value="715">PTPPFR005</td>
                                                <td id="nombreP4">Fri-Oso Fardo Chicle 150 Barras</td>
                                                <td><input id="cantidad4" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio4" value="67.50">Q67.50</td>
                                                <td id="total4"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos4()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="codigo5"  value="741">PTPPFR006</td>
                                                <td id="nombreP5">Fri-Oso Fardo Piña 150 Barras</td>
                                                <td><input  id="cantidad5" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio5" value="67.50">Q67.50</td>
                                                <td id="total5"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos5()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="codigo6"  value="748">PTPPFR015</td>
                                                <td id="nombreP6">Fri-Oso Fardo Tamarindo 150 Barras</td>
                                                <td><input id="cantidad6" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio6" value="67.50">Q67.50</td>
                                                <td id="total6"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos6()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="codigo7"  value="732">PTPPFR016</td>
                                                <td id="nombreP7">Fri-Oso Fardo Manzana 150 Barras</td>
                                                <td><input id="cantidad7" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio7" value="67.50">Q67.50</td>
                                                <td id="total7"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos7()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="codigo8"  value="736">PTPPFR039</td>
                                                <td id="nombreP8">Fri-Oso Fardo Maracuya 150 Barras.</td>
                                                <td><input id="cantidad8" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio8" value="67.50">Q67.50</td>
                                                <td id="total8"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos8()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="codigo9"  value="710">PTPPFR041</td>
                                                <td id="nombreP9">Fri-Oso Fardo 15 Unidades (10 barras Surtidas)</td>
                                                <td><input id="cantidad9" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio9" value="67.50">Q67.50</td>
                                                <td  id="total9"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos9()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="codigo10"  value="751">PTPPFR044</td>
                                                <td id="nombreP10">Fri-Oso Fardo Tamarindo-Enchilado 150 Barras</td>
                                                <td><input id="cantidad10" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio10" value="67.50">Q67.50</td>
                                                <td id="total10"></td>
                                            
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos10()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="codigo11"  value="712">PTPPFR051</td>
                                                <td id="nombreP11">Fri-Oso Fardo 15*Tenpack Sabores-Temporada (10 barras Surtidas)</td>
                                                <td><input id="cantidad11" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio11" value="67.50">Q67.50</td>
                                                <td id="total11"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos11()"></i></td>
                                            </tr>
                                            <tr>
                                                <td  id="codigo12" value="704">PTPPFR053</td>
                                                <td id="nombreP12">FRI-OSO Canasta Naranja 300 barras</td>
                                                <td><input id="cantidad12" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio12" value="67.50">Q67.50</td>
                                                <td id="total12"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos12()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="codigo13"  value="700">PTPPFR054</td>
                                                <td id="nombreP13">FRI-OSO Canasta Fresa 300 barras</td>
                                                <td><input id="cantidad13" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio13" value="67.50">Q67.50</td>
                                                <td id="total13"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos13()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="codigo14"  value="697">PTPPFR055</td>
                                                <td id="nombreP14">FRI-OSO Canasta Chicle 300 barras</td>
                                                <td><input id="cantidad14" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio14" value="67.50">Q67.50</td>
                                                <td id="total14"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos14()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="codigo15"  value="709">PTPPFR056</td>
                                                <td id="nombreP15">FRI-OSO Canasta Uva 300 barras.</td>
                                                <td><input id="cantidad15" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio15" value="67.50">Q67.50</td>
                                                <td id="total15"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos15()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="codigo16"  value="702">PTPPFR057</td>
                                                <td id="nombreP16">FRI-OSO Canasta Manzana 300 barras</td>
                                                <td><input id="cantidad16" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio16" value="67.50">Q67.50</td>
                                                <td id="total16"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos16()"></i></td>
                                            </tr>
                                            <tr>
                                                <td  id="codigo17" value="705">PTPPFR058</td>
                                                <td id="nombreP17">FRI-OSO Canasta Piña 300 barras</td>
                                                <td><input id="cantidad17" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio17" value="67.50">Q67.50</td>
                                                <td id="total17"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos17()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="codigo18"  value="703">PTPPFR060</td>
                                                <td id="nombreP18">Fri-Oso Canasta Maracuya 300 Barras</td>
                                                <td><input id="cantidad18" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio18" value="67.50">Q67.50</td>
                                                <td id="total18"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos18()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="codigo19"  value="707">PTPPFR062</td>
                                                <td id="nombreP19">Fri-Oso Canasta Tamarindo-Enchilado 300 Barras</td>
                                                <td><input id="cantidad19" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio19" value="67.50">Q67.50</td>
                                                <td id="total19"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos19()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="codigo20"  value="699">PTPPFR063</td>
                                                <td id="nombreP20">Fri-Oso Canasta Cola 300 Barras.</td>
                                                <td><input id="cantidad20" value="0" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio20" value="67.50">Q67.50</td>
                                                <td id="total20"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos20()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="codigo21"  value="698">PTPPFR064</td>
                                                <td id="nombreP21">Fri-Oso Canasta Coco-Fresa 300 Barras.</td>
                                                <td><input id="cantidad21" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio21" value="67.50">Q67.50</td>
                                                <td id="total21"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos21()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="codigo22"  value="730">PTPPFR067</td>
                                                <td id="nombreP22">Fri-Oso Fardo Limon-Pepita 150 Barras.</td>
                                                <td><input id="cantidad22" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio22" value="67.50">Q67.50</td>
                                                <td id="total22"></td>
                                            
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos22()"></i></td>
                                            </tr>
                                            <tr>
                                                <td  id="codigo23" value="1277">PTPPGE044</td>
                                                <td id="nombreP23">Gel-Oso Fardo 40 Unidades (10 barras Surtidas)PROMOCION.</td>
                                                <td><input id="cantidad23" value="0" type="number" placeholder="0" size=10 style="width:55px"></td>
                                                <td id="precio23">Q120.00</td>
                                                <td id="total23"></td>
                                                
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos23()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id="codigo24"  value="1279">PTPPGE045</td>
                                                <td id="nombreP24">Geloso Surtido 150 unidades</td>
                                                <td><input id="cantidad24" value="0" type="number" placeholder="0" size=10 style="width:55px" ></td>
                                                <td id="precio24" value="67.50">Q67.50</td>
                                                <td id="total24"></td>
                                            
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos24()"></i></td>
                                            </tr>
                                            <tr>
                                                <td id><form name="datos" method="post" action="AddPedidoPlantilla.php" onsubmit="return verifica_codigo(this);">
                                                    <div class="p-3">
                                                        <select id="casilla1" onchange="setearDatos1()" class="idCliente browser-default custom-select" name="idCliente"></selecti>
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
                                                <td id="nombre1"></td>
                                                <td><input id="cantidad25" value="0" type="number" placeholder="0" size=10 style="width:55px" disabled></td>
                                                <td>Q<input id="precio25" type="number" placeholder="0" size=10 style="width:54px" disabled></td>
                                                <td id="total25"></td>
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos25()"></i></td>
                                            </tr>
                                            <tr>
                                                <td><form name="datos" method="post" action="AddPedidoPlantilla.php" onsubmit="return verifica_codigo(this);">
                                                    <div class="p-3">
                                                        <select id="casilla2" onchange="setearDatos2()" class="idCliente browser-default custom-select" name="idCliente"></select>
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
                                                <td id="nombre2"></td>
                                                <td><input id="cantidad26" value="0" type="number" placeholder="0" size=10 style="width:55px" disabled></td>
                                                <td>Q<input id="precio26" type="number" placeholder="0" size=10 style="width:54px" disabled></td>
                                                <td id="total26"></td>
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos26()"></i></td>
                                            </tr>
                                            <tr>
                                                <td><form name="datos" method="post" action="AddPedidoPlantilla.php" onsubmit="return verifica_codigo(this);">
                                                    <div class="p-3">
                                                        <select id="casilla3" onchange="setearDatos3()" class="idCliente browser-default custom-select" name="idCliente"></select>
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
                                                <td id="nombre3"></td>
                                                <td><input id="cantidad27" value="0" type="number" placeholder="0" size=10 style="width:55px" disabled></td>
                                                <td>Q<input id="precio27" type="number" placeholder="0" size=10 style="width:54px" disabled></td>
                                                <td id="total27"></td>
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos27()"></i></td>
                                            </tr>
                                            <tr>
                                                <td><form name="datos" method="post" action="AddPedidoPlantilla.php" onsubmit="return verifica_codigo(this);">
                                                    <div class="p-3">
                                                        <select id="casilla4" onchange="setearDatos4()" class="idCliente browser-default custom-select" name="idCliente"></select>
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
                                                <td id="nombre4"></td>
                                                <td><input id="cantidad28" value="0" type="number" placeholder="0" size=10 style="width:55px" disabled></td>
                                                <td>Q<input id="precio28" type="number" placeholder="0" size=10 style="width:54px" disabled></td>
                                                <td id="total28"></td>
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos28()"></i></td>
                                            </tr>
                                            <tr><td>
                                                <form name="datos" method="post" action="AddPedidoPlantilla.php" onsubmit="return verifica_codigo(this);">
                                                    <div class="p-3">
                                                        <select onchange="setearDatos5()" id="casilla5" class="idCliente browser-default custom-select" name="idCliente"></select>
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
                                                </form>
                                                </td>
                                                <td id="nombre5"></td>
                                                <td><input id="cantidad29" value="0" type="number" placeholder="0" size=10 style="width:55px" disabled></td>
                                                <td>Q<input id="precio29" type="number" placeholder="0" size=10 style="width:54px" disabled></td>
                                                <td id="total29"></td>
                                                <td><i class="fas fa-trash-alt" style="margin-left: 25px" onclick="limpiarDatos29()" ></i></td>
                                            </tr>
                
                                        </tbody>
                                            
                                        
                                    </table>
                                    <br>
                                    <table class="table table-striped table-bordered nowrap" id="dataTable" width="100%" align="center" cellspacing="0" data-role="datatable" data-info="false">
                                        <thead>
                                            <tr>
                                                <th>Productos Pedidos</th>
                                                <th>Total General</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td id="cantidad"></td>
                                                <td id="total"></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <button type="button" class="btn btn-success" style="margin-right: 30px" onclick="calcularTotales()">Calcular Total</button>
                                    <button type="button" class="btn btn-primary" onclick="agregarPedido()">Enviar Pedido</button>
                                    
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
