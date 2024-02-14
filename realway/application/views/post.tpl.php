
<?php print_arr($_POST); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="../../../public/assets/main.css" />
</head>
<body>
    <div class="container">
        <div class="content">
            <form class="form formPost" action="post.php" method="post" enctype="multipart/form-data">
                <p>Title: </p>
                <input type="text" name="title" value="<?php old("title", "newPost"); ?>" />
                <p>Wave: </p>
                <textarea name="content" cols="30" rows="12" value="<?php old("content", "newPost"); ?>"></textarea>
                <p>Picture: </p>
                <input type="file" name="image" value="<?php old("image", "newPost"); ?>" />
                <input type="hidden" name="user_id" value="<?=$_POST["id"]?>">
                <input type="hidden" name="form" value="newPost">
                <button type="submit">Publish</button>
            </form>
<!--            Let me intrioduce my favourite anime characther Cukijama Szu. He is the best!-->
            <p class="pReturn"><a href="userpage.php" class="return">Return to My Page</a></p>
        </div>
    </div>
</body>
</html>
