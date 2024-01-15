<?php
session_start();
// database folder
require_once('db and style_css/_dbconnect.php');

//product showing function call(get_data file)
require_once('get_data.php');

//user login true or false checke
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
    $uname = $_SESSION['username'];
} else {
    $loggedin = false;
}

//   product id get on image through
$product = $_GET['id'];

$item_p = getData();
foreach ($item_p as $p) :
    if ($p['id'] == $product) :
        $name =  $p['p_name'];
        $price = $p['p_price'];
        $image = $p['p_image'];
    endif;
endforeach;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome-A2-Products </title>
    <!--css-->
    <link rel="stylesheet" href="/project/css/style.css" />

    <!--responesive-->
    <link rel="stylesheet" media="screen and (max-width:1170px)" href="/project/css/phone.css">

    <!--bootstrap css-->
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">

    <!--font awesome-->
    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.css">

</head>

<body class="bg-light">
      <!--login time show and not show menu-->
  <?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
} else {
  $loggedin = false;
}
?>
<nav class="navbar navbar-expand-lg navbar-drak bg-dark">
  <div id="logo">
    <img src="./img/logo.jpg" alt="AK-Computer" />
  </div>

  <ul>
    <li class="item"><a href="/project/index.php">Home</a></li>
    <li class="item"><a href="/project/menus/categries.php">categries</a></li>
    <li class="item"><a href="/project/menus/About.php">About</a></li>
    <li class="item"><a href="/project/menus/contact.php">Feedback</a></li>
    <?php
    if (!$loggedin) {
      echo '<li class="item"><a href="/project/signup.php">signup</a></li>
     <li class="item"><a href="/project/login.php">login</a></li>';
    }

    //login time show logout menu
    if ($loggedin) {
      echo '<li class="item"><a href="/project/logout.php">Logout</a></li>';
    }
    ?>
  </ul>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navabar-toggle-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="mr-auto"></div>
    <div class="navbar-nav">
      <a href="/project/cart.php" class="nav-item nav-link active">
        <h5 class="px-5 cart">
          <i class="fas fa-shopping-cart"></i>Cart
          <?php
          if (isset($_SESSION['cart'])) {
            $count = count($_SESSION['cart']);
            echo "<span id='cart_count' class='text-warning bg-light'>$count</span>";
          } else {
            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
          }
          ?>
        </h5>
      </a>
    </div>
  </div>
  <div>

    <div class="search">
      <input type="text" name="" id="searchbox">
      <input type="button" value="Search">
    </div>
    <div class="product-list">

    </div>
  </div>
  <div id="user">
    <a href="#user" target="home"><img src="img/user_logo.jpg" alt="test" srcset=""></a>
    <?php
     if(isset($_SESSION['user'])):
    user_data();
     endif;
    ?>
  </div>
</nav>
    <center>
    <div class="col-md-5 offset-md-1 border rounded mt-5 bg-white h-25">
        <img src="<?php echo $image; ?>" alt="" class="mx-3">
        <div class="pt-4">
            <h6>PRICE DETAILS</h6>
            <hr>
            <div class="row price-details">
                <div class="col-md-6">
                    <h6>Product Name:</h6>
                    <h6>Delivery Charges</h6>
                    <hr>
                    <h6>Amount Payable</h6>
                </div>
                <div class="col-md-6">
                    <h6><?php echo $name; ?></h6>
                    <h6 class="text-success">FREE</h6>
                    <hr>
                    <h6><?php echo $price; ?></h6>
                </div>
            </div>
        </div>
    </div>
    
    <form action="" method="post" style="margin-top:50px;" enctype="multipart/form-data">
        <div>
            <div>
                <input type="hidden" name="p_name" id="p_name" value="<?php echo $name; ?>">
                <input type="hidden" name="p_price" id="p_price" value="<?php echo $price; ?>">
                <input type="hidden" name="p_image" id="p_image" value="<?php echo $image; ?>">
            </div>
            <div class="form-group">
                <label for=""><b>Full Name:</b></label>
                <input type="text" class="" name="name"  placeholder="Enter Your FullName">
            </div>
            <div class="form-group">
                <label for=""><b>mobile number:</b></label>
                <input type="number" class=""  name="number" placeholder="Enter Your mobile number">
            </div>
            <div class="form-group">
                <label for=""><b>pincode:</b></label>
                <input type="number" class="" name="pin" placeholder="Enter pincode" require>
            </div>
            <div class="form-group">
                <label for=""><b>Address:</b></label>
                <textarea name="address" id="address" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label for="" class="form-label">Country</label>
                <select class="form-select" name="co_id" id="co_id">
                    <option value="0">Select Country...</option>
                    <?php
                    $co_id;
                    $co_query = "SELECT co_id,country_name FROM country";
                    $co_run = mysqli_query($conn, $co_query);

                    while ($co_row = mysqli_fetch_assoc($co_run)) {
                        echo " <option value=" . $co_row['co_id'] . ">" . $co_row['country_name'] . "</option>";
                        $co_id = $co_row['co_id'];
                    }
                    // $co_id = $_POST['co_id'];
                    ?>
                    <!-- <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option> -->
                </select>
            </div>

            <div>
                <label for="" class="form-label">State</label>
                <select class="form-select" name="s_id" id="s_id">
                    <option value="0">Select State...</option>
                    <!--                 
                //  echo $co_id = $co_row['co_id'];

              // $s_query = "SELECT s_id,state_name FROM `state` WHERE co_id='$co_id'";
                // $s_run = mysqli_query($conn, $s_query);
                // while ($s_row = mysqli_fetch_assoc($s_run)) {

                //     echo " <option value=" . $s_row['s_id'] . ">" . $s_row['state_name'] . "</option>";
                // }

                //    // $co_id = $_POST['co_id'];
                // //  echo $co_id; -->

                    <!-- <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option> -->
                </select>
            </div>
            <div class="form-group">
                <label for=""><b>city:</b></label>
                <select class="form-select" name="c_id" id="c_id">
                    <option value="0">Select City...</option>
                </select>
                <!-- <input type="text" class="" name="name" placeholder="Enter Your city"> -->
            </div>
            <!-- <div class="payment">
                <button type='submit' class='btn btn-warning' name='buy'>Buy Now</button>
                <button type='submit' class='btn btn-warning' name='add'>Add to Cart</button> 
            </div> -->
            </center>
            <div style="background-color: lightcyan; width:208px; height: 429px; align-items: center; text-align: center; padding: 10px 2px 6px 4px; border-radius: 10px; margin-top: 50px; margin-left: 600px;
