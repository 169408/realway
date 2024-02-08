<?php require_once "parts/header.php"; ?>
    <div class="content">
        <div class="container">
            <h1>Realway</h1>
        </div>
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
        <h2>About</h2>
    </div>
<?php require_once "parts/footer.php"; ?>
