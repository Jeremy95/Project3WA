<?php if(!empty($_SESSION["cart"])) : ?>
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
                            <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                            <span>Status: </span><span class="text-warning"><strong>Leaves warehouse in 2 - 3 weeks</strong></span>
                        </div>
                    </div></td>
                <td style="text-align: center" class="col-md-1">
                    <input min="0" type="number" value="1" class="form-control quantity" data-id = <?= $i; ?>>
                </td>
                <td class="col-md-1 text-center priceCartItem" data-id = <?= $i; ?>><strong><?= $_SESSION["cart"][$i]["prix_products"]; ?> €</strong></td>
                <td class="col-md-1 text-center totalCartItem" data-id = <?= $i; ?>><strong><?= $_SESSION["cart"][$i]["prix_products"]; ?> €</strong></td>
                <td class="col-md-1">
                    <a style="color: #ffffff" href=<?= site_url("/user/removeCart/".$i); ?>>
                        <button class="btn btn-danger" type="button">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button></a></td>
            </tr>
        <?php endfor; ?>
        <tr>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td><h5>Subtotal</h5></td>
            <td class="text-right"><h5 id="subtotalCart"><strong></strong></h5></td>
        </tr>
        <tr>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td><h5>Estimated shipping</h5></td>
            <td class="text-right"><h5 id="estimatedShippingCart"><strong></strong></h5></td>
        </tr>
        <tr>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td><h3>Total</h3></td>
            <td class="text-right"><h3 id="totalCart"><strong></strong></h3></td>
        </tr>
        <tr>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td>
                <a href=<?= site_url("/product")?>>
                    <button class="btn btn-default" type="button">
                        <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                    </button>
                </a>
                </td>
            <td>
                <button class="btn btn-success" type="button">
                    Checkout <span class="glyphicon glyphicon-play"></span>
                </button></td>
        </tr>
        </tbody>
    </table>
<?php else : ?>
    <div>
        <p>
            You're cart is empty
        </p>
    </div>
<?php endif; ?>
