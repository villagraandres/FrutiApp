<?php
namespace Model;


class OrdenesProd extends Methods{

    protected static $tabla='ordenesproductos';
    protected static $columnasdb=['id','ordenesId','productoId','cantidad'];
    public $id;
    public $ordenesId;
    public $productoId;
    public $cantidad;
    public $nombre;
    public $precio;


    public function __construct($args=[])
    {
        $this->id=$args['id']?? null;
        $this->ordenesId=$args['ordenesId']?? '';
        $this->cantidad=$args['cantidad']?? '';
        $this->productoId=$args['productoId']?? '';
        $this->cantidad=$args['cantidad']?? '';
        $this->nombre=$args['nombre']?? '';
        $this->precio=$args['precio']?? '';
    }
}