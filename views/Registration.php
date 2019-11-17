<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Registration</title>
</head>
<body>
    <div class="row d-flex justify-content-center">

            <form class="col" id="login-form" method="post" style="max-width: 400px">
            <h1>Registration</h1>
            <div class="form-group">
                <label for="login">Login</label>
                <input class="form-control" id="login" name = "login" type="text" placeholder="Login">
                <small class="form-text text-muted">Login must contain only a-z 0-9 characters, max length 32</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" id="password" name="password" type="password" placeholder="Password">
                <small class="form-text text-muted">Password length must be from 8 to 32</small>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <input id="register" class="btn btn-primary" type="button" value="Register">
                <a class="text-success" href="Login.php">Login</a>
            </div>
        </form>
    </div>
    <br>
    <div id="errors" class="row d-flex justify-content-center">

    </div>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/registration.js"></script>
</body>
</html>