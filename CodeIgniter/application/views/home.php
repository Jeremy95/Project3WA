<?php if(isset($products)) : ?>
    <div id="home">
        <?php foreach($products as $value) : ?>
            <div class="owl-item" style="width: 293px;">
                <div class="item">
                    <div class="product">
                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" data-target="#product-details-modal" class="btn btn-xs  btn-quickview" title="Quick View">
                                    Quick View
                                </a>
                            </div>
                            <a href="product-details.html">
                                <?php if(sizeof($value["image"]) > 0) : ?>
                                    <img class="img-responsive" alt="img" src="<?= base_url().$value["image"][0]["url_images"]; ?>">
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="description">
                            <h4><a href="product-details.html"><?= $value["name_products"]; ?></a></h4>
                            <p><?= $value["description_products"]; ?> </p>
                            <span class="size">XL / XXL / S </span> </div>
                        <div class="price"> <span><?= $value["prix_products"]." €"; ?></span> </div>
                        <div class="action-control"> <a href=<?= site_url("/user/addCart/".$value["id_products"]); ?> class="btn btn-primary"> <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a> </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>

<div id="resultSearch">

</div>

