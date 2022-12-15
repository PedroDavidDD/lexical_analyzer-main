
<?php


/*$evaluar = "        $n = ( 2 + 4 ) / 3 if ( $Numero > 10 ) then 'Ingresaste_un_carro_azul' 'a' 2.10     die()      ";
var_dump(Identificador($evaluar));
*/

/* Lógica 1 */
function Identificador($evaluar)
{
    $mayusculas =  ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    $minusculas = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
    $numeros = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    $letras = array_merge($minusculas, $mayusculas);
    $firstDigit = array_merge($numeros);
    /*  var_dump($letras);
    die(); */
    /* quitar espacios innecesario */
    $evaluar = trim($evaluar);
    $data = array();
    $uid = '$';
    /* separar por bloque */
    $buscado = explode(" ", $evaluar);

    foreach ($buscado as $key => $value) {
        //_nag
        if ($value != null) {
            /* Si existe un valor despues del $, se guarda */
            if (isset($value[1])) {
                if ($value[0] == $uid) {
                    /*Prohibir que el primer digito, luego del  $ sea un numeral */

                    if (in_array($value[1], $letras) == true) {
                        // $data[] = array($value, "Identificador ", $key);
                        $data[] = array($value, "Identificador ", $key);
                    }
                }
            }
        }
    }
    /* LOGICA digitos,enteros y reales*/
    $numeros = array();

    $numeros = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    $separador = '.';


    foreach ($buscado as $key => $value) {

        if ($value != null) {

            if (array_key_exists($value[0], $numeros) == true) {

                $contieneUnPunto = strpos($value, $separador);

                if ($contieneUnPunto == true) {
                    $data[] = array($value, "Número Real", $key);
                } else {
                    if (isset($value[1])) {
                        if ($value[1] != '.') {

                            if (array_key_exists($value[1], $numeros) == true) {
                                $data[] = array($value, "Número Entero", $key);
                            }
                        }
                    } else {

                        $data[] = array($value, "Dígito", $key);
                    }
                }
            }
        }
    }
    /* cadena y caracteres */

    $initial = "'";

    foreach ($buscado as $key => $value) {
        if ($value != null) {
            if ($value[0]  == $initial) {
                /* Cadena o Carácter */
                if (isset($value[1]) and isset($value[2])) {

                    if ($value[2] != $initial) {

                        // if (array_key_exists($value[1], $cadena) == true) {

                        $data[] = array($value, "Cadena", $key);
                        // }
                    } else {
                        // if (array_key_exists($value[1], $cadena) == true) {

                        $data[] = array($value, "Carácter", $key);
                        // }
                    }
                }
            }
        }
    }







    return $data;
}

/* X: LOGICA digitos, enteros y reales */
function Real($evaluar)
{

    $numeros = array();

    $numeros = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    $separador = '.';
    $space = [' '];

    $evaluar = trim($evaluar);

    $data = array();

    $buscado = explode(" ", $evaluar);


    foreach ($buscado as $key => $value) {

        if ($value != null) {

            if (array_key_exists($value[0], $numeros) == true) {

                /* Número Real */
                $contieneUnPunto = strpos($value, $separador);

                if ($contieneUnPunto == true) {
                    $data[] = array($value, "Número Real", $key);
                } else {
                    /* Número Entero o Dígito */
                    if (isset($value[1])) {
                        if ($value[1] != '.') {

                            if (array_key_exists($value[1], $numeros) == true) {
                                $data[] = array($value, "Número Entero", $key);
                            }
                        }
                    } else {

                        $data[] = array($value, "Dígito", $key);
                    }
                }


                /*  $data[] = array($value, "Dígito", $key); */
            }
        }
    }


    return $data;
}
