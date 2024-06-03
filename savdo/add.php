<?php
require '../db.php';
if (!empty($_POST)) {
    $miqdori = intval($_POST['miqdori']);
    $tovar_id = intval($_POST['tovar_id']);
    $sana = $_POST['sana'];

    $result = $baza->query("select * from tovar where id=$tovar_id");
    $obj_tovar = $result->fetch_assoc();
    $narxi = $obj_tovar['narxi'];
    $baza_miqdori = $obj_tovar['miqdori'];
    $umumiy_narx = $narxi * $miqdori;

    if ($miqdori > $baza_miqdori) {
        echo "Bazadagi miqdordan katta";
    } else {

        $result = $baza->query("INSERT INTO savdo 
        VALUES(NULL, $tovar_id, '$sana', $miqdori, $umumiy_narx)");
        if ($result) {
            header("Refresh: 1; URL=/savdo/list.php");
            echo "Saqlandi";
        }
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
        Tovar: <select name="tovar_id">
            <?php
            $result = $baza->query('select * from tovar');
            while ($row = $result->fetch_assoc()) {
                $fnarxi = number_format($row['narxi'], 0, '.', ' ');
                echo "
                <option value={$row['id']}>{$row['nomi']} ({$fnarxi})</option>
                ";
            }
            ?>

        </select><br>
        Sana: <input type="date" name="sana"><br>
        Miqdori: <input type="number" name="miqdori"><br>
        <input type="submit" value="Saqlash">
    </form>
</body>

</html>