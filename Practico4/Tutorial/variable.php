<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Variables</title>
</head>
<body>
    <header>
        <h1>Manipulacion variables</h1>
    </header>
    <article>
        <?php
        @$variable = 5/0;
        if(!$vairble){
            echo "Error. Division por cero <br>";
        }
        @$variable2 = 4/0;
        ?>
    </article>
</body>
</html>