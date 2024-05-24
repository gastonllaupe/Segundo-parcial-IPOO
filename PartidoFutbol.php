<?php
class PartidoFutbol extends Partido{
    //CONSTRUCTOR
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2){
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->coefBase = 0.5;
}

public function coeficientePartido (){
    $categoria = $this->getObjEquipo1()->getObjCategoria();
    if ($categoria->getDescripcion() == 'Menores'){
        $this->setCoefBase(0.13);
    }elseif($categoria->getDescripcion() == 'juveniles'){
        $this->setCoefBase(0.19);
    }else{
        $this->setCoefBase(0.27);
    }
    $coef = parent::coeficientePartido ();
    return $coef;
}

public function __toString(){
$cadena = parent::__toString();
return $cadena;
}

}