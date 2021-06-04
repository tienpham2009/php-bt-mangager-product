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
    <style>
        td,th{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="card">
    <div class="card-header">
        <table style="width: 100%">
            <tr>
                <td>Danh Sách</td>
                <td style="text-align: right"><a class="btn btn-success mb-2" href="./index.php?page=add">Thêm mới</a></td>
            </tr>
        </table>
    </div>

    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th>STT</th>
            <th>Mã Súng</th>
            <th>Tên Súng</th>
            <th>Giá($)</th>
            <th>Nhà Cung Cấp</th>
            <th>Hình Ảnh</th>
            <th></th>
        </tr>
        </thead>
        <?php foreach ($products as $key => $product): ?>
            <tr>
                <td><?php echo $key + 1?></td>
                <td><?php echo $product->productCode ?></td>
                <td><?php echo $product->productName ?></td>
                <td><?php echo $product->productPrice ?></td>
                <td><?php echo $product->producer ?></td>
                <td><img src="<?php echo $product->productImage ?>" width="200px" height="100px"> </td>
                <td>
                    <a type="button" href="index.php?page=delete&id=<?php echo $product->productCode ?>" class="btn btn-primary"
                    onclick="return confirm('Bạn chắn muốn xóa')">Xóa</a>
                    <a type="button" href="index.php?page=edit&id=<?php echo $product->productCode ?>" class="btn btn-primary">Sửa</a>
                    <a type="button" href="index.php?page=detail&id=<?php echo $product->productCode ?>" class="btn btn-primary">Chi tiết</a>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>
</div>
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
