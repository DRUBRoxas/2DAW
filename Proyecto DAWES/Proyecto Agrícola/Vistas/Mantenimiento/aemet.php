<?php
$doc = new DOMDocument();
//Leer datos de la AEMET
$xml = file_get_contents("http://www.aemet.es/xml/municipios/localidad_23086.xml");
//Cargo los datos en el documento
$doc->loadXML($xml);

//Buscar los días con probabilidad de lluvia mayor que 80
$nodos = $doc->getElementsByTagName("prob_precipitacion");
//recorremos la colección de nodos y busco valores mayores que 80
foreach ($nodos as $nodo) {
    $salida = "";
    if ($nodo->nodeValue >= "0") {
        $salida = "El día: " . $nodo->parentNode->getAttribute('fecha') .
            " hay probalidad de precipitación de un " . $nodo->nodeValue;
        if ($nodo->hasAttribute('periodo')) {
            $salida .= " durante el periodo " . $nodo->getAttribute('periodo');
        }
        $salida .= "<br>";
    }
    echo $salida;
}
