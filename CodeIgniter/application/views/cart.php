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
    <?php foreach($_SESSION['cart'] as $product) : ?>
    <tr>
        <td class="col-md-6">
            <div class="media">
        <?php $images = $this->Image_model->getAllImgByIdProduct($product["id_products"]); ?>
        <?php if(sizeof($images) > 0) : ?>
                <a href="#" class="thumbnail pull-left"> <img style="width: 72px; height: 72px;" src="<?= base_url().$images[0]["url_images"]; ?>" class="media-object"> </a>
        <?php endif; ?>
                <div class="media-body">
                    <h4 class="media-heading"><a href="#"><?= $product["name_products"]; ?></a></h4>
                    <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                    <span>Status: </span><span class="text-warning"><strong>Leaves warehouse in 2 - 3 weeks</strong></span>
                </div>
            </div></td>
        <td style="text-align: center" class="col-md-1">
            <input type="email" value="2" id="exampleInputEmail1" class="form-control">
        </td>
        <td class="col-md-1 text-center"><strong><?= $product["prix_products"]; ?> €</strong></td>
        <td class="col-md-1 text-center"><strong></strong></td>
        <td class="col-md-1">
            <button class="btn btn-danger" type="button">
                <span class="glyphicon glyphicon-remove"></span> Remove
            </button></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td> &nbsp; </td>
        <td> &nbsp; </td>
        <td> &nbsp; </td>
        <td><h5>Subtotal</h5></td>
        <td class="text-right"><h5><strong>$24.59</strong></h5></td>
    </tr>
    <tr>
        <td> &nbsp; </td>
        <td> &nbsp; </td>
        <td> &nbsp; </td>
        <td><h5>Estimated shipping</h5></td>
        <td class="text-right"><h5><strong>$6.94</strong></h5></td>
    </tr>
    <tr>
        <td> &nbsp; </td>
        <td> &nbsp; </td>
        <td> &nbsp; </td>
        <td><h3>Total</h3></td>
        <td class="text-right"><h3><strong>$31.53</strong></h3></td>
    </tr>
    <tr>
        <td> &nbsp; </td>
        <td> &nbsp; </td>
        <td> &nbsp; </td>
        <td>
            <button class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
            </button></td>
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