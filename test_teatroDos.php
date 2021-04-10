<?php

/**
 * PERCEVAL MISTCHENCO, AUGUSTO
 * FAI-3085
 */
include "teatroDos.php";

$nombreTeatro="Argentina";
$direccionTeatro="San francisco 625";
$obras=array();
$teatro=new teatroDos($nombreTeatro,$direccionTeatro, $obras);

function seleccionarOpcion(){
    // @opcionValida Booleana - bandera
    // @opcion INT  - devuelve la opcion ingresada
        echo "--------------------------------------------------------------\n";
        echo "\n ( 1 ) Cambiar Nombre y precio del teatro de la funcion"; 
        echo "\n ( 2 ) Agregar una nueva funcion "; 
        echo "\n ( 3) Mostrar todas las funciones del teatro";
        echo "\n ( 4 ) Salir"; 
        echo "\n --------------------------------------------------------------\n";
        // Validamos la opcion ingresada sino solicitamos ingrese un opcion correcta
        do{
            echo "Indique una opcion valida :";
            $opcion = (trim(fgets(STDIN)));
            if($opcion < 1 && $opcion > 4){
                echo "Debe ingresar una opcion valida \n";
                $opcionValida = false;
            }else{
                $opcionValida = true;
            }
        }while(!$opcionValida);
        
        return $opcion;
}


do{
    $nombre="";
    $horaInicio="";
    $duracionObra="";
    $precio="";
    $obra= new obraTeatro($nombre,$horaInicio,$duracionObra,$precio);
    $opcion=seleccionarOpcion();
    switch($opcion){

        case 1:
            
            echo "Seleccione el nuevo nombre para la funcion: ";
            $nombre=(trim(fgets(STDIN)));
            $obra->cambiarNombre($nombre);
            
            echo "Seleccione el nuevo precio de la funcion";
            $precio=(trim(fgets(STDIN)));
            $obra->cambiarPrecio($precio);

            echo "Seleccione el nuevo horario de inicio";
            $horaInicio=(trim(fgets(STDIN)));
            $obra->setHoraInicio($horaInicio);

            echo "Seleccione la duracion de la obra";
            $duracionObra=(trim(fgets(STDIN)));
            $obra->setDuracion($duracionObra);
            $teatro->cargarFuncion($nombre,$horaInicio,$duracionObra,$precio);
        break;
        
        case 2:
            do{

                echo "Seleccione el  nombre para la funcion: ";
                $nombre=(trim(fgets(STDIN)));
                
                echo "Seleccione el  precio de la funcion";
                $precio=(trim(fgets(STDIN)));
            
                echo "Cargue el horario de inicio de la nueva funcion: ";
                $horaInicio=(trim(fgets(STDIN)));
            
                echo "cargue la duracion de la obra: ";
                $duracionObra=(trim(fgets(STDIN)));
                
                $verificar=$teatro->cargarFuncion($nombre, $horaInicio, $duracionObra , $precio);
            
            if(!$verificar){
                echo "ya existe un horario para esa obra, Ingrese los datos nuevamente: "."\n";
            }
            }while(!$verificar);
        
        break;

        case 3:
          echo $teatro;
        break;
        
        
        
    }
}while($opcion!=4);




