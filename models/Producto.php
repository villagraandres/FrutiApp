<?php
namespace Model;

class Producto extends Methods{
    protected static $tabla='productos';
    protected static $columnasdb=['id','nombre','resumen','descripcion','precio','imagen','seccion'];

    public function __construct($args=[])
    {
        $this->id=$args['id'] ?? null;
        $this->nombre=$args['nombre'] ?? '';
        $this->resumen=$args['resumen'] ?? '';
        $this->descripcion=$args['descripcion'] ?? '';
        $this->precio=$args['precio'] ?? '';
        $this->imagen=$args['imagen'] ?? '';
        $this->seccion=$args['seccion'] ?? '';
    }

    public function validar(){


        if(!$this->nombre){
            self::$alertas['error'][]='El nombre del producto es obligatorio';
        }
        if(!$this->resumen){
            self::$alertas['error'][]='El Resumen es obligatorio';
        }
        if(!$this->descripcion){
            self::$alertas['error'][]='La descripcion es obligatoria';
        }
        if(!$this->precio){
            self::$alertas['error'][]='El precio del producto es obligatorio';
        }
      
        if(!$this->imagen){
            self::$alertas['error'][]='La Imagen es Obligatoria';
        }
        if(!$this->seccion){
            self::$alertas['error'][]='La Seccion del producto es Obligatoria';
        }

        return self::$alertas;
    }
    public static function seccion($seccion){
        switch ($seccion) {
            case 1:
               echo "Favoritos de los Clientes";
                break;
            case 2:
                echo "Productos Organicos";
                 break;
            case 3:
                echo "General";
                 break;
            
            default:
               echo  "No hay seccion";
                break;
        }
    }
}