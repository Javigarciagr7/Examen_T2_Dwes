<?php

class Articulo {
    protected $nombre;
    protected $costo;
    protected $precio;
    protected $contador;

    public function __construct($nombre, $costo, $precio, $contador) 
    {
        $this->nombre = $nombre;
        $this->costo = $costo;
        $this->precio = $precio;
        $this->contador = $contador;
    }

    public function getNombre() 
    {
        return $this->nombre;
    }

    public function getCosto() 
    {
        return $this->costo;
    }

    public function getPrecio() 
    {
        return $this->precio;
    }

    public function getContador() 
    {
        return $this->contador;
    }

    public function Mostrar() 
    {
        echo "{$this->nombre}";
    }
}
?>
