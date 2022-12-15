<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Lexical Analyzer PHP</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center container w-100 d-flex flex-column justify-content-center">
    <div class="row w-100">
        <main class="col-sm-12 col-md-4 ">
            <form method="post">
                <h1 class="h3 mb-3 fw-normal">Analizador Lexico</h1>
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="inputtext" name="inputtext" placeholder="asdas">
                    <label for="floatingInput">Entrada</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary mb-4" type="submit">Analizar</button>
            </form>
        </main>
        <div class="col-sm-12 col-md-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Token</th>
                        <th scope="col">Atributo</th>
                        <th scope="col">Posicion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    require('team/garcia.php');
                    require('team/aquino.php');
                    require('team/PedroDavid.php');
                    require('team/gutierrez.php');
                    require('team/pabel.php');

                    if (isset($_POST['inputtext'])) {

                        echo  '<div class="container-fluid p-4 mb-4 bg-primary text-white text-center rounded-3">
                            <h1> ' . $_POST['inputtext'] . '</h1>
                            </div>';

                        $simbols = classgarcia($_POST['inputtext']);
                        $class = classAquino($_POST['inputtext']);
                        $identicador = Identificador($_POST['inputtext']);
                        $operators = searchOperators($_POST['inputtext']);
                        // $typeCharacter = searchOperators($_POST['inputtext']);
                        $cadena_caracter = Cadena_Caracter($_POST['inputtext']);

                        $arrayTotal =  array_merge(
                            $identicador,
                            $simbols,
                            $class,
                            $operators,
                           // $typeCharacter,
                            $cadena_caracter
                        );

                        $sortArray = array();

                        foreach ($arrayTotal as $row) {
                            foreach ($row as $key => $value) {
                                if (!isset($sortArray[$key])) {
                                    $sortArray[$key] = array();
                                }
                                $sortArray[$key][] = $value;
                            }
                        }

                        array_multisort($sortArray[2], SORT_ASC, $arrayTotal);

                        if (count($arrayTotal)) {

                            /*  echo ' <td colspan="3">' . $identicador . '</td>'; */
                            foreach ($arrayTotal as $item) {
                                echo '<tr>';
                                echo '<td>' . $item[0] . '</td>
                                     <td>' . $item[1] . '</td>
                                     <td>' . $item[2] . '</td>';
                                echo '</tr>';
                            }
                        }
                    }

                    ?>


                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>