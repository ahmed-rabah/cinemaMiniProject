<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>se connecter</title>
</head>
<body>
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
                <button type="submit" class="btn btn-primary mt-2" id="connecter">Submit</button>
            </fieldset>
        </form>

        <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="./javascript/signin.js"></script>
</body>
</html>