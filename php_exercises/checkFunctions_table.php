<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table border="1">

        <?php


        $array_headers = [
            "Expresión",
            "gettype()",
            "empty()",
            "boolVal()",
            "isset()"
        ];

        $array_values = [
            ["null", null],
            ["0", 0],
            ["true", true],
            ["false", false],
            ["\"0\"", "0"],
            ["\"\"", ""],
            ["foo", "foo"],
            ["array", array(1, 2)]
        ];

        function generateTable(array $array_headers, array $array_values)
        {

            echo "<tr>";

            foreach ($array_headers as $header) {
                echo "<th>$header</th>";
            }

            echo "</tr>";


            foreach ($array_values as $value) {

                $type_value = gettype($value[1]);
                $is_empty = empty($value[1]) ? "<td style=\"background-color:green\"> true </td>" : "<td style=\"background-color:red\"> false </td>";
                $is_boolvalue = boolval($value[1]) ? "<td style=\"background-color:green\"> true </td>" : "<td style=\"background-color:red\"> false </td>";
                $is_isset = isset($value[1]) ? "<td style=\"background-color:green\"> true </td>" : "<td style=\"background-color:red\"> false </td>";

                echo "<tr>";

                echo "<td style=\"background-color:pink\">$value[0]</td>";
                echo "<td>$type_value</td>";
                echo $is_empty;
                echo $is_boolvalue;
                echo $is_isset;


                echo "</tr>";
            }
        }

        generateTable($array_headers, $array_values);

        ?>

    </table>

</body>

</html>