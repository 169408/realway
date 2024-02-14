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
                    <td><?php
                        if($key == "password") {
                            echo md5($value);
                        } else {
                            echo $value;
                        }
                        ?></td>
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
                        <td><?php
                            if($key == "password") {
                                echo md5($value);
                            } else {
                                echo $value;
                            }
                            ?></td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php /*$database->disconnect(); */?>
        <h2><?php echo mysqli_fetch_assoc($database->getQuery("SELECT * FROM users WHERE id = 1;"))["name"]; ?></h2>
        <div class="container">
            <form class="form" action="index.php" method="post">
                <?php
                    $current_form = [];
                    if(isset($errors) && $_POST["form"] == "add") {
                        $current_form = $errors;
                    } else {
                        unset($current_form);
                    }
                ?>
                <h3>Add User</h3>
                <p>Name: </p>
                <input type="text" name="name" placeholder="name" value="<?php echo old("name", "add"); ?>" />
                <?php
                if(isset($current_form["name"])) {
                    foreach ($current_form["name"] as $key => $value) {
                        ?>
                        <p class="pError">*  <?=$value?></p>
                        <?php
                    }
                }
                ?>
                <p>Email: </p>
                <input type="text" name="email" placeholder="email" value="<?php echo old("email", "add"); ?>" />
                <?php
                if(isset($current_form["email"])) {
                    foreach ($current_form["email"] as $key => $value) {
                        ?>
                        <p class="pError">*  <?=$value?></p>
                        <?php
                    }
                }
                ?>
                <p>Password: </p>
                <input type="password", name="password" placeholder="password" value="<?php echo old("password", "add"); ?>" />
                <?php
                if(isset($current_form["password"])) {
                    foreach ($current_form["password"] as $key => $value) {
                        ?>
                        <p class="pError">*  <?=$value?></p>
                        <?php
                    }
                }
                ?>
                <p>Company: </p>
                <input type="text", name="company" value="<?php echo old("company", "add"); ?>" />
                <?php
                if(isset($current_form["company"])) {
                    foreach ($current_form["company"] as $key => $value) {
                        ?>
                        <p class="pError">*  <?=$value?></p>
                        <?php
                    }
                }
                ?>
                <input type="hidden" name="form" value="add" />

                <button type="submit">Submit</button>
            </form>

            <form class="form" action="index.php" method="post">
                <?php
                $current_form = [];
                if(isset($errors) && $_POST["form"] == "update") {
                    $current_form = $errors;
                } else {
                    unset($current_form);
                }
                ?>
                <h3>Update User</h3>
                <p>ID: </p>
                <input type="number" name="id" value="<?php echo old("id", "update"); ?>" />
                <?php
                if(isset($current_form["id"])) {
                    foreach ($current_form["id"] as $key => $value) {
                        ?>
                        <p class="pError">*  <?=$value?></p>
                        <?php
                    }
                }
                ?>
                <p>Name: </p>
                <input type="text" name="name" placeholder="name" value="<?php echo old("name", "update"); ?>" />
                <?php
                if(isset($current_form["name"])) {
                    foreach ($current_form["name"] as $key => $value) {
                        ?>
                        <p class="pError">*  <?=$value?></p>
                        <?php
                    }
                }
                ?>
                <p>Email: </p>
                <input type="text" name="email" placeholder="email" value="<?php echo old("email", "update"); ?>" />
                <?php
                if(isset($current_form["email"])) {
                    foreach ($current_form["email"] as $key => $value) {
                        ?>
                        <p class="pError">*  <?=$value?></p>
                        <?php
                    }
                }
                ?>
                <p>Password: </p>
                <input type="password", name="password" placeholder="password" value="<?php echo old("password", "update"); ?>" />
                <?php
                if(isset($current_form["password"])) {
                    foreach ($current_form["password"] as $key => $value) {
                       ?>
                        <p class="pError">*  <?=$value?></p>
                       <?php
                    }
                }
                ?>
                <p>Company: </p>
                <input type="text", name="company" value="<?php echo old("company", "update"); ?>" />
                <?php
                if(isset($current_form["company"])) {
                    foreach ($current_form["company"] as $key => $value) {
                        ?>
                        <p class="pError">*  <?=$value?></p>
                        <?php
                    }
                }
                ?>
                <input type="hidden" name="form" value="update" />

                <button type="submit">Submit</button>
            </form>

            <form class="form" action="index.php" method="post">
                <h3>Delete User</h3>
                <p>ID: </p>
                <input type="number" name="id" />
                <input type="hidden" name="form" value="delete" />

                <button type="submit">Submit</button>
            </form>

            <form class="form" action="index.php" method="post">
                <h3>Get User</h3>
                <p>ID: </p>
                <input type="number" name="id" />
                <input type="hidden" name="form" value="get" />

                <button type="submit">Submit</button>

                <?php if(isset($resultingUser) && $resultingUser != null) {
                    ?>
                    <table border="2">
                        <tr>
                            <?php
                            foreach ($resultingUser as $key => $value) {
                                ?>
                                <td><?=$key?></td>
                                <?php
                            }
                            ?>
                        </tr>
                        <tr>
                            <?php
                            foreach ($resultingUser as $key => $value) {
                                ?>
                                <td><?=$value?></td>
                                <?php
                            }
                            ?>
                        </tr>
                    </table>
                    <?php
                } ?>
            </form>

        </div>
    </div>
<?php require_once "parts/footer.php"; ?>