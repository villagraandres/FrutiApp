<?php
namespace Model;
class User extends Methods{
protected static $tabla="usuarios";
protected static $columnasdb=['id','nombre','apellido','email','telefono','rol','token','password','confirmado'];

public function __construct($args=[])
{
    $this->id=$args['id'] ?? null;
    $this->nombre=$args['nombre'] ?? '';
    $this->apellido=$args['apellido'] ?? '';
    $this->email=$args['email'] ?? '';
    $this->telefono=$args['telefono'] ?? '';
    $this->rol=$args['rol'] ?? '0';
    $this->token=$args['token'] ?? '';
    $this->password=$args['password'] ?? '';
    $this->confirmado=$args['confirmado'] ?? '0';
}


    public function validarCuenta(){
        if(!$this->nombre){
            self::$alertas['error'][]='El nombre es Obligatorio';
        }
        if(!$this->apellido){
            self::$alertas['error'][]='El Apellido es Obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'][]='El Email es Obligatorio';
        }
        if(!$this->telefono){
            self::$alertas['error'][]='El Telefono es Obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][]='La Contraseña es Obligatoria';
        }
        if($this->password<8){
            self::$alertas['error'][]='La Contraseña debe tener al menos 8 caracteres';
        }

        return self::$alertas;
    }

    public function validarLogin(){
        if(!$this->email){
            self::$alertas['error'][]='El Email es Obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][]='El Password es Obligatorio';
        }
        return self::$alertas;
    }

    public function existe($correo){
        $query=" SELECT * FROM usuarios WHERE email='$correo' LIMIT 1 ";
        
        $resultado=self::$db->query($query);

        if($resultado->num_rows){
            self::$alertas['error'][] = 'El Usuario ya esta registrado';
        }
        return $resultado;

    }


    public function hash(){
        $this->password=password_hash($this->password,PASSWORD_BCRYPT);
    }
    public function token(){
        $this->token=uniqid();
    }
    public function password($password){
        $resultado=password_verify($password,$this->password);
       if(!$this->confirmado){
        self::$alertas['error'][]='Esta cuenta no ha sido confirmada';
       }
        if(!$resultado){
            self::$alertas['error'][]='La contraseña es Incorrecta';
        }
        if($resultado&& $this->confirmado){
            return true;
        }
    }



}