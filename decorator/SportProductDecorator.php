<?php declare(strict_types=1);

class SportProductDecorator extends ProductDecorator
{
    public function getPrice()
    {
        return $this->product->getPrice() + 20;
    }

    public function getDescription()
    {
        return "THis is product from Sport category";
    }
}