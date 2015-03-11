<div id="content">
    <h2>
        Order recap
    </h2>

    <?php if(!empty($_SESSION["cart"])) : ?>

        <h2>
            Thanks for you order !
        </h2>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th class="text-center">Price</th>
                <th class="text-center">Total</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php for($i=0; $i<sizeof($_SESSION["cart"]); $i++) : ?>
                <tr class="productItem">
                    <td class="col-md-6">
                        <div class="media">
                            <?php $images = $this->Image_model->getAllImgByIdProduct($_SESSION["cart"][$i]["id_products"]); ?>
                            <?php if(sizeof($images) > 0) : ?>
                                <a href="#" class="thumbnail pull-left"> <img style="width: 72px; height: 72px;" src="<?= base_url().$images[0]["url_images"]; ?>" class="media-object"> </a>
                            <?php endif; ?>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"><?= $_SESSION["cart"][$i]["name_products"]; ?></a></h4>
                            </div>
                        </div></td>
                    <td style="text-align: center" class="col-md-1">
                        <h5 id="subtotalCart"><strong><?= $_SESSION["cart"][$i]["quantity"]; ?></strong></h5>
                    </td>
                    <td class="col-md-1 text-center priceCartItem" data-id = <?= $i; ?>><strong><?= $_SESSION["cart"][$i]["prix_products"]; ?> €</strong></td>
                    <td class="col-md-1 text-center totalCartItem" data-id = <?= $i; ?>><strong><?= $_SESSION["cart"][$i]["prix_products"]; ?> €</strong></td>
                </tr>
            <?php endfor; ?>
            <tr>
                <td> &nbsp; </td>
                <td> &nbsp; </td>
                <td><h3>Total</h3></td>
                <td class="text-right"><h3 id="totalCart"><strong></strong></h3></td>
            </tr>
            <tr>
                <td> &nbsp; </td>
                <td> &nbsp; </td>
                <td> &nbsp; </td>
            </tr>
            </tbody>
        </table>
        <p></p>
    <?php endif; ?>
</div>
