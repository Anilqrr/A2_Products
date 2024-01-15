<?php require 'database/_dbconnect.php'; ?>
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
    <h1>Hello, world!</h1>
    <table class="table">
    INSERT INTO `payment`(`id`, `p_id`, `user_id`, `p_name`, `p_image`, `p_price`,
     `username`, `mobile_number`, `pincode`, `address`,
    `country`, `state`, `city`, `card-name`, `date`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]','[value-13]','[value-14]','[value-15]')
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">UserName</th>
      <th scope="col">Product</th>
      <th scope="col">Image</th>
      <th scope="col">Price</th>
      <th scope="col">FullName</th>
      <th scope="col">Moblie</th>
      <th scope="col">Picode</th>
      <th scope="col">Address</th>
      <th scope="col">Country</th>
      <th scope="col">State</th>
      <th scope="col">City</th>
      <th scope="col">Card-Name</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <?php 
     $query = "SELECT payment.*,users.username,country.country_name,state.s_name,city.name FROM payment,users,country,state,city WHERE (payment.user_id=users.id AND payment.country=country.co_id)"." AND (payment.state=state.id AND payment.city=city.id)";
     $run = mysqli_query($conn,$query);
     if(mysqli_num_rows($run) > 0)
     {
        while($row = mysqli_fetch_assoc($run))
        {
            
      
   
?>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['p_name']; ?></td>
      <td><img src="<?php echo $row['p_image']; ?>" width="70px" alt="" srcset=""></td>
      <td><?php echo $row['p_price']; ?></td>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['mobile_number']; ?></td>
      <td><?php echo $row['pincode']; ?></td>
      <td><?php echo $row['address']; ?></td>
      <td><?php echo $row['country_name']; ?></td>
      <td><?php echo $row['s_name']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['card-name']; ?></td>
      <td><?php echo $row['date']; ?></td>
    </tr>
    <?php
         }
        }
    ?>
  </tbody>
</table>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>