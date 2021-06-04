<?php
namespace App;

class Products
{
    public int $id;
    public string $productCode;
    public string $productName;
    public string $productPrice;
    public mixed $productDescription;
    public string $producer;
    public mixed $productImage;

    public function __construct($data)
    {
        $this->producer = $data["producer"];
        $this->productCode = $data["productCode"];
        $this->productName = $data["productName"];
        $this->productPrice = $data["productPrice"];
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @param string $productDescription
     */
    public function setProductDescription(mixed $productDescription)
    {
        $this->productDescription = $productDescription;
    }

    /**
     * @param string $productImage
     */
    public function setProductImage(mixed $productImage)
    {
        $this->productImage = $productImage;
    }

}