<?php require_once "parts/header.php"; ?>
    <div class="content">
        <div class="container">
            <h1>Realway</h1>
            <form class="form" action="registr.php" method="post">
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
        </div>
        <h2>Registration</h2>
    </div>
<?php require_once "parts/footer.php"; ?>
