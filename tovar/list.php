<?php
require '../db.php';
$result = $baza->query('select t.*, k.nomi as knomi from tovar t, kategoriya k WHERE t.kategoriya_id = k.id ');
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
    <h2>Tovarlar</h2>
    <h3><a href="/index.php">Bosh sahifaga</a></h3>
    <h3><a href="/tovar/add.php">Yangi tovar</a></h3>
    <table>
        <tr>
            <td>Nomi</td>
            <td>Narxi</td>
            <td>Miqdori</td>
            <td>Kategoriya</td>
            <td>#</td>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>{$row['nomi']}</td>
                <td>{$row['narxi']}</td>
                <td>{$row['miqdori']}</td>
                <td>{$row['knomi']}</td>
                <td><a href='/tovar/edit.php?id={$row['id']}'>O'zgartirish</a></td>
            </tr>
            ";
        }
        ?>
    </table>

</body>

</html>