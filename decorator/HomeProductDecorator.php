<?php declare(strict_types=1);

class HomeProductDecorator extends ProductDecorator
{
    public function getPrice()
    {
        return $this->product->getPrice() + 50;
    }

    public function getDescription()
    {
        return "This is product from Home category";
    }
}