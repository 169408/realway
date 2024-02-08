<?php require_once "parts/header.php"; ?>
<div class="content">
    <div class="container">
        <h1>Realway</h1>
        <h1>My Page</h1>

        <?php if(isset($resultingUser) && $resultingUser != null) {
            ?>
            <div class="info">
        <?php
            foreach ($resultingUser as $key => $value) {
                if($key == "password") {continue;}
                ?>
                <p class="p<?=$key?>"><?=$key . " : " . $value?></p>
                <?php
            }
            ?>
            </div>
        <?php
        } else {
            ?>
            <div class="error">
                <p>Incorrect login or password</p>
            </div>
        <?php
        }?>
    </div>
</div>
<?php require_once "parts/footer.php"; ?>
