<?php

function component($p_name, $p_price, $p_image, $p_id)
{
    $element ="
    <div class='col-md-3 col-sm-6 my-3 my-md-0'>
    <form action='/project/index.php' method='post'>
      <div class='card shadow'>
        <div>
         <a href='/project/product.php?id=$p_id'><img src='$p_image' alt='test' class='img-fluid card-img-top'></a>
        </div>
        <div class='card-body'>
          <h5 class='card-title'>$p_name</h5>
          <h6>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='far fa-star'></i>
          </h6>
          <p class='card-text'>
            Some quick example text to build on the card.
          </p>
          <h5>
            <small><s class='text-secondary'>$799</s></small>
            <span class='price'>$$p_price</span>
            
          </h5>
          
          <button type='submit' class='btn btn-warning' name='add'><i class='fas fa-shopping-cart'></i>Add to Cart</button>
          <input type='hidden' name='product_id' value='$p_id'>
        </div>
      </div>
    </form>
  </div>

    ";
    echo $element;
}

function cartElement($p_image, $p_name, $p_price, $p_id)
{
  $cart = "
  <form action='/project/cart.php?action=remove&id=$p_id' method='post' class='cart-items'>
  <div class='border rounded'>
      <div class='row bg-white'>
          <div class='col-md-3 pl-0'>
              <img src='$p_image' alt='test' class='img-fluid'>
          </div>
          <div class='col-md-6'>
              <h5 class='pt-2'>$p_name</h5>
              <small class='text-secondary'>Sellr:</small>
              <h5 class='pt-2'>$$p_price</h5>
              <a href='product.php?id=$p_id'><button type='button' class='btn btn-primary'>Purchase</button></a>
              <button type='submit' class='btn btn-danger mx-2' name='remove'>Remove</button>
          </div>
          <div class='col-md-3'><!--py-5-->
              <div>
                  <button type='button' class='btn bg-light border rounded-circle'><i class='fas fa-minus'></i></button>
                  <input type='text' value='1' class='form-control w-25 d-inline'>
                  <button type='button' class='btn bg-light border rounded-circle'><i class='fas fa-plus'></i></button>

              </div>
          </div>
      </div>
  </div>
</form>   
   
  ";
  echo $cart;
}

function get_categries($c_name, $c_image, $c_id)
{
$cat = "<div class='col-md-3 col-sm-6 my-3 my-md-0'>
    <form action='menus/categries.php' method='post'>
      <div class='card shadow'>
        <h6>$c_name</h6>
        <div>
         <a href='get_categries.php?id=$c_id'><img src='$c_image' alt='test' class='img-fluid card-img-top'></a>
        </div>
        <div>
          <input type='hidden' name='product_id' value='$c_id'>
        </div>
      </div>
    </form>
  </div>";
  echo $cat;
}
function slider($s_name1, $s_name2, $s_name3)
{
   $slider ="
   <div id='carouselExampleCaptions' class='carousel slide' data-bs-ride='carousel'>
   <div class='carousel-indicators'>
     <button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
     <button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='1' aria-label='Slide 2'></button>
     <button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='2' aria-label='Slide 3'></button>
   </div>
   <div class='carousel-inner'>
     <div class='carousel-item active'>
       <img src='......' class='d-block w-100' alt='...''>
       <div class='carousel-caption d-none d-md-block'>
         <h5>$s_name1</h5>
         <p>.....</p>
       </div>
     </div>
     <div class='carousel-item'>
       <img src='...' class='d-block w-100' alt='...'>
       <div class='carousel-caption d-none d-md-block'>
         <h5>$s_name2</h5>
         <p>.......</p>
       </div>
     </div>
     <div class='carousel-item'>
       <img src='...' class='d-block w-100' alt='...'>
       <div class='carousel-caption d-none d-md-block'>
         <h5>$s_name3</h5>
         <p>........</p>
       </div>
     </div>
   </div>
   <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide='prev'>
     <span class='carousel-control-prev-icon' aria-hidden='true'></span>
     <span class='visually-hidden'>Previous</span>
   </button>
   <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide='next'>
     <span class='carousel-control-next-icon' aria-hidden='true'></span>
     <span class='visually-hidden'>Next</span>
   </button>
 </div>
   
   "; 
   echo $slider;
 
}

function user_data()
{
  session_start();
  $user =  "
  <form method='post'>
  <div class='user'>
    <a href='/project/index.php'>Home</a>
    <a href='/project/index.php'>Home</a>
    <a href='/project/index.php'>Home</a>
    <a href='/project/index.php'>Home</a>
    <a href='/project/index.php'>x</a>
  </div>
  </form>";
  echo $user;
  $_SESSION['user'] = $user;
}
?>