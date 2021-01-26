<?php declare(strict_types=1);

/**
 * Interface Product
 */
interface Product
{
    public function getPrice();

    public function getDescription();
}

/**
 * Class BaseProduct
 */
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

/**
 * Class ProductDecorator
 */
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

/**
 * Class HomeProductDecorator
 */
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

/**
 * Class SportProductDecorator
 */
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

$baseProduct = new BaseProduct();
echo $baseProduct->getPrice();

$sportProductDecorator = new SportProductDecorator($baseProduct);
echo $sportProductDecorator->getPrice();

$homeProductDecorator = new HomeProductDecorator($baseProduct);
echo $homeProductDecorator->getPrice();