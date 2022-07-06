<?php

namespace Controller;


class APIController{



    public static function agregar(){
      if($_SERVER['REQUEST_METHOD']==='POST'){
       $datos=$_POST;
      }
      echo json_encode($datos);
    }
}