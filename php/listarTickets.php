<!DOCTYPE html>
<html>
<head>
    <title>Crear Cliente</title>
    <meta charset="utf-8"/>
    <meta name="keywords" content="Tickets Parqueo" />
    <link rel="stylesheet" type="text/css" href="../css/agregarPersona.css">
    <script src="../javascript/formulario.js" type="text/javascript" ></script>
</head>

<body>
    <header > 
            <div>
                <img src="../images/logo.png" alt="Imagen de Portada" class="logo">
            </div> 
    </header>
    <nav>
        <ul class="menu">
            <li><a href="../index.html" target="_blank">Inicio</a></li>
            <li><a href="agregarPersona.html" target="_blank">Agregar Persona</a></li>
            <li><a href="agregarTicket.html" target="_blank">Agregar de Ticket</a></li>
            <li><a href="../php/listarTickets.php" target="_blank">Listar Tickets</a></li>
            <li><a href="buscarPersona.html" target="_blank">Buscar Personas</a></li>
        </ul>
    </nav>
    <section class="secc">
        <!--
            <form id="formulario01" method="POST" action="../controladores/crear_usuario.php" ></form>
        -->
        <div class="secc1">
            
            <table style="width:100%">
                <tr>
                <th>Cedula</th>
                <th>Nombres</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Placa</th>
                <th>Ingreso</th>
                <th>Salida</th>
                </tr>
                <?php

                include '../php/conexionBD.php';
                $sql = "SELECT * FROM usuarios";
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo " <td>" . $row["usu_cedula"] . "</td>";
                    echo " <td>" . $row['usu_nombres'] ."</td>";
                    echo " <td>" . $row['usu_apellidos'] . "</td>";
                    echo " <td>" . $row['usu_direccion'] . "</td>";
                    echo " <td>" . $row['usu_correo'] . "</td>";
                    echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";
                    echo "</tr>";
                    }
                } else {
            
                    echo "<tr>";
                    echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
                    echo "</tr>";
                    }
            
                    $conn->close();
                ?>
            </table>
        </div>

        
</section>

<footer>
            <div class="info2">
                <h3>Estudiante</h3>
                <p>&#8226; Nombre: Juan Francisco Pelaez Becerra </p><br>
                <p>&#8226; Universidad Polit&eacute;cnica Salesiana </p><br>
                <p>&#8226; Email: <a href="mailto:jpelaezb1@est.ups.edu.ec">jpelaezb1@est.ups.edu.ec</a></p><br>
                <p>&#8226; Call: <a href="tel:+593939082637">(593) 0939082637</a></p><br>
                <p>&#169;Todos los derechos reservados</p>
            </div>
</footer>
 
</body>
</html>