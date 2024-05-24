<?php
class Torneo{
    private $colPartidos;
    private $importePremio;
    public function __construct ($importePremio){
        $this->importePremio = $importePremio;
        $this->colPartidos = [];
    }

    public function getColPartidos(){
        return $this->colPartidos;
    }

    public function getImportePremio(){
        return $this->importePremio;
    }

    public function setColPartidos($nuevo){
        $this->colPartidos = $nuevo;
    }

    public function setImportePremio($nuevo){
        $this->importePremio = $nuevo;
    }

    public function ingresarPartido($objEquipo1, $objEquipo2,$fecha,$tipoPartido){
        $partido = null;
        if($objEquipo1->getCantJugadores() == $objEquipo2->getCantJugadores() && $objEquipo1->getObjCategoria()->getDescripcion() == $objEquipo2->getObjCategoria()->getDescripcion()){
            $idPartido = count($this->getColPartidos())+1;
            if ($tipoPartido == "Futbol"){
                $partido= new PartidoFutbol ($idPartido, $fecha,$objEquipo1,0,$objEquipo2,0);
            } else {
                $partido= new PartidoBasquetbol ($idPartido, $fecha,$objEquipo1,0,$objEquipo2,0,0);
            }
        }
        return $partido;
    }

    public function darGanadores($deporte){
        $colPartidosCopia = $this->getColPartidos();
        $colPartidosDeporte = [];
        if ($deporte == "futbol"){
            foreach($colPartidosCopia as $partido){
                if ($partido instanceof PartidoFutbol){
                    if (!$partido->darEquipoGanador()==null){
                        array_push($colPartidosDeporte,$partido->darEquipoGanador());
                    }
                }
            }
        }elseif ($deporte == "basquet"){
            foreach($colPartidosCopia as $partido){
                if ($partido instanceof PartidoBasquetbol){
                    if (!$partido->darEquipoGanador()==null){
                        array_push($colPartidosDeporte,$partido->darEquipoGanador());
                    }
                }
            }
        }
        return $colPartidosDeporte;
    }

    public function calcularPremioPartido($objPartido){
        $ganador = [];
        $equipoGanador=$objPartido->darEquipoGanador();
        $coefPartido= $objPartido->coeficientePartido();
        $premioPartido = $coefPartido * $this->getImportePremio();
        $ganador[0] =[
            'EquipoGanador' => $equipoGanador,
            'premioPartido' => $premioPartido
        ] ;
        return $ganador;
    }

    public function PartidosString(){
        $colPartidos = $this->getColPartidos();
        $cadena="";
        foreach($colPartidos as $partido){
            $cadena .= $partido;
        }
        return $cadena;
    }

    public function __toString(){
        $cadena = "Partidos: \n" . $this->PartidosString() . "\n";
        $cadena .= "Importe del premio: " . $this->getImportePremio() . "\n";
        return $cadena;
    }
}