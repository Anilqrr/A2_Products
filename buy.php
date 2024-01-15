
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: lightblue;  background:url('/project/css/back.jpg') no-repeat center center/cover;">
    
    
    <form action="buy.php" method="post" style="background-color: lightcyan; width: 200px; height: 300px; align-items: center; text-align: center; padding: 10px 2px 6px 4px; border-radius: 10px; margin-top: 200px; margin-left: 600px;">
       <img src="/project/img/logo2.jpg" alt="" srcset="" alt="test" style="height: 50px; border-radius: 10px;">   
        <h1>A2-Products</h1>
        <h4>User</h4>
      <div>  
        <div class="form-group" style="">
        <hr>
            <input type="number" class="" name="name" placeholder="Enter Card Number">
        </div>
        <div class="form-group" style="margin-right: 90px;margin-top: 10px;margin-left: 60px;">
            <input type="datetime" maxlength="7" name="card_date" size="7px" id="card_date" placeholder="MM/YY">
        </div>
        <div class="form-group"style="margin-right: 90px;margin-top: 10px;margin-left: 60px;">
            <input type="text" class="" maxlength="10" size="7px" name="cvc" placeholder="CVC">
        </div>
        <div class="payment" style="margin-right: 90px;margin-top: 10px;margin-left: 70px;">
            <button type='submit' class='btn btn-warning' name='pay' style="background-color: lightskyblue; color:white; border-radius: 10px; border-color:white ;">Payment</button>
        </div>
      </div>
    </form>
</body>
</html>
<?php
  session_start();
  $name = $_POST['name'];
  if(isset ($_POST['pay']))
  {
    ?>
     <a href='product.php?nm=<?php echo $name;?>'></a>
    <?php
  }

?>