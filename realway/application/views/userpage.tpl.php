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
                if($key == "id" || $key == "password" || $key == "avatar") {continue;}
                ?>
                <p class="p<?=$key?>"><?=$key . " : " . stripslashes($value)?></p>
                <?php
            }
            ?>
                <p class="pEdit"><a href="edituser" class="edit">edit profile</a></p>
            </div>
        <?php
        } else {
            ?>
            <div class="error">
                <p>Incorrect login or password</p>
            </div>
        <?php
        }?>

        <a class="add" href="post"><text>Add new post</text></a>

        <?php
            while(isset($posts) && $post = mysqli_fetch_assoc($posts)) {
                ?>
        <div class="post">
            <div class="navigation">
                <h2><a href=""><?=$post["title"]?></a></h2>
                <form action="post.php" method="post">
                    <input type="hidden" name="post_id" value="<?=$post["post_id"]?>" />
                    <input type="hidden" name="title" value="<?=$post["title"]?>" />
                    <input type="hidden" name="content" value="<?=$post["content"]?>" />
                    <input type="hidden" name="image" value="<?=$post["image"]?>" />
                    <button type="submit"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                </form>
            </div>
            <p><?=isset($post["content"]) ? $post["content"] : ""?></p>
            <?php if(isset($post["image"]) && $post["image"] != "") {
                ?>
                <p><img src="uploads/postImage/<?=$post["image"]?>" class="postImage" alt="2" /></p>
            <?php
            }
            ?>
        </div>
        <?php
            }
        ?>
    </div>
</div>
<?php require_once "parts/footer.php"; ?>
