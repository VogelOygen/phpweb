<?php
require '../db.php';

$id = intval($_GET['id']);

if (!empty($_POST)) {
    $nomi = $baza->real_escape_string($_POST['nomi']);
    $narxi = intval($_POST['narxi']);
    $miqdori = intval($_POST['miqdori']);
    $kategoriya_id = intval($_POST['kategoriya_id']);
    $result = $baza->query("UPDATE tovar
    SET nomi='$nomi', narxi=$narxi, miqdori=$miqdori, kategoriya_id=$kategoriya_id
    WHERE id=$id");
    if ($result) {
        header("Refresh: 1; URL=/tovar/list.php");
        echo "Saqlandi";
    }
}

$result = $baza->query("SELECT * FROM tovar WHERE id=$id");
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
        Nomi: <input type="text" name="nomi" value="<?= $obj['nomi'] ?>"><br>
        Narxi: <input type="number" name="narxi" value="<?= $obj['narxi'] ?>"><br>
        Miqdori: <input type="number" name="miqdori" value="<?= $obj['miqdori'] ?>"><br>
        Kategoriya: <select name="kategoriya_id">
            <?php
            $result = $baza->query('select * from kategoriya');
            while ($row = $result->fetch_assoc()) {
                if ($row['id'] == $obj['kategoriya_id'])
                    echo "<option value={$row['id']} selected>{$row['nomi']}</option>";
                else
                    echo "<option value={$row['id']}>{$row['nomi']}</option>";
            }
            ?>

        </select><br>
        <input type="submit" value="Saqlash">
    </form>
</body>

</html>