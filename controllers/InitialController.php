<?php
namespace Controller;

use Clase\mail;
use Model\Orden;
use Model\OrdenesProd;
use Model\Producto;
use Model\User;
use Router\Router;



class InitialController{
    public static function index(Router $router){
      $productosClientes=Producto::whereAll('seccion',1,3);
      $productosOrganicos=Producto::whereAll('seccion',2,3);

   


      $router->render('principal/index',[
        'productosClientes'=>$productosClientes,
        'productosOrganicos'=>$productosOrganicos,
      ]);  
    }
    public static function nosotros(Router $router){
       

        $router->render('principal/nosotros');

    }
    public static function contacto(Router $router){
       $alertas=[];
       $resultado=$_GET['resultado'] ?? '';
       
       if($resultado==1){
        $alertas=User::setAlerta('exito','Mensaje Enviado Correctamente');
       }


      if($_SERVER['REQUEST_METHOD']==='POST'){
        
        //Validar
        if(!$_POST['nombre']){
          $alertas= User::setAlerta('error','El nombre es obligatorio');
        }
        if(!$_POST['email']){
          $alertas= User::setAlerta('error','El nombre es obligatorio');
        }
        if(!$_POST['mensaje']){
          $alertas= User::setAlerta('error','El mensaje es obligatorio');
        }

        $correo=$_POST['email'] ?? '';
        $nombre=$_POST['nombre'] ?? '';
        $mensaje=$_POST['mensaje'] ?? '';

        
      if(empty($alertas)){
        $mail= new mail();
        $resultado= $mail->mensaje($nombre,$correo,$mensaje);
        if($resultado){
          header('Location: /contacto?resultado=1');
        }
      }

      }
      


      $alertas=User::getAlertas();



      $router->render('principal/contacto',[
        'alertas'=>$alertas
      ]);

  }

  public static function producto(Router $router){

   
        
    if(!is_numeric($_GET['id'])) return;
   
    $producto=Producto::where('id',$_GET['id']);
  
    $autenticado= Producto::auth();
    
    
   
    $router->render('principal/producto',[
      'producto'=>$producto,
      'autenticado'=>$autenticado
    ]);
  }

  public static function productos(Router $router){
    $productos= Producto::all();
   
    $router->render('principal/productos',[
      'productos'=>$productos
    ]);
  }

  public static function orden(Router $router){

    $productos=Producto::all();
    //pasamos id para poder leerlo con js
    session_start();
    $id=$_SESSION['id'];
    $nombre=$_SESSION['nombre'];

 


    $router->render('principal/orden',[
     'productos'=>$productos,
     'id'=>$id,
     'nombre'=>$nombre
    ]);
  }


  /* Perfil de usuario */

  public static function ordenes(Router $router){

            
    if(!is_numeric($_GET['id'])) return;
   
    $id=l($_GET['id']);
    validarUsuario($id);

    $usuario=User::where('id',$id);

    $ordenes=Orden::whereAll('usuarioId',$id,100);

    
  

    $router->render('perfil/index',[
      'usuario'=>$usuario,
      'ordenes'=>$ordenes
    ]);
  }

  public static function detalles(Router $router){

             
    if(!is_numeric($_GET['id'])) return;


   
    $id=l($_GET['id']);
    

     //Consultar la DB
     $consulta="SELECT productos.nombre, ordenesproductos.cantidad,productos.precio FROM ordenes LEFT OUTER JOIN ordenesproductos ON ordenes.id=ordenesproductos.ordenesId 
     LEFT OUTER JOIN productos ON productos.id=ordenesproductos.productoId WHERE ordenes.id=$id";
    
    $resultado= OrdenesProd::JOIN($consulta);
  

    //Obtener el id del cliente para regresarlo a su home page
    session_start();
    $id=$_SESSION['id'];
    
    $router->render('perfil/detalle',[
      'productos'=>$resultado,
      'id'=>$id
    ]);
  }
}