<?php
include 'connection/connection.php';
//recibir los datos y almacenarlos en variables
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
    //consulta sql insert
$insertar = "INSERT INTO usuarios(usuario, clave) VALUES ('$usuario', '$clave')";
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
if (mysqli_num_rows($verificar_usuario) > 0){
    echo    '<script>
             alert("El usuario ya se encuentra registrado");
             window.history.go(-1);
            </script>';
    exit;
}
//ejecutar consulta
$resultado = mysqli_query($conexion,$insertar);
if (!$resultado){
    echo 'Error al registrarse';
}else {
    echo "Bienvenido $usuario";
}
//Cerrar conexión
mysqli_close($conexion);


