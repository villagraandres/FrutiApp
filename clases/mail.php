<?php
namespace Clase;
use PHPMailer\PHPMailer\PHPMailer;

class mail{

    private $mail = null;
    
    function __construct(){

        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true;
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->Port = 587;
        $this->mail->Username = "frutiapp2@gmail.com";
        $this->mail->Password = "mknussviqpdmzylp";
        $this->SMTPSecure=PHPMailer::ENCRYPTION_SMTPS;
    }


    public function metEnviar( string $nombre, string $correo, $token  ){
        $this->mail->setFrom("frutiapp2@gmail.com", "Creacion de Cuenta");
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
        $this->mail->setFrom("frutiapp2@gmail.com", "Creacion de Cuenta");
        $this->mail->addAddress('frutiapp2@gmail.com','Admin');
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


    
    public function mensaje( string $nombre, string $correo, $mensaje  ){
        $this->mail->setFrom("frutiapp2@gmail.com", "Nuevo Mensaje");
        $this->mail->addAddress("frutiapp2@gmail.com", " Admin");
        $this->mail->Subject = "Nuevo Mensaje";


        $contenido="<html>";
        $contenido.="<p>Has recibido un nuevo mensaje de <strong> ".$nombre."</strong></p>";
       
        $contenido.="<p>Mensaje: ".$mensaje." </p> ";
        $contenido.="<p>Correo: ".$correo." </p> ";
        
        $contenido.="</html>";
     

        $this->mail->Body = $contenido;
        $this->mail->isHTML(true);
        $this->mail->CharSet = "UTF-8";
        return $this->mail->send();
    }

    
    public function recupear( string $nombre, string $correo, $token  ){
        $this->mail->setFrom("frutiapp2@gmail.com", "Creacion de Cuenta");
        $this->mail->addAddress($correo,$nombre);
        $this->mail->Subject = "Cambio de contrase??a";


        $contenido="<html>";
        $contenido.="<p><strong>Hola ".$nombre. "</strong> has solicitado un cambio de contrase??a</p>";
        $contenido.="<p>Visita la siguiente pagina: <a href='http://".$_SERVER['HTTP_HOST']."/reestablecer?token=".$token."'>Confirmar</a> </p> ";
        $contenido.="<p>Si tu no solicitaste esta cuenta, ignora el mensaje</p>";
        $contenido.="</html>";
     

        $this->mail->Body = $contenido;
        $this->mail->isHTML(true);
        $this->mail->CharSet = "UTF-8";
        return $this->mail->send();
    }

}

?>