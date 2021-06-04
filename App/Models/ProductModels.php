<?php

namespace Models;

use App\Products;
class ProductModels
{
    protected \PDO $connect;

    public function __construct()
    {
        $database = new Databases();
        $this->connect = $database->connect();
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM `Products`";
        $statement = $this->connect->prepare($sql);
        $statement->execute();

        $result = $statement->fetchAll();
        $products = [];

        foreach ($result as $item){

            $product = new Products($item);
            $product->setId($item["Id"]);
            $product->setProductDescription($item["productDescription"]);
            $product->setProductImage($item["productImage"]);
            $products[] = $product;

        }
        return $products;
    }

    public function create(object $product)
    {

        $sql = "INSERT INTO Products (productCode ,productName ,productPrice,productDescription,producer,productImage) 
                VALUES (:productCode,:productName,:productPrice,:productDescription,:producer,:productImage) ";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(":productCode", $product->productCode);
        $statement->bindParam(":productName",$product->productName);
        $statement->bindParam(":productPrice",$product->productPrice);
        $statement->bindParam(":productDescription",$product->productDescription);
        $statement->bindParam(":producer",$product->producer);
        $statement->bindParam(":productImage",$product->productImage);

        return $statement->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM Products WHERE productCode = :id";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(":id", $id);
        return $statement->execute();
    }

    public function edit($id,object $product)
    {
        $sql = "UPDATE Products SET productCode = :productCode, productName = :productName,productPrice = :productPrice,productDescription = :productDescription,producer = :producer
                WHERE productCode = :id";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(":productCode", $product->productCode);
        $statement->bindParam(":productName",$product->productName);
        $statement->bindParam(":productPrice",$product->productPrice);
        $statement->bindParam(":productDescription",$product->productDescription);
        $statement->bindParam(":producer",$product->producer);
        $statement->bindParam(":id", $id);

        return $statement->execute();
    }

    public function getById($id): array
    {
        $sql = "SELECT * FROM `Products` WHERE productCode = :id";
        $statement = $this->connect->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();

        $result = $statement->fetchAll();
        $products = [];

        foreach ($result as $item){

            $product = new Products($item);
            $product->setId($item["Id"]);
            $product->setProductDescription($item["productDescription"]);
            $product->setProductImage($item["productImage"]);

            $products[] = $product;
        }
        return $products;

    }

    public function search($text): array
    {
        $sql = "SELECT * FROM `Products` WHERE `productName` LIKE :text" ;
        $statement = $this->connect->prepare($sql);
        $txt = '%'.$text.'%';
        $statement->bindParam(":text", $txt);
        $statement->execute();

        $result = $statement->fetchAll();
        $products = [];

        foreach ($result as $item){

            $product = new Products($item);
            $product->setId($item["Id"]);
            $product->setProductDescription($item["productDescription"]);

            $products[] = $product;
        }
        return $products;
    }


}