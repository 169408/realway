<?php require_once "parts/header.php"; ?>
    <div class="content">
        <div class="container">
            <h1>Realway</h1>
            <form class="form" action="index.php" method="post">
                <h3>Registration</h3>
                <input type="hidden" name="id" />
                <p>Name: </p>
                <input type="text" name="name" placeholder="name" />
                <p>Email: </p>
                <input type="text" name="email" placeholder="email" />
                <p>Password: </p>
                <input type="password", name="password" placeholder="password" />
                <p>Company: </p>
                <input type="text", name="company" />
                <input type="hidden" name="form" value="add" />

                <button type="submit">Submit</button>
            </form>
        </div>
        <h2>Registration</h2>
    </div>
<?php require_once "parts/footer.php"; ?>
