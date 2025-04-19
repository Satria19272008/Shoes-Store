<?php
// Array produk contoh
$products = [
    ['id' => 1, 'nama' => 'Model Sepatu 1', 'harga' => 99.99, 'image' => 'shoe1.jpg'],
    ['id' => 2, 'nama' => 'Model Sepatu 2', 'harga' => 129.99, 'image' => 'shoe2.jpg'],
    // Tambahkan lebih banyak produk sesuai kebutuhan
];

foreach ($products as $product) {
    echo '<div class="product">';
    echo '<img src="' . $product['image'] . '" alt="' . $product['nama'] . '">';
    echo '<h3>' . $product['nama'] . '</h3>';
    echo '<p>Harga: Rp ' . number_format($product['harga'], 2, ',', '.') . '</p>';
    echo '<form method="post">';
    echo '<input type="hidden" name="product_id" value="' . $product['id'] . '">';
    echo '<input type="hidden" name="product_name" value="' . $product['nama'] . '">';
    echo '<input type="hidden" name="product_price" value="' . $product['harga'] . '">';
    echo '<button type="submit" name="tambah_ke_keranjang">Tambahkan ke Keranjang</button>';
    echo '</form>';
    echo '</div>';
}
?>