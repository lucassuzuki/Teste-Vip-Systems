<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>sou dashboard</h1>
    <?php

    var_dump(session()->has('nome'));

    ?>
    <form action="logout" method="POST">
    <input type="submit" value="logout">
    </form>
    
</body>

</html>