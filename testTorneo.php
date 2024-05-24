<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("PartidoFutbol.php");
include_once("PartidoBasquetbol.php");

$catMayores = neW Categoria(1,'Mayores');
$catJuveniles = neW Categoria(2,'juveniles');
$catMenores = neW Categoria(1,'Menores');

$objE1 = neW Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = neW Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = neW Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = neW Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = neW Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = neW Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = neW Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = neW Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = neW Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = neW Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = neW Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = neW Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);

$objTorneo1 = new Torneo (100000);

$objBasquet1 = new PartidoBasquetbol(11, 2024-05-05,$objE7,80,$objE8,120,7);
$objBasquet2 = new PartidoBasquetbol (12,2024-05-06,$objE9,81,$objE10,110,8);
$objBasquet3 =new PartidoBasquetbol(13,2024-05-07,$objE11,115,$objE12,58,9);

$objFutbol1= new PartidoFutbol(14, 2024-05-07, $objE1 , 3 , $objE2 , 2);
$objFutbol2= new PartidoFutbol(15,2024-05-07,$objE3, 0 , $objE4, 1);
$objFutbol3= new PartidoFutbol(16,2024-05-07,$objE5,2,$objE6,3);

$nuevaColPartidos = [$objBasquet1,$objBasquet2,$objBasquet3,$objFutbol1,$objFutbol2,$objFutbol3];
$objTorneo1->setColPartidos($nuevaColPartidos);

function partidoIngresado($partido){
    $cadena = "";
    if ($partido == null){
        $cadena = "No se pudo ingresar el partido. \n";
    }else {
        $cadena = $partido;
    }
}

function arregloAString($arreglo){
    $cadena="";
    foreach($arreglo as $elemento){
        $cadena .= $elemento . "\n";
    }
    return $cadena;
}

$partido1 = $objTorneo1->ingresarPartido($objE5,$objE11,"2024-05-23","Futbol");
echo $partido1;

$partido2 = $objTorneo1->ingresarPartido($objE11, $objE11,"2024-05-23","basquetbol");
echo $partido2;

$partido3 = $objTorneo1->ingresarPartido($objE9, $objE10,"2024-05-25","basquetbol");
echo $partido3;

$ganadoresBasquet = ($objTorneo1->darGanadores("basquet"));
echo arregloAString($ganadoresBasquet) . "\n";
$ganadoresFutbol = ($objTorneo1->darGanadores("futbol"));
echo arregloAString($ganadoresFutbol). "\n";

echo $objTorneo1;

$premio1 = ($objTorneo1->calcularPremioPartido($objBasquet1));
echo arregloAString($premio1) . "\n";
?>
