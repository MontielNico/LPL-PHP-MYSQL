<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
   <link rel="stylesheet" href="css/calendario.css">
</head>
<body>
    <table>
        <tr>
            <th>DO</th>
            <th>LU</th>
            <th>MA</th>
            <th>MI</th>
            <th>JU</th>
            <th>VI</th>
            <th>SA</th>
        </tr>
        <?php
        $dia = 1;
        for ($semana=0; $semana < 5; $semana++) { 
            echo "<tr>";
            for ($i=0; $i < 7; $i++) { 
                if($dia <= 31){
                    if($i == 0){
                        $clase = "domingo";
                    } elseif($i==6){
                        $clase = "sabado";
                    } else{
                    $clase = "";
                    }

                    echo "<td class='$clase'>$dia</td>";
                    $dia++;
                } else {
                    echo "<td>...</td>";
                }
            }
            echo "</tr>";
        }

        ?>
    </table>
</body>
</html>