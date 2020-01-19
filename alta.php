<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alta</title>
</head>
<body>
<?php 
    if(isset($_POST["guardar"])){
        $dni=$_POST['dni']; 

        require_once 'conexion.php'; 
        
        $sql="SELECT * from alumnos WHERE Dni='".$dni."'"; 
        $resultados=mysqli_query($conexion, $sql); 
        $nombre=$_POST['nombre']; 
            $apellido1=$_POST['apellido1'];
            $apellido2=$_POST['apellido2'];
            $edad=$_POST['edad'];
        if(mysqli_num_rows($resultados)>0){
          
            $sql = "UPDATE alumnos SET ";
                $sql .= "Dni='".$dni."',";
                $sql .= "Nombre='".$nombre."',";
                $sql .= "Apellido1='".$apellido1."',";
                $sql .= "Apellido2='".$apellido2."',";
                $sql .= "Edad=".$edad." ";
                $sql .= "WHERE Dni='".$dni."'";

                if(mysqli_query($conexion, $sql)){
                    echo "Se ha modificado con exito";
                }else{
                    echo "No se ha modificado con exito";
                }
            
        }else{
            $sql = "INSERT INTO alumnos VALUES (";
                $sql .= "'".$dni."',";
                $sql .= "'".$nombre."',";
                $sql .= "'".$apellido1."',";
                $sql .= "'".$apellido2."',";
                $sql .= $edad;
                $sql .= ")";

                if(mysqli_query($conexion, $sql)){
                    echo "Se ha insertado con exito";
                }else{
                    echo "No se ha insertado con exito";
                }

        }



    }
?>
    <form method="POST">
    <label for="dni">Introduce DNI</label>
    <input type="text" name="dni" id="dni"/>
    <label for="nombre">Introduce Nombre</label>
    <input type="text" name="nombre" id="nombre"/>
    <label for="apellido1">Introduce Apellido1</label>
    <input type="text" name="apellido1" id="apellido1"/>
    <label for="apellido2">Introduce Apellido2</label>
    <input type="text" name="apellido2" id="apellido2"/>
    <label for="edad">Introduce Edad</label>
    <input type="number" name="edad" id="edad"/>
    <input type="submit" value="guardar" name="guardar"/>
    </form>

    <a href="index.php">Volver</a>
</body>
</html>

