<?php
require '../db.php';
if (!empty($_POST)) {
    $nomi = $baza->real_escape_string($_POST['nomi']);
    $result = $baza->query("INSERT INTO kategoriya(nomi) VALUES('$nomi')");
    if ($result) {
        header("Refresh: 1; URL=/kategoriya/list.php");
        echo "Saqlandi";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
</head>

<body>

    <form method="post">
        Nomi: <input type="text" name="nomi">
        <input type="submit" value="Saqlash">
    </form>
</body>

</html>