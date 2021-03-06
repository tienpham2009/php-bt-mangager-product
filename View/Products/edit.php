<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<form method="post" enctype="multipart/form-data">

    <?php  foreach ($products as $product): ?>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">ProductImage</label>
            <br>
            <img src="<?php echo $product->productImage?>" height="200px" width="250px">
            <input type="file" class="form-control" id="fileToUpload" name="fileToUpload">
        </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">ProductCode</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="productCode" value="<?php echo $product->productCode ?>">
        <?php if (isset($errors)):?>
            <p><?php echo $errors["productCode"]?></p>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">ProductName</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="productName" value="<?php echo $product->productName ?>">
        <?php if (isset($errors)):?>
            <p><?php echo $errors["productName"]?></p>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">ProductPrice</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="productPrice" value="<?php echo $product->productPrice ?>">
        <?php if (isset($errors)):?>
            <p><?php echo $errors["productPrice"]?></p>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">productDescription</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="productDescription" value="<?php echo $product->productDescription ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Producer</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="producer" value="<?php echo $product->producer ?>">
        <?php if (isset($errors)):?>
            <p><?php echo $errors["producer"]?></p>
        <?php endif; ?>
    </div>

    <?php endforeach;?>
    <button type="submit" class="btn btn-primary">S???a</button>
    <a type="button" href="index.php" class="btn btn-primary">Quay L???i</a>
</form>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
