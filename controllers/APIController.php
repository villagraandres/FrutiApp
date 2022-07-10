<?php

namespace Controller;

use Clase\mail;
use Model\Methods;
use Model\Orden;
use Model\OrdenesProd;
use Model\Producto;
use Model\User;

class APIController{

  public static function orden(){
  $orden= new Orden($_POST);
  $resultado=$orden->crear();
  $id=$resultado['id']; 

  $idProductos= explode(",", $_POST['productos']);
  $cantidad= explode(",", $_POST['cantidad']);



  foreach($idProductos as $key=>$value){
    $suma=0;
    $args=[
      'ordenesId'=>$id,
      'productoId'=>$value,
      'cantidad'=>$cantidad[$key]
    ];
    $suma=$suma+1;
    $ordenProd= new OrdenesProd($args);
   $resultado2= $ordenProd->crear();
  
  }

  if($resultado){
    //enviar correo
    $correo= new mail;
    $correo->avisoOrden();
  }

    //Converitmos string a arreglo
  echo json_encode(['resultado'=>$resultado]); 
}
public static function eliminar(){
  if ($_SERVER['REQUEST_METHOD']==='POST') {
    $id=$_POST['id'];
    $orden=Orden::where('id',$id);
    $orden->eliminarOrden();
    echo json_encode(['resultado'=>$_POST]);
  }
}

public static function eliminarCuenta(){
  if ($_SERVER['REQUEST_METHOD']==='POST') {
    $id=$_POST['id'];
    $orden=User::where('id',$id);
    $orden->eliminarOrden();
    echo json_encode(['resultado'=>$_POST]);
  }
}

public static function eliminarProducto(){
  if ($_SERVER['REQUEST_METHOD']==='POST') {
    $id=$_POST['id'];
    $orden=Producto::where('id',$id);
    $orden->eliminarOrden();
    echo json_encode(['resultado'=>$_POST]);
  }
}
} 

