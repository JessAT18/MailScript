<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contactanos</title>
    <!--ESTILO CSS PARA EL FORMULARIO DE CORREO-->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Contactate con nosotros</h1>
        <p>¿Tienes alguna consulta? A continuación, llena los datos solicitados para atenderte a la brevedad posible.</p>
    </header>
    <form method="post">

	<label for="email_list">Selecciona el departamento con el que deseas comunicarte: </label>
	<select name="email_list">
        <option>Selecciona una de las opciones</option>
		<option value="inscripciones@institutofrankfurt.edu.bo">Departamento de Inscripciones</option>
		<option value="soporte@institutofrankfurt.edu.bo">Departamento de Soporte</option>
	</select>

	<input type="text" placeholder="Nombre" name="nombre">
        <input type="email" placeholder="Correo" name="correo">
        <input type="text" placeholder="Asunto" name="asunto">
        <textarea placeholder="Mensaje" name="mensaje" ></textarea>
        <input type="submit" value="Enviar correo" name="enviar">
    </form>

<?php    
if(isset($_POST['enviar'])){
    if(!empty($_POST['email_list']) && !empty($_POST['nombre']) && !empty($_POST['asunto']) && !empty($_POST['mensaje']) && !empty($_POST['correo'])){
        $nombre=$_POST['nombre'];
        $asunto=$_POST['asunto'];
        $mensaje=$_POST['mensaje'];
        $correo=$_POST['correo'];

        $headers = "From: $correo\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";

        $to_email = $_POST['email_list'];
        
        $email_message = $nombre . " ha enviado un nuevo correo." . "Mensaje: " . $mensaje;

        if(mail($to_email,$asunto,$email_message,$headers)){
            echo "<p>¡Correo enviado exitosamente!</p>";
	    }
    }
} 
?>  
</body>
</html>
