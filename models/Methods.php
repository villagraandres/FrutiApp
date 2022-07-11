<?php
namespace Model;
class Methods{
    protected static $db;
    protected static $columnasdb=[];
    protected static $tabla='';
    //Alertas
    protected static $alertas=[];

    public static function db($database){
        self::$db=$database;
    }


    public function sincronizar($args=[]){
        foreach($args as $key=>$value){
            if(property_exists($this,$key)&& !is_null($value)){
                $this->$key=$value;
            }
        }
    }

    public static function getAlertas() {
        return static::$alertas;
    }

    public static function setAlerta($tipo,$mensaje){
        static::$alertas[$tipo][]=$mensaje;
    }

    public static function consultarDB($query){
        $resultado=self::$db->query($query);
        
        //Iterar
        $array=[];

        while($registro=$resultado->fetch_assoc()){
            $array[]=static::crearObjeto($registro);
          
        }
       
        //liberar
        $resultado->free();
       
        return $array;
    }

    public static function crearObjeto($registro){
        $objeto= new static;

        foreach($registro as $key=>$value){
            if(property_exists($objeto,$key)){
                $objeto->$key=$value;
            }
        }

        return $objeto;



    }
    public function atributos(){
        $atributos=[];
        foreach(static::$columnasdb as $columna){
            if($columna==='id') continue; //si es id skipealo
            $atributos[$columna]=$this->$columna;
        }
        return $atributos;
    }


    public function sanitizar(){
        $atributos=$this->atributos();
        $sanitizado=[];
        foreach($atributos as $key=>$value){
            $sanitizado[$key]=self::$db->escape_string($value);
        }
        return $sanitizado;

    }
     public function crear(){
        $atributos=$this->sanitizar();
        $query=" INSERT INTO ".static::$tabla." ( ";
        $query .=join(',',array_keys($atributos));
        $query.= ") VALUES ( '";
        $query .= join("', '",array_values($atributos));
        $query .= " ') ";
        
       
       
        $resultado=self::$db->query($query);
       
     
         return [
            'resultado'=>$resultado,
            'id'=>self::$db->insert_id
            
        ]; 
    } 

    public static function where($columna,$valor){
        
        $query = "SELECT * FROM " . static::$tabla  ." WHERE ${columna} = '${valor}'";
    
        $resultado=self::consultarDB($query);
        return array_shift( $resultado ) ;
       
      
    }
    public static function whereAll($columna,$valor,$limite){
        
        $query = "SELECT * FROM " . static::$tabla  ." WHERE ${columna} = '${valor}' LIMIT $limite ";
        
    
        $resultado=self::consultarDB($query);
        return $resultado;
      
    }
    public function actualizar(){
        //Sanitizar y obtener atributos
        $atributos=$this->sanitizar();

        //Iterar
        $array=[];
        foreach($atributos as $key=>$value){
            $array[] = "{$key}='{$value}'";
        }
        
        $query=" UPDATE ". static::$tabla." SET ";
        $query.=join(', ',$array);
        $query.= " WHERE id= '". self::$db->escape_string($this->id)." ' ";
        $query.=" LIMIT 1";
       
       
      
        $resultado=self::$db->query($query);
        return $resultado;
    }

    public function eliminar($ruta){
        $query="DELETE FROM ". static::$tabla." WHERE id=". self::$db->escape_string($this->id) ." LIMIT 1";
        
        $resultado=self::$db->query($query);

        if($resultado){
            $this->borrarImg($ruta);
            header('Location: /admin/productos');
        }

        return $resultado;

    }
    public function eliminarOrden(){
        $query="DELETE FROM ". static::$tabla." WHERE id=". self::$db->escape_string($this->id) ." LIMIT 1";
        
        $resultado=self::$db->query($query);
        if($resultado){
            $this->borrarImg();
            header('Location: /admin/productos');
        }
        return $resultado;

    }
    public function borrarImg(){
        $existe=file_exists('imagenes/'.$this->imagen);
        if($existe){
         
           
           $result=  unlink('imagenes/'.$this->imagen); 
           
        }
    }
    public function setImagen($imagen,$ruta){

      
        if ($this->id) {
            $existeArchivo=file_exists('imagenes/'.$this->imagen);
            if ($existeArchivo) {
              
            
                
               unlink('imagenes/'.$this->imagen); 
            }
         }
        if($imagen){
            $this->imagen=$imagen;
        }
    }

    public  static function all(){
        $query="SELECT * FROM ".static::$tabla;
        $resultado=self::consultarDB($query);
       
        return $resultado;
    }

    public function guardar(){
        if (!is_null($this->id)) {
            $this->actualizar();
        }else{
            $this->crear();
        }
    }

    public static function auth(){
    session_start();
     $nombre=$_SESSION['nombre'] ?? '';
        if($nombre){
            return true;
        }else{
            return false;
        }

    }

    public static function JOIN($consulta){
        $query=$consulta;
       $resultado=self::consultarDB($consulta);
       return $resultado;
    }
    
  
}