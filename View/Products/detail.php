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
<?php foreach ($products as $product): ?>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">producer :</label>
        <img src="<?php echo $product->productImage?>" width="250px" height="200px" >
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">ProductCode :</label>
        <p><?php echo $product->productCode?></p>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">productName :</label>
        <p><?php echo $product->productName?></p>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">productPrice :</label>
        <p><?php echo $product->productPrice?></p>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">productDescription :</label>
        <p><?php echo $product->productDescription?></p>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">producer :</label>
        <p><?php echo $product->producer?></p>
    </div>
<?php endforeach; ?>
<a type="button" href="index.php" class="btn btn-primary">Quay Lại</a>
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
