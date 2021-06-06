<?php

namespace App\Controller;

use App\Products;
use Models\ProductModels;
use Service\ProductService;

class ProductController
{
    protected ProductModels $productDB;
    protected ProductService $productService;

    public function __construct()
    {
        $this->productDB = new ProductModels();
        $this->productService = new ProductService();
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
            $errors = $this->productService->getError();
            if (empty($errors)) {
                $product = $this->productService->getProducts();
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
            $errors = $this->productService->getError();

            if (empty($errors)) {

                $product = $this->productService->getProducts();
                $this->productDB->edit($id, $product);
                $product = $this->productDB->getById($id);
                unlink($product[0]->productImage);

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