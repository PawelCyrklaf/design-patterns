<?php declare(strict_types=1);

class BaseProduct implements Product
{
    public function getPrice()
    {
        return 20;
    }

    public function getDescription()
    {
        return "This is base product";
    }
}