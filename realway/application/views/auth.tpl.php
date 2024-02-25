<?php require_once "parts/header.php"; ?>
<div class="content">
    <div class="container">
        <h1>Realway</h1>
        <?php

        if(isset($verification) && $verification) {
            ?>
            <p style="color: red; font-size: 18px; font-weight: bold;">The login or password is wrong. Try again</p>
        <?php
        }

        ?>
        <form class="form" action="userpage" method="post">
            <?php
            $current_form = [];
            if(isset($errors) && $_POST["form"] == "authorisation") {
                $current_form = $errors;
            } else {
                unset($current_form);
            }
            ?>
            <h3>Log in</h3>
            <p>Name: </p>
            <input type="text" name="name" placeholder="name" />
            <?php
            if(isset($current_form["name"])) {
                foreach ($current_form["name"] as $key => $value) {
                    ?>
                    <p class="pError">*  <?=$value?></p>
                    <?php
                }
            }
            ?>
            <p>Password: </p>
            <input type="password", name="password" placeholder="password" />
            <?php
            if(isset($current_form["password"])) {
                foreach ($current_form["password"] as $key => $value) {
                    ?>
                    <p class="pError">*  <?=$value?></p>
                    <?php
                }
            }
            ?>
            <input type="hidden" name="form" value="authorisation" />

            <button type="submit">Submit</button>
        </form>
    </div>
    <h2>Authorisation</h2>
</div>
<?php require_once "parts/footer.php"; ?>
