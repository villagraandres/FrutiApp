
<div class="container">
    <h2 class="text-center mt-5">Crear Producto</h2>
    <p>Llena Correctamente el siguiente formulario</p>
</div>


<div class="container">
<form action="/admin/crear-producto" method="POST" enctype="multipart/form-data">
<?php include_once __DIR__ . "/../templates/alertas.php";?>
    <?php include_once 'formulario.php'; ?>


<div class="container mt-4">
    <input type="submit" class="btn btn-primary btn-lg" value="Crear">
</div>
   
</form>
</div>




     