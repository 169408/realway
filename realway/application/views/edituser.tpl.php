<?php require_once "parts/header.php"; ?>
<div class="content">
    <div class="container">

        <div class="data">
            <form class="form" action="edituser" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$_SESSION["id"]?>" />
                <input type="file" name="avatar">
                <input type="hidden" name="form" value="changeAvatar" />

                <button type="submit">Cange avatar</button>
            </form>
            <p class="comm"><?php if(isset($comm)) echo $comm; ?></p>
            <p>Your name</p>
            <div class="look"><p class="field"><?=$_POST["name"]?></p><button onclick="changefield(0)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></div>
            <div class="set"><input class="field" type="text" name="name" value="<?=$_POST["name"]?>" /><button onclick="changefield(0)"><i class="fa fa-undo" aria-hidden="true"></i></button></div>
            <p>Email</p>
            <div class="look"><p class="field"><?=$_POST["email"]?></p><button onclick="changefield(1)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></div>
            <div class="set"><input class="field" type="text" name="email" value="<?=$_POST["email"]?>" /><button onclick="changefield(1)"><i class="fa fa-undo" aria-hidden="true"></i></button></div>
            <p>Company</p>
            <div class="look"><p class="field"><?=$_POST["company"]?></p><button onclick="changefield(2)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></div>
            <div class="set"><input class="field" type="text" name="company" value="<?=$_POST["company"]?>" /><button onclick="changefield(2)"><i class="fa fa-undo" aria-hidden="true"></i></button></div>


            <p><a class="change" href="">Change Password</a></p>
        </div>
        <p class="pReturn"><a href="userpage" class="return">Return to My Page</a></p>
    </div>
    <div class="safe">
        <button onclick="infoo()">check</button>
        <form action="">
            <input type="hidden" name="id" value="<?=$resultingUser["id"]?>" />
            <input type="hidden" name="name" value="1" />
            <input type="hidden" name="email" value="2" />
            <input type="hidden" name="company" value="3" />
            <input type="hidden" name="form" value="changes" />
            <a class="change" type="submit" href="edituser">Save changes</a>
        </form>
    </div>
</div>
<?php require_once "parts/footer.php"?>
