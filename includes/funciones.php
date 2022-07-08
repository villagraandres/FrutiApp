<?php

define('CARPETA_IMG',$_SERVER['DOCUMENT_ROOT'].'/build/imagenes/');
define('CARPETA_IMG2',$_SERVER['DOCUMENT_ROOT'].'/img2/');


function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function l($html):string{
    $l=htmlspecialchars($html);
    return $l;
}

function valirRedireccionar(){
    //Validar que el id de URL sea valido
    $id=$_GET['id'];
    $id=filter_var($id,FILTER_VALIDATE_INT );
    if (!$id) {
    header("Location:/admin");
    }
    return $id;
}

/* Validar que sea el usuario */

function validarUsuario($idGet){
    session_start();
    $id=$_SESSION['id'];

    if($id===$idGet){
      
    }else{
        header('Location: /');
    }
}