<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../../../assets/header/header.css">
        <title>Merchandise</title>
    </head>
    <body>
        <header class="d-flex justify-content-between align-items-end p-3">
            <ul class="d-flex justify-content-between align-items-end gap-5">
                <li id="title">Min Min Collection</li>
<?php
    if(isset($user)){
?>
                <li><a class="head-link" href="/dashboard/">Dashboard</a></li>
                <li><a class="head-link" href="/users/edit/<?= $user['id'] ?>">Profile</a></li>
<?php } ?>

            </ul>
            <ul class="d-flex justify-content-between align-items-end gap-5">
<?php
    if(isset($user)){
?>
                <li><a class="head-link" href="/users/logout">Log off</a></li>
<?php 
    }else{
?>
                <li><a class="head-link" href="<?= $register?'/':'/users/registration' ?>"><?= $register?'Log in':'Register' ?></a></li>
<?php } ?>
            </ul>
        </header>
    </body>
</html>