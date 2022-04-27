<?php 
    include('config.php');
    $img = $_COOKIE['img'];
    $name = $_COOKIE['name'];
    $price = $_COOKIE['price'];
    //$quantity = $_COOKIE['quantity'];
    
    //$filename = fopen($file_path."/cart.txt", "a")
        $filename = $file_path.'/cart.txt';
        file_put_contents( $filename, $img.",".$name.",".$price."\n", FILE_APPEND);
        header('Location: index.php');
        exit();
?>

