<div>
    <?php if(isset($products)) : ?>

    <a href=<?= site_url("/product/add"); ?>>Add product</a>
    <?php foreach($products as $value) : ?>
        <div class="col-sm-4 display-overlay">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2><?= $value["prix_products"]; ?> €</h2>
                                <p><?= $value["name_products"]; ?></p>
                                <a class="btn btn-default add-to-cart" href=<?= site_url("/user/addCart/".$value["id_products"]); ?>><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                        <?php if(sizeof($value["image"]) > 0) : ?>
                            <img alt="" src="<?= base_url().$value["image"][0]["url_images"]; ?>">
                        <?php endif; ?>
                        <h2><?= $value["prix_products"]; ?> €</h2>
                        <p><?= $value["name_products"]; ?></p>
                        <p><?= $value["description_products"]; ?></p>
                        <a class="btn btn-default add-to-cart" href="#"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php endif; ?>

<div id="resultSearch">

</div>

