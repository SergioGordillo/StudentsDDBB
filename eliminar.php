<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eliminar alumno</title>
</head>
<body>

<?php
    if(isset($_POST["eliminar"])){
        $dni=$_POST['dni']; 

        require_once 'conexion.php'; 
        $sql="SELECT * from alumnos WHERE Dni='".$dni."'"; 
        echo $sql; 
        $resultados=mysqli_query($conexion, $sql); 

        if(mysqli_num_rows($resultados)>0){
            $sql="DELETE FROM alumnos WHERE Dni='".$dni."'"; 
            $resultados=mysqli_query($conexion, $sql); 
            echo $sql; 
                echo "Se ha eliminado el alumno con exito";
        }else{
            echo "No hay ningún alumno registrado con ese DNI"; 
            }
    }
?>


<form method="POST">
    <label for="dni">Introduce DNI</label>
    <input type="text" name="dni" id="dni"/>
    <input type="submit" value="eliminar" name="eliminar"/>
    </form>

    <a href="index.php">Volver</a>
    
</body>
</html>