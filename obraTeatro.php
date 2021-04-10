<?php
/**
 * PERCEVAL MISTCHENCO, AUGUSTO
 * FAI-3085
 */
class obraTeatro{
 
 //atributos
    private $nombre;
     private $horaInicio;
    private $duracionObra;
    private $precio;
//metodos

public function __construct($nombre, $horaInicio , $duracionObra , $precio){
    $this->nombre=$nombre;
    $this->horaInicio=$horaInicio;
    $this->duracionObra=$duracionObra;
    $this->precio=$precio;
}

public function getNombre(){
    return $this->nombre;

}

public function getHoraInicio(){
    return $this->horaInicio;
}

public function getDuracion(){
    return $this->duracionObra;
}

public function getPrecio(){
    return $this->precio;
}

public function setNombre($nombre){
    $this->nombre=$nombre;
}
public function setHoraInicio($horaInicio){
    $this->horaInicio=$horaInicio;
}

public function setDuracion($duracionObra){
    $this->duracionObra=$duracionObra;
}
public function setPrecio($precio){
    $this->precio=$precio;
}

public function cambiarNombre($nombreNuevo){
    $this->setNombre($nombreNuevo);
}

public function cambiarPrecio($precio){
    $this->setPrecio($precio);
}

public function __toString()
{
    return $this->getNombre().$this->getHoraInicio().$this->getDuracion().$this->getPrecio();
}

}
?>