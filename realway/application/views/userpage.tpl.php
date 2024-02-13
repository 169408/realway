<?php require_once "parts/header.php"; ?>
<div class="content">
    <div class="container">
        <h1>Realway</h1>
        <h1>My Page</h1>

        <?php if(isset($resultingUser) && $resultingUser != null) {
            ?>
            <div class="info">
                <p><img src="uploads/avatars/<?=$resultingUser["avatar"]?>" class="avatar" alt="1"></p>
        <?php
            foreach ($resultingUser as $key => $value) {
                if($key == "password" || $key == "avatar") {continue;}
                ?>
                <p class="p<?=$key?>"><?=$key . " : " . stripslashes($value)?></p>
                <?php
            }
            ?>
                <p class="pEdit"><a href="edituser.php" class="edit">edit profile</a></p>
            </div>
        <?php
        } else {
            ?>
            <div class="error">
                <p>Incorrect login or password</p>
            </div>
        <?php
        }?>

        <a href="">Add new post</a>
    </div>
</div>
<?php print_arr($_SESSION); ?>
<?php require_once "parts/footer.php"; ?>
