<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <base href="<?=PATH?>/">
    <link rel="stylesheet" href="assets/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="icon" href="uploads/falis/favicon2.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="uploads/files/favicon2.ico" type="image/x-icon" />
</head>
<body>
    <header class="header">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="about">About</a></li>
                    <li><a href="#">Contant</a></li>
                </ul>
            </nav>
            <div id="overlay" onclick="closeOverlay()"></div>
            <a class="barmenu" id="bar" onclick="openBar()"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <?php if(isset($activeuser) && $activeuser) {
                ?>
                <div class="drop_menu">
                    <a class="barmenu" id="closebar" onclick="openBar()"><i class="fa fa-times" aria-hidden="true"></i></a>
                    <ul>
                        <li><img src="uploads/avatars/<?=$_POST["avatar"];?>" alt="avatar" class="avatar"><p class="pName"><?=$_POST["name"]?></p></li>
                        <li><a href="userpage">My page</a></li>
                        <li><a href="edituser">Setting</a></li>
                        <li><a href="auth">Log out</a></li>
                    </ul>
                </div>
                <?php
            } else {
                ?>
                <div class="drop_menu">
                    <a class="barmenu" id="closebar" onclick="openBar()"><i class="fa fa-times" aria-hidden="true"></i></a>
                    <ul class="links">
                        <li><a href="registr">Sign up</a></li>
                        <li><a href="auth">Log in</a></li>
                    </ul>
                </div>
                <?php
            } ?>
        </div>
    </header>
