<div class="container">
    <h1 class="text-center">Quieres decirnos algo?</h1>
    <h5 class="text-center">Llena el siguiente formulario y trataremos de respondente lo mas rapido posible!</h5>
    <?php include_once __DIR__ . "/../templates/alertas.php";?>

    <form method="POST" class="mt-5">
        <fieldset>
            <legend  class="text-center">Datos Personales</legend>

            <div class="mb-3">
                <label for="email"class="form-label">Nombre</label>
                 <input type="text" class="form-control" name="nombre">
                <div id="emailHelp" class="form-text">No compartiremos estos datos con nadie.</div>
            </div>
            <!-- Campo -->
           <div class="mb-3">
           <label for="email"class="form-label">Correo Electronico</label>
            <input type="email" class="form-control" name="email">
           </div>

            
        </fieldset>

        <fieldset>
            <legend  class="text-center">Mensaje</legend>

        <div class="form-floating mb-4">
             <textarea name="mensaje" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
             <label for="floatingTextarea2">Comments</label>
        </div>
            <!-- Campo -->
          

            
        </fieldset>

        <input type="submit" class="btn btn-primary btn-lg text-white">
    </form>
</div>

<script>
   const alerta=document.querySelector('.exito');
   if(alerta){
    setTimeout(() => {
          alerta.remove();
      }, 2000);
   }
</script>