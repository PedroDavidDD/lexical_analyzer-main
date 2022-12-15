<?php
function classAquino($param)
{

    $loops = ['for', 'endfor', 'switch', 'case', 'endswitch', 'foreach', 'endforeach', 'do', 'while', 'endwhile'];
    $statements = ['if', 'else', 'endif', 'break', 'as', 'or', 'and', 'goto', 'then'];
    $class = ['class', 'final class', 'interface', 'abstract class'];
    $fClass = ['namespace', 'use', 'instanceof', 'insteadof', 'interface'];

    $extraClass = ['extends', 'implements'];
    $other = ['public', 'private', 'exit', 'protected', 'finally'];

    $imposrts = ['require', 'require_once', 'include', 'include_once'];

    $callBacks = ['fn', 'die()', 'empty()', 'eval()', 'isset()', 'list()', 'match()', 'unset()'];

    $function = ['array()'];
    $prints = ['return', 'print', 'echo'];

    $vars = ['static', 'new', 'clone', 'const', 'continue', 'declare', 'default',
        'var', 'global', '$GLOBALS',
    ];

    $try = ['catch throw', 'trait', 'try'];
    $otherVars = ['xor', 'yield', 'yield from', 'enddeclare', 'callable'];

    $response = '';
    $string = 'Tokens / Palabra reservada';
    $data = [];
    $key = null;
    $stringEval = explode(" ", $param);

    foreach ($stringEval as $rowWord) {

        if (in_array($rowWord, $class, true)) {
            $key = array_search($rowWord, $stringEval);
        }
        if (in_array($rowWord, $fClass, true)) {
            $key = array_search($rowWord, $stringEval);
        }
        if (in_array($rowWord, $extraClass, true)) {
            $key = array_search($rowWord, $stringEval);
        }
        if (in_array($rowWord, $other, true)) {
            $key = array_search($rowWord, $stringEval);
        }
        if (in_array($rowWord, $loops, true)) {
            $key = array_search($rowWord, $stringEval);
        }
        if (in_array($rowWord, $statements, true)) {
            $key = array_search($rowWord, $stringEval);
        }
        if (in_array($rowWord, $imposrts, true)) {
            $key = array_search($rowWord, $stringEval);
        }
        if (in_array($rowWord, $callBacks, true)) {
            $key = array_search($rowWord, $stringEval);
        }
        if (in_array($rowWord, $function, true)) {
            $key = array_search($rowWord, $stringEval);
        }
        if (in_array($rowWord, $prints, true)) {
            $key = array_search($rowWord, $stringEval);
        }
        if (in_array($rowWord, $vars, true)) {
            $key = array_search($rowWord, $stringEval);
        }
        if (in_array($rowWord, $try, true)) {
            $key = array_search($rowWord, $stringEval);
        }
        if (in_array($rowWord, $otherVars, true)) {
            $key = array_search($rowWord, $stringEval);
        }
        if (in_array($rowWord, $class, true)) {
            $key = array_search($rowWord, $stringEval);
        }
        if (in_array($rowWord, $class, true)) {
            $key = array_search($rowWord, $stringEval);
        }
        if (!is_null($key)) {
            $data[] = array($rowWord,'Reservado', $key);
        }
        $key = null;

    }

    return $data;

}
