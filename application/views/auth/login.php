<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../assets/auth/auth.css" rel="stylesheet">
    <title>Merchandise</title>
</head>
<body>
    <form action="/users/login" method="POST" class="p-3">
<?php
    if(isset($error)){
?>
        <?= $error ?>
<?php } ?>
        <h3 class="mb-3 text-center">Log in</h3>
        <label class="row mb-3">
            <span class="col-5">Email Address:</span>
            <input class="col-6 m-auto" type="email" name="email" placeholder="ex@gmail.com">
        </label>
        <label class="row mb-3">
            <span class="col-5">Password:</span>
            <input class="col-6 m-auto" type="text" name="password" placeholder="*****">
        </label>
        <input type="submit" value="Login" class="btn btn-primary p-1">
        <a id="link" href="/users/registration">Don't have account? Register.</a>
    </form>
</body>
</html>