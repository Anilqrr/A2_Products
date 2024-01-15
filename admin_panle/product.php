
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <?php require 'header.php'; ?>
    <h1>Products</h1>
    <a href="add_products.php"><button type="button" class="btn btn-primary">Add New</button></a>
    <!-- table-->

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">categriey Name</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Image</th>
                <th scope="col">Date/Time</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // connection folder 
            require 'database/_dbconnect.php';

            $query = "SELECT products.*,categries.name FROM products,categries WHERE products.cat_id=categries.cat_id order by products.id desc";

            $run = mysqli_query($conn, $query);

            if (mysqli_num_rows($run) > 0) {
                while ($row = mysqli_fetch_assoc($run)) {
            ?>
                    <tr>
                        <th scope='row'><?php echo $row["id"]; ?></th>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['p_name']; ?></td>
                        <td><?php echo '$'.$row['p_price']; ?></td>
                        <td><img src="<?php echo $row['p_image']; ?>" width="70px" alt="" srcset=""></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><a href="products-update.php?p_id=<?php echo $row['id']; ?>"><button type='button' class='btn btn-primary'>Update</button></a>
                        <a href="products-delete.php?p_id=<?php echo $row['id'];  ?>"><button type='button' class='btn btn-danger'>Delete</button></a>

                    </tr>
            <?php
                }
            }
            else
            {
                ?>
                   <tr>
                        <td>NO Data Found</td>
                   </tr>
                <?php
            }
            ?>

        </tbody>
    </table>

</body>
<script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>