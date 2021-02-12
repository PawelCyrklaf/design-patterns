<?php declare(strict_types=1);

/**
 * Class Product
 */
class Product
{
    public function getProduct(int $productId)
    {
        // Return selected product
    }

    public function getProducts()
    {
        // Return all products
    }
}

/**
 * Class Cart
 */
class Cart
{
    public function removeFromCart(int $product, int $cartId)
    {
        // Add new product to cart
    }

    public function getCart(int $cartId)
    {
        // Get products from cart
    }
}

/**
 * Class User
 */
class User
{
    public function login()
    {
        // Login user to system
    }

    public function register()
    {
        // Register new user
    }
}

/**
 * Class ApiClient
 */
class ApiClient
{
    private Product $product;
    private Cart $cart;
    private User $user;

    public function __construct()
    {
        $this->product = new Product();
        $this->cart = new Cart();
        $this->user = new User();
    }

    public function getProduct(int $productId)
    {
        $this->product->getProduct($productId);
    }

    public function getProducts()
    {
        $this->product->getProducts();
    }

    public function removeFromCart(int $productId, int $cartId)
    {
        $this->cart->removeFromCart($productId, $cartId);
    }

    public function getCart(int $cartId)
    {
        $this->cart->getCart($cartId);
    }

    public function login()
    {
        $this->user->login();
    }

    public function register()
    {
        $this->user->register();
    }
}

$apiClient = new ApiClient();
$apiClient->getProduct(1);
$apiClient->getProducts();
$apiClient->login();
$apiClient->register();
$apiClient->getCart(1123);
$apiClient->removeFromCart(1, 234);
