<div class="container">
    <h1 class="text-center">Crear cuenta</h1>
    <?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>

    <form action="/registro" method="POST">

 
        <fieldset>
            <legend>Datos Personales</legend>
            
        <div class="mb-3">
           <label for="nombre"class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo l($user->nombre)?>">
           </div>
           <!-- Campo -->

           <div class="mb-3">
           <label for="apellidos"class="form-label">Apellidos</label>
            <input type="text" class="form-control" name="apellido" id="apellidos "value="<?php echo l($user->apellido)?>">
           </div>
           <!-- Campo -->

           <div class="mb-3">
           <label for="email"class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email"value="<?php echo l($user->email)?>">
           </div>
           <!-- Campo -->
           <div class="mb-3">
           <label for="tel"class="form-label">Telefono</label>
            <input type="tel" class="form-control" name="telefono" id="tel"value="<?php echo l($user->telefono)?>">
           </div>
           <!-- Campo -->

        </fieldset>

        <fieldset>
            <legend>Cuenta</legend>
        
            <div class="mb-5">
           <label for="inputPassword5" class="form-label">Password</label>
            <input type="password" id="inputPassword5" class="form-control" name="password" aria-describedby="passwordHelpBlock" >
            </div>

        </fieldset>
          






         <input type="submit"  class="btn btn-primary btn-lg text-white" value="Crear">   
    </form>
</div>