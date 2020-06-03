<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgregarTicket</title>
</head>
<body>
    <?php

    //incluir conexión a la base de datos
    include 'conexionBD.php';
    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
    $placa = isset($_POST["placa"]) ? mb_strtoupper(trim($_POST["placa"]), 'UTF-8') : null;
    $marca = isset($_POST["marca"]) ? mb_strtoupper(trim($_POST["marca"]), 'UTF-8') : null;
    $modelo = isset($_POST["modelo"]) ? trim($_POST["modelo"]): null;
    $ingreso = isset($_POST["ingreso"]) ? trim($_POST["ingreso"]): null;
    $salida = isset($_POST["salida"]) ? trim($_POST["salida"]): null;

    //Sacamos el cli_codigo
    $sql2 = "SELECT cli_codigo FROM clientes WHERE cli_cedula='$cedula'";
    $result = $conn->query($sql2);

    while($row = $result->fetch_assoc()){
        $codcli =$row["cli_codigo"];
        $sql = "INSERT INTO vehiculos VALUES (0, '$codcli', '$placa', '$marca','$modelo')";
    }
    
    //Sacamos el cli_codigo
    $sql3 = "SELECT veh_codigo FROM vehiculo WHERE veh_placa='$placa'";
    //INSERTS VEHICULOS
    $row = $result->fetch_assoc();
    
    
    //INSERTS TICKETS

    if($result->num_rows > 0){
        if($conn->query($sql) === TRUE){   //Igresa datos a vehiculo
            $result3 = $conn->query($sql3); //resil del veh_codigo
            $row2 = $result3->fetch_assoc();
            $codveh = $row["cli_codigo"];
            $sql5 = "INSERT INTO tickets VALUES (0, '$codveh', '$ingreso', '$salida')";
            if ($conn->query($sql5) === TRUE) {
                header("location:../index.html");
            }
        }
    }else {
        
        //header("location:../index.html");
    }
 //cerrar la base de datos
    $conn->close();
    ?>
    
</body>
</html>