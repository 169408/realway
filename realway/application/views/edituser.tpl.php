<?php require_once "parts/header.php"; ?>
<div class="contant">
    <div class="container">
        <form class="form" action="edituser" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$_SESSION["id"]?>" />
            <input type="file" name="avatar">
            <input type="hidden" name="form" value="changeAvatar" />

            <button type="submit">Cange avatar</button>
        </form>
        <p class="comm"><?php if(isset($comm)) echo $comm; ?></p>

        <p class="pReturn"><a href="userpage" class="return">Return to My Page</a></p>
    </div>
</div>
<?php print_arr($_SESSION); ?>
<?php require_once "parts/footer.php"?>
