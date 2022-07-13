<div class="container mt-4">
    <h2 class="text-center">Cuenta</h2>
    <p>Agrega o elimina cuentas de administración</p>

    

    <h3 class="mt-4 text-center">Agregar Cuenta</h3>
    <?php include_once __DIR__ . "/../templates/alertas.php";?>
    <form method="POST" action="/admin/cuenta">
    <div class="mb-3">
           <label for="email"class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email">
           </div>

            <div class="mb-5">
            <label for="inputPassword5" class="form-label">Password</label>
             <input type="password" id="inputPassword5" class="form-control" name="password" aria-describedby="passwordHelpBlock" >
            </div>
            <input type="submit"  class="btn btn-primary btn-lg text-white" value="Crear">   
    </form>

    <div class="cuentas mt-5">
    <h3>Cuentas existentes:</h3>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Correo</th>
      <th scope="col">Acciones</th>
     
    </tr>
  </thead>
  <tbody>
    <?php foreach($usuariosAdmin as $usuarios): ?>
    <tr>
      <th scope="row"><?php echo $usuarios->id ?></td>
      <td><?php echo $usuarios->email ?></td>
      <td>
      <button  class="btn btn-danger text-white mt-2 eliminar-orden " data-id="<?php echo $usuarios->id?>" >Eliminar Cuenta</button>
      </td>
     
    </tr>
   <?php endforeach ?>
  </tbody>
</table>

    </div>
 
<script>
   const alerta=document.querySelector('.exito');
   if(alerta){
    setTimeout(() => {
          alerta.remove();
      }, 2000);
   }
</script>
</div>

<?php
$script="
    <script src='/build/js/cuentas.js'></script>
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    "
?>