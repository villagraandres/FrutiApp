<h1>Eliminar</h1>
<?php

use Model\Producto;



$id=$_GET['id'];
$id=filter_var($id,FILTER_VALIDATE_INT);
$producto=Producto::where('id',$id);  
 $FilePath=CARPETA_IMG;
 // Path relative to where the php file is or absolute server path
 chdir($FilePath); // Comment this out if you are on the same folder
 chown(CARPETA_IMG.$producto->imagen,465); //Insert an Invalid UserId to set to Nobody Owner; for instance 465
 $do = unlink(CARPETA_IMG.$producto->imagen);




?>