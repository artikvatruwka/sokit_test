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
<div class="row">
    <div class="col d-flex justify-content-center">
        <form id="login-form" method="post">
            <label for="login">Login</label>
            <input class="form-control" id="login" name = "login" type="text">
            <label for="password" on>Password</label>
            <input class="form-control" id="password" name="password" type="password">
            <input  class="form-check-label" id="show-password" type="checkbox" onclick="showPassword()"> show password
        </form>
    </div>
    <div class="col d-flex">
        <a></a>
    </div>
</div>

<script type="text/javascript" src="js/login.js"></script>
</body>
</html>