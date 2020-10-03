<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<div>
    <?php include '../Model/Query_author.php'; ?>
    <?php include '../Model/Query_book.php'; ?>

    <div class="container mt-3">
        <h1>Library With Join </h1>
        <a href="author.php" class="btn btn-info">Add Author Here</a>
        <a href="book.php" class="btn btn-success">Add Book Here</a>


        <!-- table author -->


        <!-- table book -->
        <h3 class="mt-4">Table Book</h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            include '../Library/Process.php';
            $no = 1;
            ($list_book = mysqli_query(
                $mysqli,
                'SELECT * FROM author JOIN book ON author.id = book.id_author ORDER BY book.id ASC'
            )) or die($mysqli->error);
            while ($book_row = $list_book->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $book_row['title']; ?> </td>
                    <td><?php echo $book_row['name']; ?></td>
                    <td>
                        <a href="edit_book.php?id=<?php echo $book_row['id']; ?>" class="btn btn-warning"> Edit</a>
                        <a href="../Model/Query_book.php?delete=<?php echo $book_row['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endwhile;
            ?>
        </table>

        <!-- table join -->
        <h3 class="mt-4">Table Join</h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Title</th>
                </tr>
            </thead>
            <?php
            include '../Library/Process.php';
            $no = 1;
            ($list_join = mysqli_query(
                $mysqli,
                'SELECT * FROM author JOIN book ON author.id = book.id_author'
            )) or die($mysqli->error);
            while ($join_row = $list_join->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $join_row['name']; ?> </td>
                    <td><?php echo $join_row['address']; ?> </td>
                    <td><?php echo $join_row['phone_number']; ?></td>
                    <td><?php echo $join_row['title']; ?></td>
                </tr>
            <?php endwhile;
            ?>
        </table>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>

</html>