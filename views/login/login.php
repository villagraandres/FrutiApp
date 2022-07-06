<div class="container">
    <h1 class="text-center">Iniciar Sesión</h1>

    <form method="POST" action="/login">
    <?php include_once __DIR__ . "/../templates/alertas.php";?>
        
            <!-- Campo -->
           <div class="mb-3">
           <label for="email"class="form-label">Correo Electronico</label>
            <input type="email" class="form-control" name="email">
           </div>
           <div class="mb-3">
           <label for="inputPassword5" class="form-label">Password</label>
            <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="password">
            </div>
         <input type="submit"  class="btn btn-primary btn-lg text-white" value="Iniciar Sesión">   

         
    </form>
</div>