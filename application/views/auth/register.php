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
    <form action="/users/register" method="POST" class="p-3">
<?php
    if(isset($error)){
?>
        <?= $error ?>
<?php } ?>
        <h3 class="mb-3 text-center">Register</h3>
        <label class="row mb-3">
            <span class="col-5">Email Address:</span>
            <input class="col-6 m-auto" type="email" name="email" placeholder="ex@gmail.com">
        </label>
        <label class="row mb-3">
            <span class="col-5">First name:</span>
            <input class="col-6 m-auto" type="text" name="firstname" placeholder="">
        </label>
        <label class="row mb-3">
            <span class="col-5">Last name:</span>
            <input class="col-6 m-auto" type="text" name="lastname" placeholder="">
        </label>
        <label class="row mb-3">
            <span class="col-5">Password:</span>
            <input class="col-6 m-auto" type="text" name="password" placeholder="">
        </label>
        <label class="row mb-3">
            <span class="col-5">Confirm Password:</span>
            <input class="col-6 m-auto" type="text" name="confirm-password" placeholder="">
        </label>
        <input type="submit" value="Login" class="btn btn-primary p-1">
        <a id="link" href="/">Already have an Account? Login.</a>
    </form>
</body>
</html>