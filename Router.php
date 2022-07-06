<?php 
namespace Router;

class Router{
    public array $rutasPost=[];
    public array $rutasGet=[];


    public function get($url, $fn)
    {
        $this->rutasGet[$url] = $fn;
        
    }

    public function post($url, $fn)
    {
        $this->rutasPost[$url] = $fn;
    }

    public function rutas(){



        
        $currentUrl = ($_SERVER['REQUEST_URI'] === '') ? '/' :  $_SERVER['REQUEST_URI'] ;
        $method = $_SERVER['REQUEST_METHOD'];

        $splitURL = explode('?', $currentUrl);
        // debuguear($splitURL);
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->rutasGet[$splitURL[0]] ?? null; //$splitURL[0] contiene la URL 
        } else {
            $fn = $this->rutasPost[$splitURL[0]] ?? null;
        }
       

        

        if ( $fn ) {
            // Call user fn va a llamar una función cuando no sabemos cual sera
            call_user_func($fn, $this); // This es para pasar argumentos
        } else {
            echo "Página No Encontrada o Ruta no válida";
        }

   
    }

    
    public function render($view, $datos = [],$layout=true)
    {

        // Leer lo que le pasamos  a la vista
        foreach ($datos as $key => $value) {
            $$key = $value;  // Doble signo de dolar significa: variable variable, básicamente nuestra variable sigue siendo la original, pero al asignarla a otra no la reescribe, mantiene su valor, de esta forma el nombre de la variable se asigna dinamicamente
        }

        ob_start(); // Almacenamiento en memoria durante un momento...

        // entonces incluimos la vista en el layout
       
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Limpia el Buffer
        if($layout){
            include_once __DIR__ . '/views/layout.php';      
        }else{
            include_once __DIR__ . '/views/layoutAdmin.php';     
        }
        
        
        
    }
}