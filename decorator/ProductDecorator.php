<?php

abstract class ProductDecorator implements Product
{
    protected Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    abstract public function getPrice();

    abstract public function getDescription();
}