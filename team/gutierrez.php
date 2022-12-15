<?php

$comparisonOperators = array('>', '>=', '<', '<=', '==', '<>', '!=');
$assignmentOperators = array('=');
$arithmeticOperators = array('+', '-', '*', '/', '%', '^', '**');

function getOperatorType($operator): string
{
    global $comparisonOperators, $assignmentOperators, $arithmeticOperators;
    if (in_array($operator, $comparisonOperators)) {
        return 'Operador de comparación';
    } else if (in_array($operator, $assignmentOperators)) {
        return 'Operador de asignación';
    } else if (in_array($operator, $arithmeticOperators)) {
        return 'Operador aritmético';
    } else {
        return 'Desconocido';
    }
}

function searchOperators($input): array
{

    global $comparisonOperators, $assignmentOperators, $arithmeticOperators;

    $operators = array_merge($comparisonOperators, $assignmentOperators, $arithmeticOperators);

    $tree = array();

    foreach ($operators as $operator) {
        $position = strpos($input, $operator);
        if ($position !== false) {
            $tree[$position] = $operator;
        }
    }

    $result = array();

    foreach ($tree as $key => $value) {
        $operatorType = getOperatorType($value);
        $result[] = array($value , $operatorType, $key);
    }

    return $result;
}
