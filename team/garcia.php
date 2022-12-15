<?php

function sybomls($inputBase)
{
    $data = [];
    $key = null;
    $dicctionarySymbols = ['?', '$'];

    $stringEval = explode(" ", $inputBase);

    foreach ($stringEval as $rowWord) {
        if (in_array($rowWord, $dicctionarySymbols, true)) {
            $key = array_search($rowWord, $stringEval);
        }
        if (!is_null($key)) {
            $data[] = array($rowWord, 'Simbolo / Tokens', $key);
        }
        $key = null;
    }

    return $data;
}

function delimiters($inputBase)
{

    $data = [];
    $dicctionary = array('(', ')');
    $stringEval = explode(" ", $inputBase);
    $key = null;
    foreach ($stringEval as $rowWord) {

        if (in_array($rowWord, $dicctionary, true)) {
            $key  =  array_search($rowWord, $stringEval);
        }

        if (!is_null($key)) {
            $data[] = array($rowWord, 'Token / Delimitador ', $key);
        }

        $key = null;
    }

    return $data;
}


function classgarcia($inputBase)
{
    $partOne = sybomls($inputBase);
    $partTwo = delimiters($inputBase);

    return array_merge($partOne, $partTwo);
}
