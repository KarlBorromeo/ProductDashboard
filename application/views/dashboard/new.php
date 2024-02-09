<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../assets/product/product.css">
        <title>Min Min Collection</title>
    </head>
    <body>
       <div class="container">
            <div class="d-flex justify-content-between mt-3 align-items-center">
                <h5>Add a new product</h5>
                <a href="/dashboard/" class="btn btn-primary">Return to Dashboard</a>
            </div>
            <form action="/dashboard/add_new_product" method="POST" class="p-3">
<?php
        if(isset($errors)){
?>
            <?= $errors ?>
<?php } ?>
                <label class="row mb-3">
                    <span class="col-5">Name:</span>
                    <input class="col-7 m-auto" type="text" name="name" placeholder="">
                </label>
                <label class="row mb-3">
                    <span class="col-5">Description:</span>
                    <textarea class="col-7 m-auto" type="text" name="description" placeholder=""></textarea>
                </label>
                <label class="row mb-3">
                    <span class="col-5">Price:</span>
                    <input class="col-7 m-auto" type="text" name="price" placeholder="">
                </label>
                <label class="row mb-3">
                    <span class="col-5">Inventory Count:</span>
                    <input class="col-7 m-auto" type="number" min="1" value="1" name="stocks" placeholder="">
                </label>
                <input type="submit" value="Create" class="btn btn-warning">
            </form>
        </div>
    </body>
</html>