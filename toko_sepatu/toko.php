<?php
session_start();

// Array produk
$products = [
    ["id" => 1, "name" => "Nike Air Max", "price" => 150, "image" => "img/airmax.png"],
    ["id" => 2, "name" => "Nike Revolution", "price" => 75, "image" => "img/revolution.png"],
    ["id" => 3, "name" => "Nike Zoom", "price" => 135, "image" => "img/zoom.png"],
    ["id" => 4, "name" => "Nike Air Jordan", "price" => 140, "image" => "img/jordan.png"],
    ["id" => 5, "name" => "Nike Air Force 1", "price" => 100, "image" => "img/force.png"],
    ["id" => 6, "name" => "Nike Court Legacy", "price" => 80, "image" => "img/court.png"]
];

// Tambah ke keranjang
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['product_id'];
    $product = array_filter($products, fn($p) => $p['id'] == $productId);
    $product = reset($product);

    if (!empty($product)) {
        $_SESSION['cart'][] = $product;
    }

    header("Location: cart.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Sepatu</title>
    <link rel="stylesheet" href="toko.css">
</head>

<body>
    <header>
        <div class="logo">Shoes Store</div>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#products">Products</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="checkout.php">Checkout</a></li>
            </ul>
        </nav>
    </header>

    <section id="home" class="hero">
        <h1>Welcome to Our Store</h1>
        <p>Discover the best collection of shoes for everyone.</p>
    </section>

    <main>
        <section id="products" class="products">
            <h2>Our Products</h2>
            <div class="product-list">
                <?php foreach ($products as $product): ?>
                <div class="product">
                    <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>">
                    <h3><?= $product['name']; ?></h3>
                    <p>$<?= $product['price']; ?></p>
                    <form method="POST" action="">
                        <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                        <button type="submit">Add to Cart</button>
                    </form>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Toko Sepatu. All Rights Reserved.</p>
    </footer>
</body>

</html>