<div class="container">
    <h2 class="text-center">Recuperar Contraseña</h2>

    <p>Ingresa el email con el que creaste tu cuenta</p>

    <?php if($error) return?>
    <div class="mt-4">
    <form method="POST">
    <?php include_once __DIR__ . "/../templates/alertas.php";?>

    <div class="mb-3">
           <label for="email"class="form-label">Correo Electronico</label>
            <input type="email" class="form-control" name="email">
           </div>
           <input type="submit"  class="btn btn-primary btn-lg text-white" value="Recuperar">   
    </form>
    </div>
    
</div>