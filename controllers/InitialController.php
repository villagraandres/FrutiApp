<?php
namespace Controller;

use Model\Producto;
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
       

      $router->render('principal/contacto');

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
}