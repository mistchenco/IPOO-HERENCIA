<?php
/**
 * PERCEVAL MISTCHENCO, AUGUSTO
 * FAI-3085
 */
include "obraTeatro.php";

class teatroDos{

    //ATRIBUTOS
    private $nombreTeatro;
    private $direccionTeatro;
    private $obrasDeTeatro=array();
//METODOS 

public function __construct($nombreTeatro,$direccionTeatro,$obrasDeTeatro){
    $this->nombreTeatro=$nombreTeatro;
    $this->direccionTeatro=$direccionTeatro;
    $this->obrasDeTeatro=$obrasDeTeatro;
}

public function setNombreTeatro($nombreTeatro){
    $this->nombreTeatro=$nombreTeatro;
}

public function setDireccionTeatro($direccionTeatro){
    $this->direccionTeatro=$direccionTeatro;
}

public function setObrasTeatro($obrasDeTeatro){
    $this->obrasDeTeatro=$obrasDeTeatro;
}

public function getNombreTeatro(){
    return $this->nombreTeatro;
}

public function getDireccionTeatro(){
    return $this->direccionTeatro;
}
public function getObrasTeatro(){
    return $this->obrasDeTeatro;

}
/**
 * funcion que implemento desde el test, la cual se encarga de armar mi coleccion de funciones
 */
public function cargarFuncion($nombre, $horaInicio , $duracionObra , $precio){
    
    $obrasDeTeatro=$this->getObrasTeatro();
    $cantidad=count($obrasDeTeatro);
    $carga=false;
    $verificar=false;
    //Si la cantidad de elementos de mi arreglo es 0 no verifico el horario y creo el objeto funcion en la posicion 0 y seteo el valor
    if($cantidad==0){
        $funcion= new obraTeatro($nombre, $horaInicio, $duracionObra, $precio);
        $obrasDeTeatro[0]=$funcion;
        $this->setObrasTeatro($obrasDeTeatro);
        $carga=true;
        
    }else{
    //si cuento con un elemento verifico el horario, me retorna un boleeano
    $verificar=$this->verificarHorario($horaInicio,$duracionObra);
    }
    
    //si es true cargo una nueva funcion sobre la ultima posicion de la coleccion de funciones
    if($verificar){
        
        $cantidad=count($obrasDeTeatro);
        $funcion= new obraTeatro($nombre, $horaInicio, $duracionObra, $precio);
        $obrasDeTeatro[$cantidad]=$funcion;
        //print_r ($obrasDeTeatro); comento print_r visualiza como se va armando la coleccion correctamente
        $this->setObrasTeatro($obrasDeTeatro);
        $carga=true;
    }
    
   return $carga;
}
/**
 * verifico el horario cargado en la coleccion de funciones (no pude lograr recorrer el arreglo completo para ver los horarios ya cargados, 
 * necesito una ayuda en ese tema) compara siempre en la ultima funcion el horario
 */
    public function verificarHorario($horafuncionNueva,$duracionObraNueva){
        $sepuede=false;
        $coleccion=$this->getObrasTeatro();//
        //cuento la cantidad de elementos y recorro la coleccion
        for ($i=0; $i <count($coleccion) ; $i++) { 
            $horaInicio=$coleccion[$i]->getHoraInicio();//traigo el valor del atributo
            $horaFin=$horaInicio+$coleccion[$i]->getDuracion();
            $horaFinfuncionNueva=$horafuncionNueva+$duracionObraNueva;//no realizo conversion de horas y minutos ya que no lo requeria el enunciado
      
        }
        if(($horaFinfuncionNueva <= $horaInicio)||($horafuncionNueva>$horaFin)){//condicional que me ayudo la profe viviana
            $sepuede=true;
        }
        
       
    return $sepuede;       
    }
        
public function __toString()
{
    $funcionStr="";
    $funcionStr= "NOMBRE TEATRO: ". $this->getNombreTeatro()."\n"."DIRECCION TEATRO: ".$this->getDireccionTeatro()."\n"."Funciones"."\n"."\n";
    $colecion= $this->getObrasTeatro();
    for ($i=0; $i <count($colecion) ; $i++) { 
         $funcion=$colecion[$i];
         $funcionStr=$funcionStr."----/---"."\n".$funcion->__toString()."\n".//necesito ayuda para poder mostrar los elementos de mi arreglo un poco mas prolijo 
         "-------- "."\n";
         }
         return $funcionStr;
}
}
