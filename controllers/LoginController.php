<?php
namespace Controller;

use Clase\mail;
use Model\User;
use Router\Router;

class LoginController{

    public static function login(Router $router){
        $resultado=l($_GET['resultado'] ?? '');

        if($resultado){
            $alertas=User::setAlerta('exito','La contraseña ha sido reestablecida correctamente');
        }

        $usuario=new User();
        $alertas=[];
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $usuario=new User($_POST);
            $alertas=$usuario->validarLogin();
            
            //Ver si existe la cuenta
            if(empty($alertas)){
                $usuarioDB=  User::where('email',$usuario->email);

                if($usuarioDB){
                   //Ver si la contraseña es correcta y si esta verificada
                   $password=$usuarioDB->password($usuario->password);
                   if($password){
                      //Inicia la sesion
                     session_start();
                     $_SESSION['nombre']=$usuarioDB->nombre;
                     $_SESSION['email']=$usuarioDB->email;
                     $_SESSION['id']=$usuarioDB->id;
                     $_SESSION['rol']=$usuarioDB->rol;
                    if($usuarioDB->rol==0){
                        header('Location: /');
                    }else if($usuarioDB->rol==1){
                        header('Location: /admin');
                    }
                   }
      
                }else{
                  $alertas=User::setAlerta('error','No existe el Usuario');
                  
                }

            }
         
        }
        

        $alertas=User::getAlertas();
        $router->render('login/login',[
            'alertas'=>$alertas
        ]);
        
    }

    public static function registro(Router $router){

        $usuario= new User;
        $alertas=[];

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $usuario->sincronizar($_POST);
            
           $alertas= $usuario->validarCuenta();
            
            if(empty($alertas)){
                //ver que no exista
               $resultado= $usuario->existe($usuario->email);
                if($resultado->num_rows){
                    $alertas=User::getAlertas();
                }else{
                    //Haseheamos
                    $usuario->hash();
                    //Gneramos el token
                
                    $usuario->token();
                    //Enviamos correo
                 $mail=new mail;   
                 $enviado= $mail->metEnviar($usuario->nombre,$usuario->email,$usuario->token); 
                    ///Creo cuenta
                   $resultado= $usuario->crear();               
                   if($resultado){
                    header('Location: /mensaje');
                   }  
                }
            }
    
        }
        
    
        $router->render('login/registro',[
            'user'=>$usuario,
            'alertas'=>$alertas
        ]);


        
    }

    public static function mensaje(Router $router){


        $router->render('login/mensaje');
    }
    public static function confirmar(Router $router){

        $id=l($_GET['token']);
        $usuario=User::where('token',$id);

        if(empty($usuario)){
            $alertas=User::setAlerta('error','Token invalido');
        }else{
            $usuario->token=null;
            $usuario->confirmado=1;

            $usuario->actualizar();

        }
        


        $alertas=User::getAlertas();
        $router->render('login/confirmar',[
            'alertas'=>$alertas
        ]);
    }

   public static function cerrarSesion(){
    session_start();
    $_SESSION=[];
    header('Location: /');
   }
   
   public static function recuperar(Router $router){
    $alertas=[];
    if($_SERVER['REQUEST_METHOD']==='POST'){
      $usuario= new User($_POST);
     $alertas= $usuario->validarRecuperar();
     if(empty($alertas)){
       $usuarioCompleto=User::where('email',$usuario->email);
     
       if($usuarioCompleto && $usuarioCompleto->confirmado==="1"){
        $usuarioCompleto->token();
        $usuarioCompleto->actualizar();
        $mail=new mail;
        $mail->recupear($usuarioCompleto->nombre,$usuarioCompleto->email,$usuarioCompleto->token);

        User::setAlerta('exito','Hemos enviado las instrucciones a tu email');
       }
        
     }
     

    }


    $alertas=User::getAlertas();

    $router->render('principal/recuperar',[
        'alertas'=>$alertas
    ]);

   }

   public static function reestablecer(Router $router){

    $alertas=[];
    $error=false;
    $token=l($_GET['token']);
    $usuario=User::where('token',$token);


    if(empty($usuario)){
        User::setAlerta('error','Token No Valido');
        $error=true;
    }
   
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $password= new User($_POST);
       $alertas= $password->validarPassword();

       if($password->password===$_POST['password2']){
        if(empty($alertas)){
            $usuario->password=null;
            $usuario->password=$password->password;
            $usuario->hash();
            $usuario->token=null;
           $resultado= $usuario->actualizar();
           if($resultado){
            header('Location: /login?resultado=1');
           }
           }
       }else{
        User::setAlerta('error','Las contraseñas no son iguales');
       }
      
    }
    $alertas=User::getAlertas();
    $router->render('principal/reestablecer',[
        'alertas'=>$alertas,
        'error'=>$error
    ]);
   }
}