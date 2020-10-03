<?php

include '../Library/Process.php';

if (isset($_POST['save_author'])) {
    echo "masuk";
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    mysqli_query($mysqli, "INSERT INTO author (name, address, phone_number) VALUES ('$name', '$address', '$phone_number') ");



    header('location: ../View/index.php');
}
