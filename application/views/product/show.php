<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../assets/product/show.css">
        <title>Min Min Collection</title>
    </head>
    <body>
        <div class="container">
            <h5 class="mt-3"><?= $product['product_name'] ?> ( $<?= $product['price'] ?> )</h5>
            <label class="d-flex align-items-start justify-content-start">
                <p>Added since:</p><p class="info"><?= $product['product_name'] ?> </p>
            </label>
            <label class="d-flex align-items-start justify-content-start">
                <p>Product ID:</p><p class="info"><?= $product['id'] ?> </p>
            </label>
            <label class="d-flex align-items-start justify-content-start">
                <p>Description:</p><p class="info"><?= $product['description'] ?> </p>
            </label>
            <label class="d-flex align-items-start justify-content-start">
                <p>Total Sold:</p><p class="info"><?= $product['sold_count'] ?> </p>
            </label>
            <label class="d-flex align-items-start justify-content-start">
                <p>Number of available stocks:</p><p class="info"><?= $product['stocks_count'] ?></p>
            </label>

            <div id="review_reply-cont">
                <!-- foreach for the review -->
<?php
        foreach($wall as $review){
?>
                <div class="mt-1">
                    <div class="review">
                        <section class="d-flex justify-content-between p-2">
                            <span><?= $review['fullname'] ?> wrote:</span>
                            <span><?= $review['time'] ?></span>
                        </section>
                        <p><?= $review['review'] ?></p>                       
                    </div>
<?php
        foreach($review['replies'] as $reply){
?>
                    <div class="reply">
                        <section class="d-flex justify-content-between p-2">
                            <span><?= $reply['fullname'] ?> wrote:</span>
                            <span><?= $reply['time'] ?></span>
                        </section>
                        <p><?= $reply['reply'] ?></p>                   
                    </div>
<?php } ?>        
                    <form action="/products/add_reply/<?= $review['review_id'] ?>/<?= $product['id'] ?>" method="POST" class="mt-3 reply">
                        <textarea name="text"></textarea>
                        <input type="submit" value="Post" class="btn btn-warning">
                    </form> 
                </div>  
<?php } ?>

                <form action="/products/add_review/<?= $product['id'] ?>" method="POST" class="mt-1">
                    <h6>Leave a Review</h6>
                    <textarea name="text"></textarea>
                    <input type="submit" value="Post" class="btn btn-warning">
                </form>
            </div>
        </div>
    </body>
</html>