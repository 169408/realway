<?php require_once "parts/header.php"; ?>
    <div class="contant">
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
        <?php $database->disconnect(); ?>
        <h2><?php echo mysqli_fetch_assoc($database->getQuery("SELECT * FROM users WHERE id = 1;"))["name"]; ?></h2>
        <div class="container">
            <form class="form" action="/" method="post">
                <h3>Add User</h3>
                <input type="number" name="id" hidden="hidden" />
                <p>Name: </p>
                <input type="text" name="name" placeholder="name" />
                <p>Email: </p>
                <input type="text" name="email" placeholder="email" />
                <p>Password: </p>
                <input type="password", name="password" placeholder="password" />
                <p>Company: </p>
                <input type="text", name="company" />

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
<?php require_once "parts/footer.php"; ?>