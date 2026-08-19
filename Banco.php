<?php

$usuarios=[

"usuario1"=>[
    "id"=>1,
    "nombre"=>"camilo",
    "numero_cuenta"=>123,
    "saldo"=>100000,
    "contraseña"=>"a",
    "retiros"=>[],
    "transacciones"=>[]
    ],
"usuario2"=>[
    "id"=>2,
    "nombre"=>"valentina",
    "numero_cuenta"=>124,
    "saldo"=>250000,
    "contraseña"=>"b",
    "retiros"=>[],
    "transacciones"=>[]
    ],
"usuario3"=>[
    "id"=>3,
    "nombre"=>"santiago",
    "numero_cuenta"=>125,
    "saldo"=>75000,
    "contraseña"=>"c",
    "retiros"=>[],
    "transacciones"=>[]
    ],
"usuario4"=>[
    "id"=>4,
    "nombre"=>"laura",
    "numero_cuenta"=>126,
    "saldo"=>500000,
    "contraseña"=>"d",
    "retiros"=>[],
    "transacciones"=>[]
    ],
"usuario5"=>[
    "id"=>5,
    "nombre"=>"mateo",
    "numero_cuenta"=>127,
    "saldo"=>30000,
    "contraseña"=>"e",
    "retiros"=>[],
    "transacciones"=>[]
    ]

];
while (true) {
    echo "DIGITE SU NUMERO DE CUENTA (o 'salir' para terminar): ";
    $cuenta = trim(fgets(STDIN));

    if ($cuenta === "salir") {
        break;
    }

    $encontrado = false;

    foreach ($usuarios as $clave => $valor) {
        if ($cuenta == $valor["numero_cuenta"]) {
            $encontrado = true;
            $usando=$clave;
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
	 }else if($opcion==1){
          echo "Saldo de la cuenta: " . $usuarios[$usando]["saldo"] . "\n";
         }else if($opcion==2){
	   while(true){
           echo "Digite la cantidad a retirar (o 'salir' para terminar): ";
	   $retirar=trim(fgets(STDIN));
	   if($retirar<=0){
            echo "Ese valor no esta permitito \n";
           }else if($retirar=="salir"){
            break;
           }else if($retirar>0){
               if($usuarios[$usando]["saldo"]<$retirar){
                echo "No tienes suficiente dinero \n";
                break;
               }else{
                $usuarios[$usando]["saldo"]-=$retirar;
                echo "Dinero retirado con exito \n";
                $usuarios[$usando]["retiros"][]=[
                  "cuenta"=>$usuarios[$usando]["numero_cuenta"],
                  "valor_retirado"=>$retirar,
		  "fecha_retiro"=>date("d-m-y")
                ];
                break;
               }
             }
           }
          }
          else if($opcion==3){
            if(count($usuarios[$usando]["retiros"])==0){
                echo "No tiene registros de los retiros \n";
            }else{
		$cantidad_retiros=0;
		$total_retirado=0;
		foreach($usuarios[$usando]["retiros"] as $retiro){
                  $cantidad_retiros+=1;
		  $total_retirado+=$retiro["valor_retirado"];
		  echo "Valor del retiro: " . $retiro["valor_retirado"] . "\n";
             }
		echo "cantidad de retiros: $cantidad_retiros \n";
             echo "total retirado: $total_retirado \n";
             echo "===================\n";

	    }
            }
	else if($opcion==4){

	}
    }
  }
}
?>
