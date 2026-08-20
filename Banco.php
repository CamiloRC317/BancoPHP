<?php

$usuarios = [

    "usuario1" => [
        "id" => 1,
        "nombre" => "camilo",
        "numero_cuenta" => 123,
        "saldo" => 100000,
        "contraseña" => "a",
        "retiros" => [],
        "transacciones" => []
    ],
    "usuario2" => [
        "id" => 2,
        "nombre" => "valentina",
        "numero_cuenta" => 124,
        "saldo" => 250000,
        "contraseña" => "b",
        "retiros" => [],
        "transacciones" => []
    ],
    "usuario3" => [
        "id" => 3,
        "nombre" => "santiago",
        "numero_cuenta" => 125,
        "saldo" => 75000,
        "contraseña" => "c",
        "retiros" => [],
        "transacciones" => []
    ],
    "usuario4" => [
        "id" => 4,
        "nombre" => "laura",
        "numero_cuenta" => 126,
        "saldo" => 500000,
        "contraseña" => "d",
        "retiros" => [],
        "transacciones" => []
    ],
    "usuario5" => [
        "id" => 5,
        "nombre" => "mateo",
        "numero_cuenta" => 127,
        "saldo" => 30000,
        "contraseña" => "e",
        "retiros" => [],
        "transacciones" => []
    ]

];

echo "========================================\n";
echo "        BIENVENIDO AL BANCO ADSO\n";
echo "========================================\n";

