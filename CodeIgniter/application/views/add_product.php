<form action="" method="post" id="addProduct" enctype="multipart/form-data">
    <div class="form-group" id="nameGroup">
        <label for="title">Name</label>
        <input class="form-control" type="text" name="name" id="name"/>
    </div>
    <div class="form-group" id="priceGroup">
        <label for="price">Price</label>
        <input class="form-control" type="number" name="price" id="price"/>
    </div>
    <div class="form-group" id="pictureGroup">
        <label for="picture">Image</label>
        <input type="file" name="picture[]" id="picture" multiple/>
    </div>
    <div class="form-group" id="descriptionGroup">
        <label for="description">Description</label><br/>
        <textarea name="description" id="description" cols="100" rows="10"></textarea>
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
</form>

<?php if(isset($message) && $message != "") : ?>
    <div class="alert alert-danger">
        <?= $message; ?>
    </div>
<?php endif; ?>
