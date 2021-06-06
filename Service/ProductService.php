<?php
namespace Service;
include "vendor/autoload.php";

use App\Products;
use Models\ProductModels;

class ProductService
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel  = new ProductModels();
    }

    public function getImage(): string
    {
        $fileError = [];
        $target_dir = "Images/";

        $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);

        if ($_FILES["fileToUpload"]["size"] > 5000000){
            $fileError["fileUpload"] = "Chỉ được upload file dưới 5MB";
        }

        $file_type = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);


        $file_type_allow = ["jpg","png","jpeg","gif"];

        if (!in_array(strtolower($file_type), $file_type_allow)){
            $fileError["fileUpload"] = "Chỉ được upload file ảnh";
        }

        if (file_exists($target_file)){
            $fileError["fileUpload"] = "File đã tồn tại trên hệ thống";
        }

        if (empty($fileError)){
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        }
        return $target_file;
    }

    public function getProducts(): Products
    {
        $productCode = $_POST["productCode"];
        $productName = $_POST["productName"];
        $productPrice = $_POST["productPrice"];
        $productDescription = $_POST["productDescription"];
        $producer = $_POST["producer"];
        $productImage = $this->getImage();



        $data = [
            "productCode" => $productCode,
            "productName" => $productName,
            "productPrice" => $productPrice,
            "producer" => $producer
        ];

        $product = new Products($data);
        $product->setProductDescription($productDescription);
        $product->setProductImage($productImage);
        return $product;
    }

    public function getError(): array
    {
        $errors = [];
        $fields = ["productCode", "productName", "productPrice", "producer"];

        foreach ($fields as $field) {
            if (empty($_POST[$field]))
                $errors[$field] = "Không được để trống";
        }
        return $errors;
    }
}