">

                <img src='/project/img/logo.jpg' alt='' srcset='' alt='test' style='height: 50px; border-radius: 10px;'>
                <h1>A2-Products</h1>
                <h4>User</h4>
                <div>
                    <div class='form-group'>
                        <hr>
                        <input type='number' class='' name='card_number' id='card_number' placeholder='Enter Card Number' require>
                    </div>
                    <div class='form-group' style='margin-right: 90px;margin-top: 10px;margin-left: 60px;'>
                        <input type='datetime' maxlength='7' name='card_date' size='7px' id='card_date' placeholder='MM/YY' require>
                    </div>
                    <div class='form-group' style='margin-right: 90px;margin-top: 10px;margin-left: 60px;'>
                        <input type='text' class='' maxlength='10' size='7px' name='cvc' id='cvc' placeholder='CVC' require>
                    </div>
                    <div class='form-group' style='margin-top: 7px;'>
                        <input type='text' name='cardname' id='cardname' placeholder='Enter Card Name' require>
                    </div>
                </div>
            </div>
            <div class="payment">
            <button type='submit' class='btn btn-warning' name='buy'>Buy Now</button>
            </div>
        </div>

    </form>
                
    <script src="/project/jquery/jquery.js"></script>
    <!-- jquery file -->
    <script>
        $(document).ready(function() {
            jQuery('#co_id').change(function() {
                var id = jQuery(this).val();
                if (id == '0') {
                    jQuery('#s_id').html('<option>Select State...</option>');
                    jQuery('#c_id').html('<option>Select City....</option>');

                } else {
                    jQuery('#s_id').html('<option>Select State</option>');
                    jQuery.ajax({
                        type: 'post',
                        url: 'data.php',
                        data: 'id=' + id + '&type=state',
                        success: function(result) {
                            jQuery('#s_id').append(result);
                        }
                    });
                }
            });
        });
        //city
        $(document).ready(function() {
            jQuery('#s_id').change(function() {
                var id = jQuery(this).val();
                if (id == '0') {
                    jQuery('#c_id').html('<option>Select City....</option>');
                } else {
                    jQuery('#c_id').html('<option>Select City....</option>');
                    jQuery.ajax({
                        type: 'post',
                        url: 'data.php',
                        data: 'id=' + id + '&type=city',
                        success: function(result) {
                            jQuery('#c_id').append(result);
                        }
                    });
                }
            });
        });
    </script>
</body>
<!-- bootstrap js -->
<script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>

<!-- jquery file -->

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //user 
    // echo $_POST['cardname'];
    $u_query = "SELECT id,username FROM users WHERE username='$uname'";
    $u_run = mysqli_query($conn, $u_query);
    $u_row = mysqli_fetch_assoc($u_run);
    $u_id = $u_row['id'];
    if ($u_id == $u_id)
        //  product information
        $product;
    $p_name = $_POST['p_name'];
    $p_image = $_POST['p_image'];
    $p_price = $_POST['p_price'];
    //user informatio
    $u_id;
    $name = $_POST['name'];
    $phone_number = $_POST['number'];
    $pincode = $_POST['pin'];
    $address = $_POST['address'];
    $co = $_POST['co_id'];
    $s_id = $_POST['s_id'];
    $c_id = $_POST['c_id'];
    if (isset($_POST['buy'])) {
        if ($loggedin == true) {
            if ($name == !"" && $phone_number == !"" && $pincode == !"" && $address == !"" && $co == !0 && $s_id == !0 && $c_id == !0) {

                $card_number = $_POST['card_number'];
                $card_name  = $_POST['cardname'];
                $card_date = $_POST['card_date'];
                $card_cvs = $_POST['cvc'];
                if ($card_number == !"" && $card_name == !"" && $card_date == !"" && $card_cvs == !"") {
                    $b_query = "INSERT INTO `payment` (`p_id`, `user_id`, `p_name`, `p_image`, `p_price`, `username`, `mobile_number`, `pincode`, `address`, `country`, `state`, `city`, `card-name`, `date`) 
                       VALUES ('$product', '$u_id', '$p_name', '$p_image', '$p_price', '$name', '$phone_number', '$pincode', '$address', '$co', '$s_id', '$c_id', '$card_name', current_timestamp())";
                    $b_run = mysqli_query($conn, $b_query);
                    if ($b_run) {
                        echo "<script>alert('You Pay $p_price in $p_name product')</script>";
                    } else {
                        echo "<script>alert('You Payment is Fail')</script>";
                    }
                } else {
                    echo "<script>alert('Your Crad Details must be enter')</script>";
                }
            } else {
                echo "<script>alert('Your Data  Empty')</script>";
            }
        } else {
            echo "<script>alert('Login in This website')</script>";
        }
    }
}

?>