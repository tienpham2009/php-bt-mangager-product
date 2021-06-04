<?php

namespace App\Controller;

use App\Products;
use Models\ProductModels;

class ProductController
{
    protected ProductModels $productDB;

    public function __construct()
    {
        $this->productDB = new ProductModels();
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

    public function index()
    {
        $products = $this->productDB->getAll();
        include "View/Products/list.php";
    }

    public function add()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            include "View/Products/add.php";
        } else {
            $errors = $this->getError();
            if (empty($errors)) {
                $product = $this->getProducts();
                $this->productDB->create($product);
                header("Location: index.php");
            } else {
                include "View/Products/add.php";
            }
        }
    }

    public function delete()
    {
        $id = $_GET["id"];
        $product = $this->productDB->getById($id);
        unlink($product[0]->productImage);
        $this->productDB->delete($id);
        header("Location: index.php");
    }


    public function edit()
    {
        $id = $_GET["id"];
        $products = $this->productDB->getById($id);

        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            include "View/Products/edit.php";
        } else {
            $errors = $this->getError();

            if (empty($errors)) {
                $product = $this->getProducts();
                $this->productDB->edit($id, $product);
                header("Location: index.php");
            } else {
                include "View/Products/edit.php";
            }
        }
    }

    public function detail()
    {
        $id = $_GET["id"];
        $products = $this->productDB->getById($id);;
        include "View/Products/detail.php";
    }

    public function search()
    {
        if (empty($_POST["search"])){
            $products = $this->productDB->getAll();
        }else{
            $text = $_POST["search"];
            $products = $this->productDB->search($text);

        }
        include "View/Products/list.php";

    }



}