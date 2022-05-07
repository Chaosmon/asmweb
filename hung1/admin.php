<html>

<head>
    <title>MWS Aiko Book | Admin Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="src/img/Aiko.png">
</head>

<style>
    body {
        text-align: center;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin-top: 110px;
        margin-bottom: .5rem;
    }
</style>

<body>
    <button><a href="index.php">BACK TO HOME PAGE</a></button>
    <form action="adminvalidation.php" method="post">
        <div class="login-box">
            <h1> ADMIN LOGIN</h1>

            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Usename (admin)" name="adminname" value="">
            </div>
            <p>

                <div class="textbox">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <input type="password" placeholder="Password (admin)" name="password" value="">
                </div>
                <p>
                    <p>
                        <input class="button" type="submit" name="login" value="Sign In">
        </div>

    </form>
</body>

</html>