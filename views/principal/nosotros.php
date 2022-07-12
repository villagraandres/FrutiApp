<h1 class="text-center mb-5">¿Quienes Somos?</h1>

<div class="container nosotros-container">
   
<img id="photo" src="/build/img/nosotros.jpg" class="img-fluid" alt=""  onclick=dance();>
    <section class="container">
        <p class="text-center">Somos una empresa familiar creada con un solo proposito: llevarte productos frescos y de comercio justo hasta tu mesa, contamos con experiencia de 20 años en los cuales trabajamos de la mano con productores para asegurarnos que recibas siempre calidad y buen precio  </p>
    
        <div class=" mt-4" style="text-align: center;">

        <img  src="/build/img/plant.png " alt="" width="50" height="50" class="brand-imagen animacion2">
        </div>

    </section>
   

   
    
</div>



<?php

$script="

<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js'></script>

"
?>

<script>
      var photo = document.getElementById("photo");

function dance() {
  TweenLite.to(photo, 2, {
    rotation: "+=360"
  });
}


</script>



    