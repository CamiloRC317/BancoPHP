<?php
echo  "Digite su nombre: ";
$nombre=trim(fgets(STDIN));
$edad=20;
$altura=1.85;

echo "Hola  mi nombre es $nombre tengo $edad años y mido  $altura metros\n";
$frutas = ["manzana", "pera", "uva"];

foreach ($frutas as $fruta) {
    echo "Me gusta la $fruta\n";
}

$persona = [
    "nombre" => "Carlos",
    "edad" => 25,
    "ciudad" => "Bogotá"
];

foreach ($persona as $clave => $valor) {
    echo "$clave: $valor\n";
}

$personas = [
    ["nombre" => "Carlos", "edad" => 25, "ciudad" => "Bogotá"],
    ["nombre" => "Ana", "edad" => 30, "ciudad" => "Medellín"]
];

foreach ($personas as $persona) {
    foreach ($persona as $clave => $valor) {
        echo "$clave: $valor\n";
    }
    echo "-----\n";
}
 ?>
