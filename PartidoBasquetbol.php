<?php
class PartidoBasquetbol extends Partido{
    private $infracciones;
        //CONSTRUCTOR
        public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$infracciones){
            parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
            $this->coefBase = 0.5;
            $this->infracciones=$infracciones;
    }

    public function getInfracciones(){
        return $this->infracciones;
    }

    public function setInfracciones($nuevo){
        $this->infracciones = $nuevo;
    }

    public function coeficientePartido (){
        $coef = $this->getCoefBase() - (0.75*$this->getInfracciones());
        return $coef;
}
    public function __toString(){
    $cadena = parent::__toString();
    $cadena.= "Infracciones: " . $this->getInfracciones() ."\n";
    $cadena.= "\n"."--------------------------------------------------------"."\n";

    return $cadena;
}
}
