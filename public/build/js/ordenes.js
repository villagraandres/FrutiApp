function iniciar(){buscarNumero(),eliminarAlertas(),buscarFecha()}function buscarNumero(){document.getElementById("boton-orden").addEventListener("click",(function(e){const n=document.getElementById("input-buscar").value;window.location="?numeroOrden="+n}))}function buscarFecha(){const e=document.getElementById("inputFecha");console.log(e)}function eliminarAlertas(){let e=document.querySelector(".alerta");e&&setTimeout(()=>{e.remove()},2e3)}document.addEventListener("DOMContentLoaded",(function(){iniciar()}));