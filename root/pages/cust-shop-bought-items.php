<?php 
    $cartItems = json_decode($_POST['cartItems']);

    foreach ($cartItems as $cartItem) {
        print_r($cartItem->title);
    }
?>