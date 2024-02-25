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
            <form class="form formPost" action="post" method="post" enctype="multipart/form-data">
                <input type="hidden" name="post_id" value="<?php if(isset($_POST["post_id"])){echo $_POST["post_id"];} ?>">
                <p>Title: </p>
                <input type="text" name="title" value="<?php echo old("title", "newPost"); ?>" />
                <p>Wave: </p>
                <textarea name="content" cols="30" rows="12"><?php echo old("content", "newPost"); ?></textarea>
                <p>Picture: </p>
                <input type="file" name="image" />
                <input type="hidden" name="user_id" value="<?=$_POST["id"]?>">
                <input type="hidden" name="form" value="newPost">
                <button type="submit">Publish</button>
            </form>
<!--            Let me intrioduce my favourite anime characther Cukijama Szu. He is the best!-->
            <p class="pReturn"><a href="userpage" class="return">Return to My Page</a></p>
        </div>
    </div>
</body>
</html>
