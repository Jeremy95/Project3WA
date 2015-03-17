<?php if(isset($products)) : ?>
    <div id="home">
        <?php foreach($products as $value) : ?>
            <div class="col-sm-4 col-lg-4 col-md-4" >
                <div class="thumbnail">
                    <a href=<?= site_url("/product/detail/".$value["id_products"]); ?>>
                        <?php if(sizeof($value["image"]) > 0) : ?>
                            <img class="img-responsive" alt="img" src="<?= base_url().$value["image"][0]["url_images"]; ?>">
                        <?php endif; ?>
                    </a>
                    <div class="caption">
                        <h4 class="pull-right>">
                            <?= $value["prix_products"]." €"; ?>
                        </h4>
                        <h4>
                            <a href=href=<?= site_url("/product/detail/".$value["id_products"]); ?>>
                                <?= $value["name_products"]; ?>
                            </a>
                        </h4>
                        <p><?= $value["description_products"]; ?> </p>
                        <div class="ratings">
                            <p class="pull-right"><?= $value["note_products"]; ?> /10</p>
                            <p>
                                <?php for($i=0; $i<intval($value["note_products"]); $i++) : ?>
                                    <span class="glyphicon glyphicon-star"></span>
                                <?php endfor; ?>
                            </p>
                        </div>
                        <span class="size">XL / XXL / S </span>
                    </div>

                    <div class="action-control">
                        <a href=<?= site_url("/user/addCart/".$value["id_products"]); ?> class="btn btn-primary">
                        <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i>
                            Add to cart
                        </span>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>

<div id="resultSearch">

</div>

