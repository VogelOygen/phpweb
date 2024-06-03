<?php
require '../db.php';
$result = $baza->query('select t.nomi as tnomi, s.* from savdo s, tovar t WHERE s.tovar_id = t.id ');
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
    <h2>Savdo</h2>
    <h3><a href="/index.php">Bosh sahifaga</a></h3>
    <h3><a href="/savdo/add.php">Yangi savdo</a></h3>
    <table>
        <tr>
            <td>Tovar</td>
            <td>Sana</td>
            <td>Miqdori</td>
            <td>Umumiy narxi</td>
            <td>#</td>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            $un = number_format($row['umumiy_narx'], 0, '.', ' ');
            echo "
            <tr>
                <td>{$row['tnomi']}</td>
                <td>{$row['sana']}</td>
                <td>{$row['miqdori']}</td>
                <td>{$un}</td>
                <td><a href='/savdo/edit.php?id={$row['id']}'>O'zgartirish</a></td>
            </tr>
            ";
        }
        ?>
    </table>

</body>

</html>