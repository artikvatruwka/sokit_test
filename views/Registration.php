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
            <label for="login">Login</label>
            <input class="form-control" id="login" name = "login" type="text">
            <label for="password" on>Password</label>
            <input class="form-control" id="password" name="password" type="password">
            <hr>
            <div class="d-flex justify-content-between">
                <input class="btn btn-primary " type="button" value="Register">
                <a class="text-success" href="Login.php">Login</a>
            </div>

        </form>
    </div>

<script type="module" src="js/registration.js"></script>
</body>
</html>