<?php

namespace Controller;

use Model\Producto;
use Router\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Orden;
use Model\OrdenesProd;
use Model\User;

class AdminController{

  


    public static function productos(Router $router){

       validarAdmin();
        $producto= new Producto();
       $productos= $producto->all();
       

      /*  if($_SERVER['REQUEST_METHOD']==='POST'){
        $id=$_POST['id'];
        $id=filter_var($id,FILTER_VALIDATE_INT);
        if($id){

         $producto=Producto::where('id',$id);  
       $resultado=  $producto->eliminar(CARPETA_IMG);
       if($resultado){
        header('Location: /admin?resultado=3');
       }
        }
     } */

      
        
        $resultado=$_GET['resultado'] ?? '';
        switch ($resultado) {
            case 1:
                $alertas=Producto::setAlerta('exito','El Producto ha sido creado correctamente');
                break;

                case 2:
                    $alertas=Producto::setAlerta('exito','El Producto ha sido actualizado correctamente');
                    break;

                 case 3:
                     $alertas=Producto::setAlerta('exito','El Producto ha sido Eliminado correctamente');
                    break;
            
            
            default:
                # code...
                break;
        }

        $alertas=Producto::getAlertas();


        
         
       
       
     


        $router->render('admin/productos',[
            'productos'=>$productos,
            'alertas'=>$alertas,
           
        ],false);
    }

    public static function crear(Router $router){
        validarAdmin();
        $producto=new Producto();
        $alertas=[];

        if($_SERVER['REQUEST_METHOD']==='POST'){
           
            $producto->sincronizar($_POST);
        
                
            if($_FILES['imagen']['tmp_name']) {
            $nombreImagen = md5( uniqid()).".jpg";
               //Generar nombre
               $Image=Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
               //Setear img
               $producto->setImagen($nombreImagen,CARPETA_IMG);
              
               
              
            }

             $alertas=  $producto->validar();


           if(empty($alertas)){

            if(!is_dir(CARPETA_IMG)){
                chmod(CARPETA_IMG, 777);
                mkdir(CARPETA_IMG);
            }
        /*   $Image->save(CARPETA_IMG.$nombreImagen); */
          
        /*   debuguear( $Image->save(CARPETA_IMG.$nombreImagen));  */
       

           $resultado= $producto->crear();
            if($resultado){
                header('Location: /admin?resultado=1');
            }


           }



            
           
        }

        $router->render('admin/crear',[
            'producto'=>$producto,
            'alertas'=>$alertas
        ],false);
    }

    public static function actualizar(Router $router){
        validarAdmin();
        $alertas=[];
        
        if(!is_numeric($_GET['id'])) return;
       
         $producto=Producto::where('id',$_GET['id']);
        
       
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $producto->sincronizar($_POST);

                

            $alertas= $producto->validar();
            $nombreImagen = md5( uniqid()).".jpg";

            if($_FILES['imagen']['tmp_name']) {


               
                   //Generar nombre
                 $Image=Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
                 $producto->setImagen($nombreImagen,CARPETA_IMG);
                 
                  
                }
            

            if(empty($alertas)){
                if($_FILES['imagen']['tmp_name']) {
                     $Image->save(CARPETA_IMG.$nombreImagen); 

                }

              $resultado=  $producto->actualizar();

              if($resultado){
                header('Location: /admin?resultado=2');
              }
            }
        }
       




        $router->render('admin/actualizar',[
            'producto'=>$producto,
            'alertas'=>$alertas,
            
        ],false);
    }


    public static function ordenes(Router $router){

        validarAdmin();
    $alertas=[];

        if($_GET['numeroOrden'] ?? ''){
            
        if(!is_numeric($_GET['numeroOrden'] ?? null)) return;
        $numeroOrden=l($_GET['numeroOrden'] ?? null);

        if($numeroOrden>0){
           $resultado=Orden::where('id',$numeroOrden);
           if(!$resultado){
             Orden::setAlerta('error','No hay ninguna orden que coincida');
           }
  
        }else{
            Orden::setAlerta('error','El numero es invalido');
        }
       
        $alertas=Orden::getAlertas();

        }

        if($_GET['fecha'] ?? ''){
            $fecha=l($_GET['fecha'] ?? null);

            if($fecha){
                $resultadoFecha=Orden::where('fecha',$fecha);
                if(!$resultadoFecha){
                    Orden::setAlerta('error','No hay ninguna orden que coincida');
                }
            }
            $alertas=Orden::getAlertas();

        }

        if($_SERVER['REQUEST_METHOD']==='POST'){

            $resultadoAll=Orden::all();
          
        }




        $router->render('admin/ordenes',[
            'alertas'=>$alertas,
            'orden'=>$resultado ?? '',
            'ordenFecha'=>$resultadoFecha ?? '',
            'ordenAll'=>$resultadoAll ?? ''
        ],false);
    }

    public static function detalles(Router $router){

        validarAdmin();
                 
    if(!is_numeric($_GET['id'])) return;


   
    $id=l($_GET['id']);
    

     //Consultar la DB
     $consulta="SELECT productos.nombre, ordenesproductos.cantidad,productos.precio FROM ordenes LEFT OUTER JOIN ordenesproductos ON ordenes.id=ordenesproductos.ordenesId 
     LEFT OUTER JOIN productos ON productos.id=ordenesproductos.productoId WHERE ordenes.id=$id";
    
    $resultado= OrdenesProd::JOIN($consulta);

        
    $usuarioId=l($_GET['usuarioId']);
    $resultadoUsuario=User::where('id',$usuarioId);
  


    $router->render('admin/detalles-orden',[
        'productos'=>$resultado,
        'usuario'=>$resultadoUsuario
    ],false);
    }

    public static function cuenta(Router $router){
        validarAdmin();
        $alertas=[];

        $resultado=$_GET['resultado'] ?? '';

        switch ($resultado) {
            case 1:
                $alertas=Producto::setAlerta('exito','La cuenta ha sido creada correctamente');
                break;

              

                 case 2:
                     $alertas=Producto::setAlerta('exito','La cuenta ha sido eliminada correctamente');
                    break;
            
            
            default:
                # code...
                break;
        }



        $usuario= new User();
        if($_SERVER['REQUEST_METHOD']==='POST'){

           
           $usuario= new User($_POST);
         $alertas=  $usuario->validarLogin();

           if(empty($alertas)){
            $resultado= $usuario->existe($usuario->email);
            if($resultado->num_rows){
                $alertas=User::getAlertas();
            }else{
                 //Haseheamos
                 $usuario->hash();
                 //damos rol de admin
                 $usuario->rol=1;
                 $usuario->confirmado=1;
                 $resultado= $usuario->crear();  
                 header('Location:/admin/cuenta?resultado=1');
            }
           }
        }

        $usuariosAdmin=User::whereAll('rol',1,100);
        
        
        $alertas=User::getAlertas();

        $router->render('admin/cuenta',[
            'alertas'=>$alertas,
            'usuariosAdmin'=>$usuariosAdmin
        ],false);
    }

    public static function eliminar(){
        validarAdmin();
        $cuenta=User::where('id',$_GET['id']);

        debuguear($cuenta);
  
      $resultado= $cuenta->eliminarOrden();
      if($resultado){
        header('Location: /admin/cuenta?resultado=2');
      }
                
    }
}