<?php

require_once "database/DatabaseConnection.php";
require_once "classes/User.php";

$database = new DatabaseConnection();
$u1 = new User(2, "Genrich", "", "123123a", "unknown");
$database->getQuery($u1->addUser());
$all = $database->getQuery("SELECT * FROM users;");
$result = mysqli_fetch_assoc($all);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Realway</h1>
    <table border="2">
        <tr>
            <?php
            foreach ($result as $key => $value) {
                ?>
                <td><?php echo $key?></td>
                <?php
            }
            ?>
        </tr>
        <tr>
            <?php
            foreach ($result as $key => $value) {
                ?>
                <td><?php echo $value?></td>
                <?php
            }
            ?>
        </tr>
        <?php
        while($result = mysqli_fetch_assoc($all)) {
        ?>
        <tr>
            <?php
                foreach ($result as $key => $value) {
                    ?>
                    <td><?php echo $value?></td>
                    <?php
                }
                ?>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>

