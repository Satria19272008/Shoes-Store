<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $payment = $_POST['payment'];

    // Proses data checkout
    unset($_SESSION['cart']);

    // Logika untuk menampilkan nama metode pembayaran yang lebih jelas
    $payment_method = '';
    if ($payment == 'credit_card') {
        $payment_method = 'Credit Card';
    } elseif ($payment == 'paypal') {
        $payment_method = 'Paypal';
    }

    echo'
    
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Checkout Berhasil</title>
        <link rel="stylesheet" href="process_checkout.css">
    </head>
    <body>
        <div class="container">
            <h2>Thank you for shopping, ' . htmlspecialchars($name) . '!</h2>
            <p>Your order will be sent to: <strong>' . htmlspecialchars($address) . '</strong></p>
            <p>Confirmation has been sent to your email: <strong>' . htmlspecialchars($email) . '</strong></p>
            <p>Payment Method: <strong>' . $payment_method . '</strong></p>

            <button onclick="window.location.href=\'toko.php\';" class="back-button">Back to Homepage</button>
        </div>
    </body>
    </html>
    ';
}
?>