<?php declare(strict_types=1);

class SportProductDecorator implements Product
{
    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getPrice()
    {
        return $this->product->getPrice() + 20;
    }

    public function getDescription()
    {
        return "THis is product from Sport category";
    }
}