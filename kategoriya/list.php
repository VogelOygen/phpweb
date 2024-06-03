<?php
require '../db.php';
$result = $baza->query('select * from kategoriya');
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
    <h2>Kategoriyalar</h2>
    <h3><a href="/index.php">Bosh sahifaga</a></h3>
    <h3><a href="/kategoriya/add.php">Yangi kategoriya</a></h3>
    <table>
        <tr>
            <td>Kategoriya</td>
            <td>#</td>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>{$row['nomi']}</td>
                <td><a href='/kategoriya/edit.php?id={$row['id']}'>O'zgartirish</a></td>
            </tr>
            ";
        }
        ?>
    </table>

</body>

</html>