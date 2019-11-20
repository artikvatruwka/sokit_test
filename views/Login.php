<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Login</title>
</head>
<body>
    <div class="row d-flex justify-content-center">
        <form class="col" id="login-form" method="post" style="max-width: 400px">
            <h1>Log in</h1>
            <div class="form-group">
                <label for="login">Login</label>
                <input class="form-control" id="login" name = "login" type="text" placeholder="Enter your login"  maxlength="32">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" id="password" name="password" type="password" placeholder="Enter your password" maxlength="32">
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <input id="login-btn" class="btn btn-success " type="button" value="Log in">
                <a href="Registration.php">Registration</a>
            </div>
        </form>

    </div>
    <br>
    <div id="errors" class="row d-flex justify-content-center">

    </div>
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/login.js"></script>
</body>
</html>