while (true) {
    echo "----------------------------------------\n";
    echo "           INICIO DE SESIÓN\n";
    echo "----------------------------------------\n";
    echo "DIGITE SU NUMERO DE CUENTA (o 'salir' para terminar): ";
    $cuenta = trim(fgets(STDIN));
    if ($cuenta === "salir") {
        echo "========================================\n";
        echo "   GRACIAS POR USAR NUESTRO BANCO\n";
        echo "========================================\n";
        break;
    }
    echo "DIGITE SU CONTRASEÑA(o 'salir' para terminar): ";
    $contraseña = trim(fgets(STDIN));
    if ($contraseña == "salir") {
        echo "========================================\n";
        echo "   GRACIAS POR USAR NUESTRO BANCO\n";
        echo "========================================\n";
        break;
    }

    $encontrado = false;

    foreach ($usuarios as $clave => $valor) {
        if ($cuenta == $valor["numero_cuenta"] && $contraseña == $valor["contraseña"]) {
            $encontrado = true;
            $usando = $clave;
            break;

        }
    }

    if (!$encontrado) {
        echo "========================================\n";
        echo "USUARIO O CONTRASEÑA INCORRECTO \n";
        echo "========================================\n";
    } else {
        while (true) {
            echo "========================================\n";
            echo "           OPCIONES DEL BANCO \n";
            echo "========================================\n";
            echo "1)Consultar saldo \n";
            echo "2)Realizar retiro \n";
            echo "3)Consultar retiros \n";
            echo "4)Realizar transferencia \n";
            echo "5)Consultar transferencia \n";
            echo "6)Salir \n";
            echo "----------------------------------------\n";
            $opcion = trim(fgets(STDIN));
            if ($opcion == 6) {
                echo "----------------------------------------\n";
                echo "SESION CERRADA \n";
                echo "----------------------------------------\n";
                break;
            } else if ($opcion == 1) {
                echo "========================================\n";
                echo "           CONSULTA DE SALDO \n";
                echo "========================================\n";
                echo "Saldo de la cuenta: " . $usuarios[$usando]["saldo"] . "\n";
                echo "========================================\n";
            } else if ($opcion == 2) {
                echo "----------------------------------------\n";
                echo "            RETIRO DE DINERO \n";
                echo "----------------------------------------\n";
                echo "Digite la contraseña: ";
                $validacion = trim(fgets(STDIN));
                if ($contraseña != $validacion) {
                    echo "La contraseña es incorrecta no puede realizar esta accion \n";
                } else {
                    while (true) {
                        echo "Digite la cantidad a retirar (o 'salir' para terminar): ";
                        $retirar = trim(fgets(STDIN));
                        if ($retirar <= 0) {
                            echo "Ese valor no esta permitido \n";
                        } else if ($retirar == "salir") {
                            break;
                        } else if ($retirar > 0) {
                            if ($usuarios[$usando]["saldo"] < $retirar) {
                                echo "No tienes suficiente dinero \n";
                                break;
                            } else {
                                $usuarios[$usando]["saldo"] -= $retirar;
                                echo "Dinero retirado con exito \n";
                                $usuarios[$usando]["retiros"][] = [
                                    "cuenta" => $usuarios[$usando]["numero_cuenta"],
                                    "valor_retirado" => $retirar,
                                    "fecha_retiro" => date("d-m-y")
                                ];
                                break;
                            }
                        }
                    }
                }
            } else if ($opcion == 3) {
                echo "========================================\n";
                echo "         HISTORIAL DE RETIROS \n";
                echo "========================================\n";
                if (count($usuarios[$usando]["retiros"]) == 0) {
                    echo "No tiene registros de los retiros \n";
                } else {
                    $cantidad_retiros = 0;
                    $total_retirado = 0;
                    foreach ($usuarios[$usando]["retiros"] as $retiro) {
                        $cantidad_retiros += 1;
                        $total_retirado += $retiro["valor_retirado"];
                        echo "Valor del retiro: " . $retiro["valor_retirado"] . "\n";
                    }
                    echo "cantidad de retiros: $cantidad_retiros \n";
                    echo "total retirado: $total_retirado \n";
                    echo "===================\n";

                }
                echo "========================================\n";
            } else if ($opcion == 4) {
                echo "----------------------------------------\n";
                echo "         TRANSFERENCIA DE DINERO \n";
                echo "----------------------------------------\n";
                echo "Digite la contraseña: ";
                $validacion = trim(fgets(STDIN));
                if ($contraseña != $validacion) {
                    echo "La contraseña es incorrecta no puede realizar esta accion \n";
                } else {
                    echo "Digite el numero de cuenta a quien va a transferir o escriba 'salir' para salir: ";
                    $destino = trim(fgets(STDIN));
                    if ($destino != "salir") {
                        $encontrado = false;
                        foreach ($usuarios as $clave => $valor) {
                            if ($valor["numero_cuenta"] == $destino) {
                                $encontrado = true;
                                $destino = $clave;
                                break;
                            }
                        }
                        if ($encontrado) {
                            while (true) {
                                echo "Digite la cantidad a transferir (o 'salir' para terminar): ";
                                $retirar = trim(fgets(STDIN));
                                if ($retirar <= 0) {
                                    echo "Ese valor no esta permitido \n";
                                } else if ($retirar == "salir") {
                                    break;
                                } else if ($usando == $destino) {
                                    echo "No se puede enviar la cuenta a usted mismo \n";
                                } else if ($retirar > 0) {
                                    if ($usuarios[$usando]["saldo"] < $retirar) {
                                        echo "No tienes suficiente dinero \n";
                                        break;
                                    } else {
                                        $usuarios[$usando]["saldo"] -= $retirar;
                                        $usuarios[$destino]["saldo"] += $retirar;
                                        echo "Dinero enviado con exito \n";
                                        $usuarios[$usando]["transacciones"][] = [
                                            "cuenta_origen" => $usuarios[$usando]["numero_cuenta"],
                                            "cuenta_destino" => $usuarios[$destino]["numero_cuenta"],
                                            "valor_transferido" => $retirar * -1,
                                            "fecha_retiro" => date("d-m-y")
                                        ];
                                        $usuarios[$destino]["transacciones"][] = [
                                            "cuenta_origen" => $usuarios[$usando]["numero_cuenta"],
                                            "cuenta_destino" => $usuarios[$destino]["numero_cuenta"],
                                            "valor_transferido" => $retirar,
                                            "fecha_transferencia" => date("d-m-y")
                                        ];
                                        break;
                                    }
                                }
                            }

                        } else {
                            echo "No se encontro la cuenta destino \n";
                        }
                    }
                }
            } else if ($opcion == 5) {
                echo "========================================\n";
                echo "      HISTORIAL DE TRANSFERENCIAS \n";
                echo "========================================\n";
                if (count($usuarios[$usando]["transacciones"]) == 0) {
                    echo "No tiene registros de las transferencias \n";
                } else {
                    $cantidad_retiros = 0;
                    $total_retirado = 0;
                    foreach ($usuarios[$usando]["transacciones"] as $retiro) {
                        $cantidad_retiros += 1;
                        echo "Valor del la transferencia: " . $retiro["valor_transferido"] . "\n";
                        if ($retiro["valor_transferido"] < 0) {
                            $total_retirado += ($retiro["valor_transferido"] * -1);
                        } else {
                            $total_retirado += $retiro["valor_transferido"];
                        }

                    }
                    echo "cantidad de transferencias: $cantidad_retiros \n";
                    echo "total en transferencias: $total_retirado \n";
                    echo "===================\n";

                }
                echo "========================================\n";
            }
        }
    }
}
?>