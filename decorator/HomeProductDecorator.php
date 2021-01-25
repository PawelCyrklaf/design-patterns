<?php declare(strict_types=1);

class HomeProductDecorator implements Product
{
    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getPrice()
    {
        return $this->product->getPrice() + 50;
    }

    public function getDescription()
    {
        return "This is product from Home category";
    }
}