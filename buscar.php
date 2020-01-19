<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buscar</title>
</head>
<body>
    <?php

    if(isset($_POST["buscar"])){
        $nombre = $_POST['nombre'];
        $apellidos1 = $_POST['apellido1'];
        $apellidos2 = $_POST['apellido2'];
        $edad_minima = $_POST['edad_minima'];
        $edad_maxima = $_POST['edad_maxima'];

        $sql = "SELECT * FROM alumnos WHERE 1 ";

        if(!empty($nombre)){
            $sql.= "and lower(Nombre) LIKE '%". strtolower($nombre) ."%' ";
        }

        if(!empty($apellidos1)){
            $sql .= "and lower(Apellido1) LIKE '%". strtolower($apellidos1) ."%' ";
        }

        if(!empty($apellidos2)){
            $sql .= "and lower(Apellido2) LIKE '%". strtolower($apellidos2) ."%' ";
        }

        if(!empty($edad_minima)){
            $sql .= "and Edad >= ". $edad_minima . " ";
        }

        if(!empty($edad_maxima)){
            $sql .= "and Edad <= ". $edad_maxima. " ";
        }

        echo $sql; 

        require_once 'conexion.php';

        $resultados = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($resultados) == 0){
            ?>
                <p>No hay resultados</p>
            <?php
        }else{
            ?>
            <table>
                <tr>
                    <th>DNI</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO1</th>
                    <th>APELLIDO2</th>
                    <th>EDAD</th>
                </tr>
                <?php
                while($fila = mysqli_fetch_assoc($resultados)){
                    echo "<tr>";
                    echo "<td>".$fila['Dni']."</td>";
                    echo "<td>".$fila['Nombre']."</td>";
                    echo "<td>".$fila['Apellido1']."</td>";
                    echo "<td>".$fila['Apellido2']."</td>";
                    echo "<td>".$fila['Edad']."</td>";
                    echo "</tr>";
                }
                
                ?>
            </table>
            <?php
        }

    }

?>

<form method="POST">
<label for="nombre">Introduce Nombre</label>
<input type="text" name="nombre" id="nombre"/>
<label for="apellido1">Introduce Apellido1</label>
<input type="text" name="apellido1" id="apellido1"/>
<label for="apellido2">Introduce Apellido2</label>
<input type="text" name="apellido2" id="apellido2"/>
<label for="edad_minima">Introduce Edad Mínima</label>
<input type="number" name="edad_minima" id="edad_minima"/>
<label for="edad_maxima">Introduce Edad Máxima</label>
<input type="number" name="edad_maxima" id="edad_maxima"/>
<input type="submit" value="buscar" name="buscar"/>


</form>

<a href="index.php">Volver</a>

<?php 


?> 
    
</body>
</html>