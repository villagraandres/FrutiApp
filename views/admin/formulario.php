   <!-- Campo -->
   <div class="container">


   <div class="mb-3">
           <label for="email"class="form-label">Nombre del Producto</label>
            <input type="text" class="form-control" name="nombre" value="<?php echo $producto->nombre ?>">
   </div>
   <!-- Campo -->
   <label for="">Resumen</label>

   <div class="form-floating mb-4">
             <textarea name="resumen" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"><?php echo $producto->resumen ?></textarea>
             <label for="floatingTextarea2">Comments</label>
             <div id="emailHelp" class="form-text">Resume brevemente el articulo, no mayor a 30 palabras</div>
        </div>
    <!-- Campo -->


    <label for="">Descripcion</label>
    <div class="form-floating mb-4">
             <textarea name="descripcion" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"><?php echo $producto->descripcion ?></textarea>
             <label for="floatingTextarea2">Comments</label>
             <div id="emailHelp" class="form-text">Describe el articulo </div>
        </div>
    <!-- Campo -->

    <div class="mb-3">
           <label for="email"class="form-label">Precio</label>
            <input type="number" class="form-control" name="precio" value="<?php echo $producto->precio ?>">
   </div>
   <!-- Campo -->

   <!-- Campo -->
   <div class="mb-3">
    <label for="">Seleccionar Seccion</label>
    
    <div id="emailHelp" class="form-text">Selecciona la seccion donde el producto se mostrara, </div>
   <select class="form-select" aria-label="Default select example" name="seccion" id="seleccion">
        <option disabled selected>Elige la opción</option>

    
    
   
        <option <?php if($producto->seccion==1){echo "selected";} ?>  value="1">Favoritos de los Clientes</option>
        <option <?php if($producto->seccion==2){echo "selected";} ?> value="2">Productos Organicos</option>
        <option <?php if($producto->seccion==3){echo "selected";} ?> value="3">General</option>
        </select>
   </div>
        

<!-- Campo -->

   <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen" onchange="return pre() ">
            <div id="visorImg" >
               <?php if($producto->imagen):?>
                <img src="/imagenes/<?php echo $producto->imagen?>" class="imagen-pre mt-4" >
            <?php endif; ?>  

            </div>

        
           
          
  
  
   <script>


    function pre(){
        if (archivoInput.files && archivoInput.files[0]) {
        var visor= new FileReader();
        visor.onload=function(e){
            document.getElementById('visorImg').innerHTML=
            '<img class="imagen-pre img-fluid mt-4" src="'+e.target.result+'"   >';
        }
        visor.readAsDataURL(archivoInput.files[0])
    }
    }
    var archivoInput=document.getElementById('imagen');
   
   </script>
