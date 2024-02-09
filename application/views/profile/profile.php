<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../assets/profile/profile.css">
        <title>Min Min Collection</title>
    </head>
    <body>
        <h5 class="container mt-3">Edit Profile</h5>
        <div class="container row m-auto pt-3">
            <form class="col-5 m-auto p-4 border" action="/users/udpate_information/<?= $user['id'] ?>" method="POST">
                <p class="titleText">Edit Information</p>
<?php
        if($infomationError){
?>
            <?= $infomationError ?>
<?php
        }
?>
                <label>
                    Email Address: 
                    <input type="text" name="email" value="<?= $user['email'] ?>">
                </label>
                <label>
                    First name: 
                    <input type="text" name="firstname" value="<?= $user['first_name'] ?>">
                </label>
                <label>
                    Last name: 
                    <input type="text" name="lastname" value="<?= $user['last_name'] ?>">
                </label>
                <input type="submit" value="Save" class="btn btn-danger">
            </form>

            <form class="col-5 m-auto p-4 border" action="/users/update_password/<?= $user['id'] ?>" method="POST">
                <p class="titleText">Change password</p>
<?php
        if($passwordError){
?>
            <?= $passwordError ?>
<?php
        }
?>
                <label>
                    Old Pasword: 
                    <input type="text" name="old_password">
                </label>
                <label>
                    New Password: 
                    <input type="text" name="new_password">
                </label>
                <label>
                    Confirm Password: 
                    <input type="text" name="confirm_password">
                </label>
                <input type="submit" value="Save" class="btn btn-danger">
            </form>
        </div>
    </body>
</html>