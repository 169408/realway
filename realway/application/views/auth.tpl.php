<?php require_once "parts/header.php"; ?>
<div class="content">
    <div class="container">
        <h1>Realway</h1>
        <form class="form" action="userpage.php" method="post">
            <h3>Log in</h3>
            <p>Name: </p>
            <input type="text" name="name" placeholder="name" />
            <p>Password: </p>
            <input type="password", name="password" placeholder="password" />
            <input type="hidden" name="form" value="authorisation" />

            <button type="submit">Submit</button>
        </form>
    </div>
    <h2>Authorisation</h2>
</div>
<?php require_once "parts/footer.php"; ?>
