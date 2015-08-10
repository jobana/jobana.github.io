<?php
//Comprobamos que se haya presionado el boton enviar
if(isset($_POST['submit'])){
//Guardamos en variables los datos enviados
$name = $_POST['name'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
 
///Validamos del lado del servidor que el nombre y el email no estén vacios
if($name == ''){
echo "Debe ingresar su nombre";
}
else if($email == ''){
echo "Debe ingresar su email";
}else{
$para = "nellyjobana@gmail.com";//Email al que se enviará
$asunto = "portfolio contact";//Puedes cambiar el asunto del mensaje desde aqui
//Este sería el cuerpo del mensaje
$mensaje = "
<table border='0' cellspacing='3' cellpadding='2'>
<tr>
<td width='30%' align='left' bgcolor='#f0efef'><strong>name:</strong></td>
<td width='80%' align='left'>$name</td>
</tr>
<tr>
<td align='left' bgcolor='#f0efef'><strong>E-mail:</strong></td>
<td align='left'>$email</td>
</tr>
<tr>
<td width='30%' align='left' bgcolor='#f0efef'><strong>Telephone:</strong></td>
<td width='70%' align='left'>$telephone</td>
</tr>
</table>
";
 
//Cabeceras del correo
$headers = "From: $name <$email>\r\n"; //Quien envia?
$headers .= "X-Mailer: PHP5\n";
$headers .= 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
 
//Comprobamos que los datos enviados a la función MAIL de PHP estén bien y si es correcto enviamos
if(mail($para, $asunto, $mensaje, $headers)){
header("Location:gracias.html#contacto"); 
echo "Su    mensaje se ha enviado correctamente";
}else{
echo "Hubo un error en el envío inténtelo más tarde";

}
}
}

?>