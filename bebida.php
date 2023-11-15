<?php

class Bebida extends Articulo {
    private $alcoholica;

    public function __construct($nombre, $costo, $precio, $contador, $alcoholica)
     {
        parent::__construct($nombre, $costo, $precio, $contador);
        $this->alcoholica = $alcoholica;
    }

    public function getAlcoholica() 
    {
        return $this->ingredientes;
    }
}

?>
