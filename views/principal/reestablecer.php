<div class="container">
    <h2 class="text-center">Reestablecer Contraseña</h2>
    <p>Modifica tu contraseña</p>


    <form method="POST" class="mt-4">
    <?php include_once __DIR__ . "/../templates/alertas.php";?>

    
    <div class="mb-3">
           <label for="email"class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="password">
           </div>

           <div class="mb-3">
           <label for="email"class="form-label">Confirma tu contraseña</label>
            <input type="password" class="form-control" name="password2">
           </div>
           <input type="submit"  class="btn btn-primary btn-lg text-white" value="Reestablecer">   
    </form>
</div>