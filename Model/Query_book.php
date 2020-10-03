<?php

include '../Library/Process.php';

if (isset($_POST['save_book'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];

    mysqli_query($mysqli, "INSERT INTO book (title, id_author) VALUES ('$title', '$author') ");

    header('location: ../View/index.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($mysqli, "DELETE FROM book WHERE id=$id");

    header('location:../View/index.php');
}

if (isset($_POST['update_book'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    echo $title;
    try {
        mysqli_query(
            $mysqli,
            "UPDATE menu SET title='$title' WHERE id=$id"
        );
        echo "bisa";
    } catch (Exception $e) {
        echo "gak bisa " . $e;
    }
}
