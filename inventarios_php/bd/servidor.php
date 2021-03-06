<?php
date_default_timezone_set('UTC');
date_default_timezone_set("America/Guatemala");
$hoy = date("Y") . "-" . date("m") . "-" . date("d");

// ---------------- SQL SERVER -------------------- //
$dsn = "Driver={SQL Server};Server=192.168.0.7;Port=1433;Database=tutorial2020";
$data_source = 'zzzz';
$user = 'sa';
$password = 'grueconsa';
// Connect to the data source and get a handle for that connection.

$conn = odbc_connect($dsn, $user, $password);
if (!$conn) {
    if (phpversion() < '4.0') {
        exit("Connection Failed: . $php_errormsg");
    } else {
        exit("Connection Failed:" . odbc_errormsg());
    }
}
// ---------------- MYSQL -------------------- //
$con = mysqli_connect("192.168.0.83", "admin", "");
if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}
mysqli_select_db($con, "facturacion");

// ---------------- CONSULTAS -------------------- //
if (isset($_GET)) {
    if (isset($_GET["quest"])) {

        // TEST SQL SERVER
        if ($_GET["quest"] == 'test') {
            $sql = "SELECT * FROM facturas";
            $result = odbc_exec($conn, $sql);

            if (!$result) {
                die('Query Falló ' . odbc_error($conn));
            }
            
            if (odbc_num_rows($result) > 0) {
                $json = array();
                while ($row = odbc_fetch_array($result)) {
                    $json[] = array(
                        'id' => $row["id"],
                        'factura' => $row["factura"],
                        'saldo' => $row["saldo"]
                    );
                }
                $json_string = json_encode($json);
                echo $json_string;
            } else {
                echo 'No';
            }
        }

        // NOMBRE CLIENTE SQL SERVER
        if ($_GET["quest"] == 'nombre_cliente') {
            $sql = "SELECT * FROM cliente WHERE idCliente = '" . $_GET["codigo"] . "'";
            // echo $sql;
            $result = mysqli_query($con, $sql);

            if (!$result) {
                die('Query Falló ' . mysqli_error($con));
            }

            if (mysqli_num_rows($result) > 0) {
                $json = array();
                while ($row = mysqli_fetch_array($result)) {
                    $json[] = array(
                        'id' => $row["idCliente"],
                        'nombre' => $row["nombre"],
                        'codigo' => $row["codigo"]
                    );
                }
                $json_string = json_encode($json);
                echo $json_string;
            } else {
                echo 'No';
            }
        }

        // NOMBRE CLIENTE SQL SERVER
        if ($_GET["quest"] == 'empresa_usuario') {
            $sql = "SELECT * FROM usuario WHERE idUsuario = '" . $_GET["id_usuario"] . "'";
            // echo $sql;
            $result = mysqli_query($con, $sql);

            if (!$result) {
                die('Query Falló ' . mysqli_error($con));
            }

            if (mysqli_num_rows($result) > 0) {
                $json = array();
                while ($row = mysqli_fetch_array($result)) {
                    $json[] = array(
                        'id_empresa' => $row["idEmpresa"]
                    );
                }
                $json_string = json_encode($json);
                echo $json_string;
            } else {
                echo 'No';
            }
        }

        // ÚLTIMO RECIBO GUARDADO
        if ($_GET["quest"] == 'ultimo_recibo') {
            $sql = "SELECT MAX(id) AS id FROM recibo";
            // echo $sql;
            $result = mysqli_query($con, $sql);

            if (!$result) {
                die('Query Falló ' . mysqli_error($con));
            }

            if (mysqli_num_rows($result) > 0) {
                $json = array();
                while ($row = mysqli_fetch_array($result)) {
                    $json[] = array(
                        'id_recibo' => $row["id"]
                    );
                }
                $json_string = json_encode($json);
                echo $json_string;
            } else {
                echo 'No';
            }
        }

        // DETALLES DE RECIBO
        if ($_GET["quest"] == 'detalle_recibo') {
            $sql = "SELECT * FROM `detallerecibo` WHERE idRecibo = " . $_GET["id_recibo"];
            // echo $sql;
            $result = mysqli_query($con, $sql);

            if (!$result) {
                die('Query Falló ' . mysqli_error($con));
            }

            if (mysqli_num_rows($result) > 0) {
                $json = array();
                while ($row = mysqli_fetch_array($result)) {
                    $json[] = array(
                        'id' => $row["id"],
                        'id_recibo' => $row["idRecibo"],
                        'factura' => $row["factura"],
                        'saldo_a_cobrar' => $row["saldo_a_cobrar"],
                        'abono' => $row["abono"],
                        'saldo' => $row["saldo"]
                    );
                }
                $json_string = json_encode($json);
                echo $json_string;
            } else {
                echo 'No';
            }
        }

        // FACTURAS SQL SERVER
        if ($_GET["quest"] == 'facturas_cliente') {
            // $sql = "SELECT * FROM facturas WHERE estado = 'activo' AND codigo_cliente = '" . $_GET["codigo"] . "'";
            $sql = "select top 100 a.CardCode as 'CodigoCliente', a.CardName as 'NomCliente', a.DocNum as 'NumFactura', Convert(DATE, a.DocDate) as 'FechaFactura', a.DocTotal as 'TotalFactura', (a.doctotal-a.PaidToDate) as 'SaldoFactura', case when datediff(day,a.docduedate,getdate()) <= 0 then convert(varchar,-(datediff(day,a.docduedate,getdate())))+' '+'Días Por vencer' else convert(varchar,datediff(day,a.docduedate,getdate()))+' '+' Días Vencidos' end as 'Antiguedad' from [192.168.0.4].unhesa.dbo.oinv a where (a.doctotal-a.PaidToDate)>0 AND a.CardCode = '" . $_GET["codigo"] . "'";
            // $sql = 'test';
            // echo $sql;
            $result = odbc_exec($conn, $sql);

            if (!$result) {
                die('Query Falló ' . odbc_error($conn));
            }

            if (odbc_num_rows($result) > 0) {
                $json = array();
                while ($row = odbc_fetch_array($result)) {
                    $json[] = array(
                        'factura' => $row["NumFactura"],
                        'monto' => $row["TotalFactura"],
                        'saldo' => $row["SaldoFactura"],
                        'codigo' => $row["CodigoCliente"],
                        // 'nombre' => $row["NomCliente"]
                        'fecha_factura' => $row["FechaFactura"],
                        'antiguedad' => $row["Antiguedad"]
                    );
                }
                $json_string = json_encode($json);
                echo $json_string;
            } else {
                echo 'No';
            }
        }

        // NOMBRE USUARIO
        if ($_GET["quest"] == 'usuario') {
            session_start();
            echo $_SESSION["idUsuario"];
        }

        // NOMBRE USUARIO
        if ($_GET["quest"] == 'nombre_usuario') {
            session_start();
            echo $_SESSION["nombreUsuario"];
        }

        // LISTA DE RECIBOS
        if ($_GET["quest"] == 'recibos') {
            $sql = "SELECT r.id, u.nombre as 'idUsuario', c.nombre as 'idCliente', DATE(r.fecha) fecha, r.monto, r.numero_recibo_fisico, r.banco, r.estado FROM recibo r INNER JOIN usuario u ON r.idUsuario = u.idUsuario INNER JOIN cliente c ON r.idCliente = c.idCliente WHERE r.idUsuario = ".$_GET["id_usuario"]." ORDER BY r.id DESC";

            $result = mysqli_query($con, $sql);

            if (!$result) {
                echo $sql;
                // die('Query Falló ' . mysqli_error($con));
            }

            if (mysqli_num_rows($result) > 0) {
                $json = array();
                while ($row = mysqli_fetch_array($result)) {
                    $json[] = array(
                        'id' => $row["id"],
                        'id_usuario' => $row["idUsuario"],
                        'id_cliente' => $row["idCliente"],
                        'fecha' => $row["fecha"],
                        'monto' => $row["monto"],
                        'recibo' => $row["numero_recibo_fisico"],
                        'banco' => $row["banco"],
                        'estado' => $row["estado"]
                    );
                }
                $json_string = json_encode($json);
                echo $json_string;
            } else {
                echo 'No';
                echo $sql;
            }
        }

        // LISTA DE RECIBOS
        if ($_GET["quest"] == 'recibos_filtro') {
            $sql = "SELECT r.id, u.nombre AS 'idUsuario', c.nombre AS 'idCliente', DATE(r.fecha) AS fecha, r.monto, r.numero_recibo_fisico, r.banco, r.estado FROM recibo r INNER JOIN usuario u ON r.idUsuario = u.idUsuario INNER JOIN cliente c ON r.idCliente = c.idCliente WHERE (r.id LIKE '%".$_GET["palabra"]."%' OR u.nombre LIKE '%".$_GET["palabra"]."%' OR c.nombre LIKE '%".$_GET["palabra"]."%' OR DATE(r.fecha) LIKE '%".$_GET["palabra"]."%' OR r.monto LIKE '%".$_GET["palabra"]."%' OR r.numero_recibo_fisico LIKE '%".$_GET["palabra"]."%' OR r.estado LIKE '%".$_GET["palabra"]."%') AND r.idUsuario = ".$_GET["id_usuario"]." ORDER BY r.id DESC";
            $result = mysqli_query($con, $sql);

            if (!$result) {
                die('Query Falló ' . mysqli_error($con));
            }

            if (mysqli_num_rows($result) > 0) {
                $json = array();
                while ($row = mysqli_fetch_array($result)) {
                    $json[] = array(
                        'id' => $row["id"],
                        'id_usuario' => $row["idUsuario"],
                        'id_cliente' => $row["idCliente"],
                        'fecha' => $row["fecha"],
                        'monto' => $row["monto"],
                        'recibo' => $row["numero_recibo_fisico"],
                        'banco' => $row["banco"],
                        'estado' => $row["estado"]
                    );
                }
                $json_string = json_encode($json);
                echo $json_string;
            } else {
                echo 'No';
            }
        }

        // DATOS RECIBO
        if ($_GET["quest"] == 'datos_recibo') {
            $sql = "SELECT r.id AS 'ID', u.nombre AS 'Usuario', c.nombre AS 'Cliente', c.codigo as Codigo, r.fecha AS 'Fecha', r.monto AS 'Monto', r.numero_recibo_fisico AS 'Recibo', r.banco AS 'Banco', r.numero_de_boleta AS 'Boleta', r.fecha_deposito AS 'Fecha Deposito', r.monto_del_deposito AS 'Monto Depositado' FROM recibo r INNER JOIN usuario u ON r.idUsuario = u.idUsuario INNER JOIN cliente c ON r.idCliente = c.idCliente WHERE r.id = " . $_GET["id_recibo"];
            // echo $sql;
            $result = mysqli_query($con, $sql);

            if (!$result) {
                die('Query Falló ' . mysqli_error($con));
            }

            if (mysqli_num_rows($result) > 0) {
                $json = array();
                while ($row = mysqli_fetch_array($result)) {
                    $json[] = array(
                        'id_recibo' => $row["ID"],
                        'usuario' => $row["Usuario"],
                        'cliente' => $row["Cliente"],
                        'codigo_cliente' => $row["Codigo"],
                        'fecha' => $row["Fecha"],
                        'monto' => $row["Monto"],
                        'recibo' => $row["Recibo"],
                        'banco' => $row["Banco"],
                        'boleta' => $row["Boleta"],
                        'fecha_deposito' => $row["Fecha Deposito"],
                        'monto_depositado' => $row["Monto Depositado"],
                    );
                }
                $json_string = json_encode($json);
                echo $json_string;
            } else {
                echo 'No';
            }
        }

        // DETALLE DEL RECIBO
        if ($_GET["quest"] == 'detalle_del_recibo') {
            $sql = "SELECT r.id, u.nombre as Usuario, c.nombre as Cliente, DATE(r.fecha) as Fecha, r.monto, r.numero_recibo_fisico, r.banco, r.numero_de_boleta, DATE(r.fecha_deposito) FechaDeposito, r.monto_del_deposito, r.estado FROM `recibo` r INNER JOIN usuario u ON r.idUsuario = u.idUsuario INNER JOIN cliente c ON r.idCliente = c.idCliente WHERE r.id =" . $_GET["id_recibo"];

            $result = mysqli_query($con, $sql);

            if (!$result) {
                die('Query Falló ' . mysqli_error($con));
            }

            if (mysqli_num_rows($result) > 0) {
                $json = array();
                while ($row = mysqli_fetch_array($result)) {
                    $json[] = array(
                        'id' => $row["id"],
                        'id_usuario' => $row["Usuario"],
                        'id_cliente' => $row["Cliente"],
                        'fecha' => $row["Fecha"],
                        'monto' => $row["monto"],
                        'recibo' => $row["numero_recibo_fisico"],
                        'banco' => $row["banco"],
                        'numero_boleta' => $row["numero_de_boleta"],
                        'fecha_deposito' => $row["FechaDeposito"],
                        'monto_deposito' => $row["monto_del_deposito"],
                        'estado' => $row["estado"],
                    );
                }
                $json_string = json_encode($json);
                echo $json_string;
            } else {
                echo 'No';
            }
        }

        // TRAER IMAGEN
        if ($_GET["quest"] == 'mostrar_img') {
            $mysqli = "SELECT imagen_del_deposito FROM recibo WHERE id = " . $_GET["id_imagen"];
            // echo $mysqli;
            $result = mysqli_query($con, $mysqli);

            if ($result->num_rows > 0) {
                $imgDatos = $result->fetch_assoc();

                //Mostrar Imagen
                header("Content-type: image/jpg");
                echo $imgDatos['imagen_del_deposito'];
            } else {
                echo 'Imagen no existe...';
            }
        }

        // TRAER IMAGEN
        if ($_GET["quest"] == 'mostrar_img_pedido') {
            session_start(); 
            $mysqli = "SELECT img FROM pedidounhesa WHERE idPedidoUnhesa = " . $_SESSION["id_del_pedido"];
            // echo $mysqli;
            $result = mysqli_query($con, $mysqli);

            if ($result->num_rows > 0) {
                $imgDatos = $result->fetch_assoc();
                //Mostrar Imagen
                header("Content-type: image/jpg");
                echo $imgDatos['img'];
            } else {
                echo 'Imagen no existe...';
            }
        }

        // OBTENER CLIENTES ONLINE
        if ($_GET["quest"] == 'ver_clientes_online') {
            session_start();
            $mysqli = "SELECT * FROM clientes_online";
            // echo $mysqli;
            $result = mysqli_query($con, $mysqli);

            if (!$result) {
                die('Query Falló ' . mysqli_error($con));
            }

            if (mysqli_num_rows($result) > 0) {
                $json = array();
                while ($row = mysqli_fetch_array($result)) {
                    $json[] = array(
                        'nombre' => $row["nombre"]
                    );
                }
                $json_string = json_encode($json);
                echo $json_string;
            } else {
                echo 'No';
            }
        }
    }
}
// ------------------------------ * POST * ---------------------------------- //
if (isset($_POST)) {
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            $mysqli = "UPDATE recibo SET imagen_del_deposito = '$imgContent' WHERE id = (SELECT MAX(id) FROM `recibo`)";
            // $mysqli = "INSERT INTO imagenes(imagen, descripcion, id_usuario, fecha_guardado) VALUES('$imgContent', '" . $_POST["descripcion"] . "', " . $_POST["usuario"] . ", NOW())";
            $result = mysqli_query($con, $mysqli);

            if (!$result) {
                die('Query Falló ' . mysqli_error($con));
            }
        }
        header("Location: ../recibo_digital.html");
    }
    if (isset($_POST["foto_pedido"])) {
        $check = getimagesize($_FILES["imagen"]["tmp_name"]);
        if ($check !== false) {
            $image = $_FILES['imagen']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            $mysqli = "UPDATE pedidounhesa SET img = '$imgContent' WHERE idPedidoUnhesa = (SELECT MAX(idPedidoUnhesa) FROM `pedidounhesa`)";
            // $mysqli = "INSERT INTO imagenes(imagen, descripcion, id_usuario, fecha_guardado) VALUES('$imgContent', '" . $_POST["descripcion"] . "', " . $_POST["usuario"] . ", NOW())";
            $result = mysqli_query($con, $mysqli);

            if (!$result) {
                die('Query Falló ' . mysqli_error($con));
            }else{
                echo 'success';
            }
        }
        header("Location: ../../Pedidos/ListPedidos.php?variable=1");
    }
    if (isset($_POST["guardar_foto"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            $mysqli = "INSERT INTO imagen(img) VALUES('$imgContent')";
            // $mysqli = "INSERT INTO imagenes(imagen, descripcion, id_usuario, fecha_guardado) VALUES('$imgContent', '" . $_POST["descripcion"] . "', " . $_POST["usuario"] . ", NOW())";
            $result = mysqli_query($con, $mysqli);

            if (!$result) {
                die('Query Falló ' . mysqli_error($con));
            }else{
                echo 'Éxito';
            }
        }
        // header("Location: ../recibo_digital.html");
    }
    if (isset($_POST["update_img"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            $mysqli = "UPDATE imagenes SET imagen = '$imgContent', descripcion = '" . $_POST["descripcion"] . "' WHERE id = " . $_POST["id_imagen"];
            // echo $mysqli;
            // echo $_POST["descripcion"];
            $result = mysqli_query($con, $mysqli);

            if (!$result) {
                die('Query Falló ' . mysqli_error($con));
            }
            echo 'Update';
        }
        header("Location: ../imagenes.html");
    }

    // ACTUALIZA LA FOTO DE EL DEPOSITO BANCARIO DE UN RECIBO
    if (isset($_POST["update_picture"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            $mysqli = "UPDATE recibo SET imagen_del_deposito = '$imgContent' WHERE id = " . $_POST["id_recibo_foto"];
            // echo $mysqli;
            // echo $_POST["descripcion"];
            $result = mysqli_query($con, $mysqli);

            if (!$result) {
                die('Query Falló ' . mysqli_error($con));
            }
            echo 'Update';
        }
        header("Location: ../detalle_recibo.html");
    }

    if (isset($_POST["quest"])) {
        // RECONTEOS
        if ($_POST["quest"] == 'recontar') {
            $mysqli = "UPDATE conteos SET idEstado = 3 WHERE idConteo = " . $_POST["id"];
            $result = mysqli_query($con, $mysqli);

            if (!$result) {
                echo 'No';
            }

            echo 'Successfuly';
        }

        // INGRESAR RECIBO
        if ($_POST["quest"] == 'ingresar_recibo') {
            $mysqli = "INSERT INTO `recibo`(`idUsuario`, `idCliente`, `fecha`, `monto`, `numero_recibo_fisico`, banco, numero_de_boleta, fecha_deposito, monto_del_deposito, estado) VALUES (" . $_POST["id_usuario"] . ", " . $_POST["id_cliente"] . ", CURRENT_TIME(), " . $_POST["monto"] . ", '" . $_POST["recibo"] . "', '" . $_POST["banco"] . "', '" . $_POST["numero_de_boleta"] . "', '" . $_POST["fecha"] . "', " . $_POST["monto"] . ", '" . $_POST["estado"] . "');";
            $result = mysqli_query($con, $mysqli);
            // echo $mysqli;
            if (!$result) {
                echo 'No funciono, query: ' + $mysqli;
            } else {
                // echo $result;
            }

            echo 'Successfuly';
        }

        // ACTUALIZAR DATOS DEL BANCO EN RECIBOS
        if ($_POST["quest"] == 'cambiar_datos_banco') {
            $mysqli = "UPDATE recibo SET banco = '" . $_POST["banco_ingresado"] . "', numero_de_boleta = '" . $_POST["numero_de_boleta"] . "', fecha_deposito = '" . $_POST["fecha_de_deposito"] . "', monto_del_deposito = " . $_POST["monto_del_banco"] . ", estado = 'recibido en contabilidad' WHERE id = " . $_POST["id_recibo"] . "";
            $result = mysqli_query($con, $mysqli);
            // echo $mysqli;
            if (!$result) {
                echo 'No funciono, query: ' + $mysqli;
            }

            echo 'Successfuly';
        }

        // INGRESAR RECIBO
        if ($_POST["quest"] == 'ingresar_detalle_recibo') {
            $mysqli = "INSERT INTO `detallerecibo`(`idRecibo`, `factura`, `saldo_a_cobrar`, `abono`, `saldo`) VALUES (" . $_POST["id_recibo"] . ",'" . $_POST["factura"] . "'," . $_POST["saldo_a_cobrar"] . "," . $_POST["abono"] . "," . $_POST["saldo"] . ")";
            $result = mysqli_query($con, $mysqli);

            if (!$result) {
                echo $mysqli;
            } else {
                echo 'Successfuly';
            }
        }
        // ENVIAR MENSAJE POR CORREO
        if ($_POST['quest'] == 'Enviar') {
            if (mail('jguerra.grupoeconsa@gmail.com', 'Test', 'Hola Mundo')) {
                echo "<script language='javascript'>
                        alert('Mensaje enviado, muchas gracias por contactar con nosotros.');
                    </script>";
            } else {
                echo 'Falló el envio';
            }
        }
    }

    if (isset($_POST["quest"])) {

        // ACTUALIZAR ESTADO DEL RECIBO
        if ($_POST["quest"] == 'cambiar_estado') {
            $sql = "UPDATE recibo SET estado = '".$_POST["estado"]."' WHERE id = ".$_POST["id_recibo"];
            // echo $sql;
            $result = mysqli_query($con, $sql);

            if (!$result) {
                die('Query Falló ' . mysqli_error($con));
            }else{
                echo 'Successfully';
            }
        }
    }

    if (isset($_POST["quest"])) {

        // ACTUALIZAR ESTADO DEL RECIBO
        if ($_POST["quest"] == 'insertar_pedido_online') {
            $sql = "INSERT INTO `pedido_online`( `nombre`, `direccion`, `telefono`, `nombre_factura`, `nit`, `stickers`, `servicio`, `observaciones`, `fecha_entrega`, `id_cliente_online` ) VALUES('".$_POST["nombre"]."', '".$_POST["direccion"]."', ".$_POST["telefono"].", '".$_POST["nombre_factura"]."', '".$_POST["nit"]."', '".$_POST["stickers"]."', '".$_POST["servicio"]."', '".$_POST["observaciones"]."', '".$_POST["fecha_entrega"]."', ".$_POST["id_cliente_online"].")";
            // echo $sql;
            $result = mysqli_query($con, $sql);

            if (!$result) {
                die('Query Falló ' . mysqli_error($con));
            }else{
                echo 'Successfully';
            }
        }
    }
}
function updateConteos()
{
    // ---------------- SQL SERVER -------------------- //
    $dsn = "Driver={SQL Server};Server=192.168.0.7;Port=1433;Database=master";
    $user = 'sa';
    $password = 'grueconsa';
    // Connect to the data source and get a handle for that connection.
    $conn = odbc_connect($dsn, $user, $password);
    if (!$conn) {
        if (phpversion() < '4.0') {
            exit("Connection Failed: . $php_errormsg");
        } else {
            exit("Connection Failed:" . odbc_errormsg());
        }
    }

    // ---------------- MYSQL -------------------- //
    $con = mysqli_connect("localhost", "root", "");
    if (!$con) {
        die('Could not connect: ' . mysqli_connect_error());
    }
    mysqli_select_db($con, "dbinventarios");

    
}


//---------------Plantilla friosos consultas
if(isset($_GET)){
    if(isset($_GET["quest"])){
        if($_GET["quest"] == 'listar_productos'){
            $mysql_query ="SELECT * FROM producto";
            $resultado = mysqli_query($con, $mysql_query);

            if(!$resultado){
                die('el Query falló:' . mysqli_error($con));
            }

            if(mysqli_num_rows($resultado)>0){
                $json = array();
                while($fila = mysqli_fetch_array($resultado)){
                    $json[] = array(
                        'idProducto' => $fila["idProducto"],
                        'nombre' => $fila["nombre"],
                        'codigo' => $fila["codigo"]
                    );

                }
                $json_string = json_encode($json);
                echo $json_string;
            } else {
                echo 'no hay registros';
            }

        
        }
    }

}

if(isset($_GET)){
    if(isset($_GET["quest"])){
        if($_GET["quest"] == 'obtener_producto'){
            $mysql_query ="SELECT * FROM producto WHERE idProducto=".$_GET['id'];
            $resultado = mysqli_query($con, $mysql_query);

            if(!$resultado){
                die('el Query falló:' . mysqli_error($con));
            }

            if(mysqli_num_rows($resultado)>0){
                $json = array();
                while($fila = mysqli_fetch_array($resultado)){
                    $json[] = array(
                        'idProducto' => $fila["idProducto"],
                        'nombre' => $fila["nombre"],
                        'codigo' => $fila["codigo"]
                    );

                }
                $json_string = json_encode($json);
                echo $json_string;
            } else {
                echo 'no hay registros';
            }

        
        }
    }

}

if(isset($_GET)){
    if(isset($_GET["quest"])){
        if($_GET["quest"] == 'obtener_correlativo'){
            $mysql_query ="SELECT MAX(correlativo)+1 as correlativo FROM pedidounhesa";
            $resultado = mysqli_query($con, $mysql_query);

            if(!$resultado){
                die('el Query falló:' . mysqli_error($con));
            }

            if(mysqli_num_rows($resultado)>0){
                $json = array();
                while($fila = mysqli_fetch_array($resultado)){
                    $json[] = array(
                        'correlativo' => $fila["correlativo"]
                    );

                }
                $json_string = json_encode($json);
                echo $json_string;
            } else {
                echo 'no hay registros';
            }

        
        }
    }

}

if(isset($_GET)){
    if(isset($_GET["quest"])){
        if($_GET["quest"] == 'obtener_idPedido'){
            $mysql_query ="SELECT idPedidoUnhesa as id FROM pedidounhesa ORDER BY idPedidoUnhesa DESC LIMIT 1";
            $resultado = mysqli_query($con, $mysql_query);

            if(!$resultado){
                die('el Query falló:' . mysqli_error($con));
            }

            if(mysqli_num_rows($resultado)>0){
                $json = array();
                while($fila = mysqli_fetch_array($resultado)){
                    $json[] = array(
                        'id' => $fila["id"]
                    );

                }
                $json_string = json_encode($json);
                echo $json_string;
            } else {
                echo 'no hay registros';
            }

        
        }
    }

}

if(isset($_POST)){
    if(isset($_POST['quest'])){
        if($_POST['quest'] == 'agregar_pedido_frioso'){
            $mysql_query = "INSERT INTO pedidounhesa (correlativo, fecha_emision, fecha_despacho, direccion, observacion, telefono, hora, observacion_A, total, idVendedor, idtipoentrega, idCliente, idEstado)
            values (".$_POST['correlativo'].",'NOW()','".$_POST['fecha_despacho']."','".$_POST['direccion']."','".$_POST['observacion']."',".$_POST['telefono'].",'".$_POST['hora']."','".$_POST['observacion_A']."',".$_POST['total'].",".$_POST['idVendedor'].",".$_POST['idTipoEntrega'].",".$_POST['idCliente'].",1)";

            $result = mysqli_query($con, $mysql_query);

            if (!$result) {
                die('Query Falló ' . mysqli_error($con));
            }else{
                echo 'Success';
            }
        }
    }
}

if(isset($_POST)){
    if(isset($_POST['quest'])){
        if($_POST['quest'] == 'registrar_detallePedidos'){
            $mysql_query = "INSERT INTO detallepedidounhesa (cantidad, precio, total,observaciones,  idPedidoUnhesa, idProducto) 
            VALUES ".$_POST['registro1'].",".$_POST['registro2'].",".$_POST['registro3'].",".$_POST['registro4'].",".$_POST['registro5'].",".$_POST['registro6'].",".$_POST['registro7'].",".$_POST['registro8'].",".$_POST['registro9'].
            ",".$_POST['registro10'].",".$_POST['registro11'].",".$_POST['registro12'].",".$_POST['registro13'].",".$_POST['registro14'].",".$_POST['registro15'].",".$_POST['registro16'].",".$_POST['registro17'].",".$_POST['registro18'].",".$_POST['registro19'].","
            .$_POST['registro20'].",".$_POST['registro21'].",".$_POST['registro22'].",".$_POST['registro23'].",".$_POST['registro24'].",".$_POST['registro25'].",".$_POST['registro26'].",".$_POST['registro27'].",".$_POST['registro28'].",".$_POST['registro29'];
            $result = mysqli_query($con, $mysql_query);

            if (!$result) {
                die('Query Falló ' . mysqli_error($con));
            }else{
                echo 'Success';
            }
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == "DELETE"){
    
    parse_str(file_get_contents("php://input"), $_DELETE);
    if($_DELETE["quest"]=='eliminar_registros_vacios'){
    $mysql_query = "DELETE FROM detallepedidounhesa WHERE cantidad = 0.00
    ORDER BY idDetallePedidoUnhesa DESC LIMIT 29";
    
    $resultado = mysqli_query($con, $mysql_query);

    if(!$resultado){
        echo  mysqli_error($con);
    }else{
        echo 'Success';
    }
}
}