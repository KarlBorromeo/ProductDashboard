<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Min Min Collection</title>
    </head>
    <body>
        <div class="container">
            <div class="d-flex justify-content-between mt-3 align-items-center">
                <h5>Manage Products</h5>
<?php
    if($user['role'] == "admin"){
?>
                <a href="/dashboard/new" class="btn btn-primary">Add New</a>
<?php } ?>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Inventory Count</th>
                        <th>Quantity Sold</th>
<?php
    if($user['role'] == "admin"){
?>
                        <th>Action</th>
<?php } ?>
                    </tr>
                </thead>
                <tbody>
<?php
        foreach($products as $product){
?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><a href="/products/show/<?= $product['id'] ?>"><?= $product['product_name'] ?></a></td>
                        <td><?= $product['stocks_count'] ?></td>
                        <td><?= $product['sold_count'] ?></td>
<?php
    if($user['role'] == "admin"){
?>
                        <td>
                            <a href="/dashboard/edit/<?= $product['id'] ?>">edit</a>
                            <a href="/dashboard/delete_product/<?= $product['id'] ?>">remove</a>
                        </td> 
<?php } ?>

                    </tr>
<?php
        }
?>

                </tbody>

            </table>
        </div>
    </body>
</html>