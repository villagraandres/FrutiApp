<?php
namespace Clase;
use PHPMailer\PHPMailer\PHPMailer;

class mail{

    private $mail = null;
    
    function __construct(){
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true;
        $this->mail->Host = "smtp.mailtrap.io";
        $this->mail->Port = 2525;
        $this->mail->Username = "d98386aff043cd";
        $this->mail->Password = "ad9a6874b4b037";
    }


    public function metEnviar( string $nombre, string $correo, $token  ){
        $this->mail->setFrom("villagraandres00@gmail.com", "Creacion de Cuenta");
        $this->mail->addAddress($correo,$nombre);
        $this->mail->Subject = "Confirmacion de Cuenta";


        $contenido="<html>";
        $contenido.="<p><strong>Hola ".$nombre. "</strong> tu cuenta ha sido creada, solo necesitamos verificarla</p>";
        $contenido.="<p>Visita la siguiente pagina: <a href='http://".$_SERVER['HTTP_HOST']."/confirmar?token=".$token."'>Confirmar</a> </p> ";
        $contenido.="<p>Si tu no solicitaste esta cuenta, ignora el mensaje</p>";
        $contenido.="</html>";
     

        $this->mail->Body = $contenido;
        $this->mail->isHTML(true);
        $this->mail->CharSet = "UTF-8";
        return $this->mail->send();
    }



    public function avisoOrden(){
        $this->mail->setFrom("frutiApp@test.com", "Creacion de Cuenta");
        $this->mail->addAddress('frutiApp@test.com');
        $this->mail->Subject = "Alguien ha hecho una orden";


        $contenido="<html>";
        $contenido.="<p>Hola un cliente ha hecho una orden para mas detalles consulta la pagina</p>";
        $contenido.="<p><a href='http://".$_SERVER['HTTP_HOST']."/login'>Ver detalles</a> </p> ";
      
        $contenido.="</html>";
     

        $this->mail->Body = $contenido;
        $this->mail->isHTML(true);
        $this->mail->CharSet = "UTF-8";
        return $this->mail->send();
    }
}

?>