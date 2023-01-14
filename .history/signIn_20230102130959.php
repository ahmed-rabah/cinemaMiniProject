<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/signup.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>se connecter</title>
</head>
<body>
<div class="centered py-3 px-5 rounded bg-light shadow-lg p-3 mb-5">
         <h2 class="text-center m-1">inscription des utilisateurs</h2>
<form action="./signin.php" method="post" id="user_signin" autocomplete="off">
            <fieldset>
                <div class="form-group">
                    <label for="username" class="form-label mt-1">Username</label>
                    <input type="text" class="form-control" name="username" aria-describedby="usernamedesc" id="username"  placeholder="Enter username">
                    <small id="usernamedesc" class="form-text"></small>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label mt-1">Password</label>
                    <input type="password" class="form-control" name="password" aria-describedby="pwddesc" id="password" placeholder="Password" value="w">
                    <small id="pwddesc" class="form-text"></small>
                </div>                
                <button type="submit" class="btn btn-primary mt-2" id="loginBtn">Submit</button>
            </fieldset>
        </form>
</div>

        <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="./javascript/signin.js"></script>
</body>
</html>