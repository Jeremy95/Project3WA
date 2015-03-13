<div class="blogpost clearfix">
    <div class="panel panel-default">
        <div class="panel-body narrow">
            <h2>
                <a href="#">
                    <?= $product["name_products"]; ?>
                </a></h2>
            <hr>
            <?php if(sizeof($product["id_img"]) > 0) : ?>
                <img class="img-responsive" alt="img" src="<?= base_url().$product["url_images"]; ?>">
            <?php endif; ?>
            <p><?= $product["description_products"]; ?></p>
            <hr>
            <div class="price"> <span><?= $product["prix_products"]." €"; ?></span> </div>
            <p></p>
        </div>
    </div>
</div>
<div class="row well">
    <blockquote>
        <h4>Ecrivez un commentaire...</h4>
        <form action="" method="post" id="addComment">
            <p>
                <select name="note" id="note">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </p>
            <textarea name="content_comment" id="content_comment" cols="50" rows="3"></textarea>
            <input type="hidden" id="IdUser" name="IdUser" value="<?= $_SESSION["id"]; ?>" />
            <input type="hidden" id ="productId" name="productId" value="<?= $product["id_products"]; ?>"/>
            <input type="submit" value="Envoyez"/>
        </form>
    </blockquote>
</div>
<div>
    <p class="alert-danger">
    </p>
</div>

<div id="comments">
    <?php if(!empty($product["commentary"])) : ?>
        <?php for($i=0; $i < sizeof($product["commentary"]); $i++) : ?>
            <div id="row" class="row well">
                <blockquote>
                    <p>
                        <?= $product["commentary"][$i]["content_comments"]; ?>
                    </p>
                    <footer>
                        <span class="glyphicon glyphicon-user"></span>
                        <?= $product["commentary"][$i]["name_user"]; ?>
                        <span class="glyphicon glyphicon-time"></span>
                        <?= $product["commentary"][$i]["date_comments"]; ?>
                    </footer>
                </blockquote>
            </div>
        <?php endfor; ?>
    <?php endif; ?>
</div>

