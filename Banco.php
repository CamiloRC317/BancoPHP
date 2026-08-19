<?php

$usuarios=[

"usuario1"=>[
    "id"=>1,
    "nombre"=>"camilo",
    "numero_cuenta"=>123,
    "saldo"=>100000,
    "contraseña"=>"a"
    ],
"usuario2"=>[
    "id"=>2,
    "nombre"=>"valentina",
    "numero_cuenta"=>124,
    "saldo"=>250000,
    "contraseña"=>"b"
    ],
"usuario3"=>[
    "id"=>3,
    "nombre"=>"santiago",
    "numero_cuenta"=>125,
    "saldo"=>75000,
    "contraseña"=>"c"
    ],
"usuario4"=>[
    "id"=>4,
    "nombre"=>"laura",
    "numero_cuenta"=>126,
    "saldo"=>500000,
    "contraseña"=>"d"
    ],
"usuario5"=>[
    "id"=>5,
    "nombre"=>"mateo",
    "numero_cuenta"=>127,
    "saldo"=>30000,
    "contraseña"=>"e"
    ]

];
while (true) {
    echo "DIGITE SU NUMERO DE CUENTA (o 'salir' para terminar): ";
    $cuenta = trim(fgets(STDIN));

    if ($cuenta === "salir") {
        break;
    }

    $encontrado = false;

    foreach ($usuarios as $usuario) {
        if ($cuenta == $usuario["numero_cuenta"]) {
            echo "Cuenta existente, vas bien \n";
            $encontrado = true;
            break;
        }
    }

    if (!$encontrado) {
        echo "Cuenta no existe \n";
    }else{
       while(true){
        echo "OPCIONES DEL BANCO \n";
        echo "1)Consultar saldo \n";
        echo "2)Realizar retiro \n";
        echo "3)Consultar retiros \n";
        echo "4)Realizar transferencia \n";
        echo "5)Consultar transferencia \n";
        echo "6)Salir \n";
        $opcion=trim(fgets(STDIN));
        if($opcion==6){
	   break;
	 }
       }
    }
}

?>
