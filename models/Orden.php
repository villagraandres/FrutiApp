<?php
namespace Model;

class Orden extends Methods{
    protected static $tabla='ordenes';
    protected static $columnasdb=['id','fecha','hora','usuarioId'];

    public $id;
    public $fecha;
    public $hora;
    public $usuarioId;

    public function __construct($args=[])
    {
        $this->id=$args['id'] ?? null;
        $this->fecha=$args['fecha'] ?? '';
        $this->hora=$args['hora'] ?? '';
        $this->usuarioId=$args['usuarioId'] ?? '';

    }

}