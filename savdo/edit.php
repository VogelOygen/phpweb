<?php
require '../db.php';

$id = intval($_GET['id']);

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

        $result = $baza->query("UPDATE savdo SET tovar_id=$tovar_id, sana='$sana', 
        miqdori=$miqdori, umumiy_narx=$umumiy_narx where id=$id");
        if ($result) {
            header("Refresh: 1; URL=/savdo/list.php");
            echo "Saqlandi";
        }
    }
}


$result = $baza->query("SELECT * FROM savdo WHERE id=$id");
$obj = $result->fetch_assoc();

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
                if ($row['id'] == $obj['tovar_id'])
                    echo "<option value={$row['id']} selected>{$row['nomi']} ({$fnarxi})</option>";
                else
                    echo "
                <option value={$row['id']}>{$row['nomi']} ({$fnarxi})</option>
                ";
            }
            ?>

        </select><br>
        Sana: <input type="date" name="sana" value="<?= $obj['sana'] ?>"><br>
        Miqdori: <input type="number" name="miqdori" value="<?= $obj['miqdori'] ?>"><br>
        <input type="submit" value="Saqlash">
    </form>
</body>

</html>