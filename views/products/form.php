<?php if (!empty($errors)) : ?>
    <div class="alert alert-danger">
        <?php
        foreach ($errors as $error): ?>
            <div> <?php echo $error ?> </div>
        <?php endforeach;

        ?>
    </div>
<?php endif; ?>

<form method="post" enctype="multipart/form-data">

    <?php if ($product['image']): ?>
        <img src="/<?php echo $product['image']?>" class="product-image-view" >
    <?php endif; ?>
    <div class="mb-3">
        <label class="form-label">product image</label>
        <input type="file" name="image" class="form-control"  aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label class="form-label">product title</label>
        <input type="text" name="title" class="form-control"  aria-describedby="emailHelp" value="<?php echo $title; ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">product description</label>
        <textarea  class="form-control" name="description" aria-describedby="emailHelp"><?php echo $description ;?></textarea>

    </div>
    <div class="mb-3">
        <label class="form-label">product price</label>
        <input type="number" step=".01" name="price" class="form-control"  aria-describedby="emailHelp" value="<?php echo $price?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>