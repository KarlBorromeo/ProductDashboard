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
                <h5>Edit Product</h5>
                <a href="/dashboard/" class="btn btn-primary">Return to Dashboard</a>
            </div>
            <form action="/dashboard/update_product/<?= $product['id'] ?>" method="POST" class="p-3">
<?php
        if(isset($errors)){
?>
            <?= $errors ?>
<?php } ?>
                <label class="row mb-3">
                    <span class="col-5">Name:</span>
                    <input class="col-7 m-auto" type="text" name="name" value="<?= $product['product_name'] ?>">
                </label>    
                <label class="row mb-3">
                    <span class="col-5">Description:</span>
                    <textarea class="col-7 m-auto" type="text" name="description" placeholder=""><?= $product['description'] ?></textarea>
                </label>
                <label class="row mb-3">
                    <span class="col-5">Price:</span>
                    <input class="col-7 m-auto" type="text" name="price" value="<?= $product['price'] ?>">
                </label>
                <label class="row mb-3">
                    <span class="col-5">Inventory Count:</span>
                    <input class="col-7 m-auto" type="number" min="1" value="1" name="stocks" value="<?= $product['stocks_count'] ?>">
                </label>
                <input type="submit" value="Save" class="btn btn-warning">
            </form>
        </div>
    </body>
</html>