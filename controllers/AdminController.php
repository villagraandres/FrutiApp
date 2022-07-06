<?php

namespace Controller;

use Model\Producto;
use Router\Router;
use Intervention\Image\ImageManagerStatic as Image;

class AdminController{

    public static function index(Router $router){


        $router->render('admin/index',[],false);  
    }



    public static function productos(Router $router){

        $producto= new Producto();
       $productos= $producto->all();
       

       if($_SERVER['REQUEST_METHOD']==='POST'){
        $id=$_POST['id'];
        $id=filter_var($id,FILTER_VALIDATE_INT);
        if($id){

         $producto=Producto::where('id',$id);  
       $resultado=  $producto->eliminar(CARPETA_IMG);
       if($resultado){
        header('Location: /admin?resultado=3');
       }
        }
     }
      
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
             chmod(CARPETA_IMG.$nombreImagen,777);
            $Image->save(CARPETA_IMG.$nombreImagen);
            chmod(CARPETA_IMG.$nombreImagen,777);

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

    public static function eliminar(Router $router){

        $producto=Producto::where('id',$_GET['id']);
        $actual= CARPETA_IMG.$producto->imagen;
        $siguiente=CARPETA_IMG2.$producto->imagen;
        rename($actual,$siguiente );
        
        $router->render('admin/eliminar',[],false);
    }


}