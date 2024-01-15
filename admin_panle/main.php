<?php require 'header.php'; ?>
<h1>UserData</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Date/Time</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
      require 'database/_dbconnect.php';
        $query = "SELECT * FROM users";

        $run = mysqli_query($conn,$query);

        if(mysqli_num_rows($run) > 0)
        {
            while($row = mysqli_fetch_assoc($run))
            {
  
               echo " <tr>
                            <th scope='row'>".$row["id"] ."</th>
                            <td>".$row['username'] ."</td>
                            <td>".$row['password']."</td>
                            <td>".$row['date']."</td>
                            <td><a href='update.php?id=".$row['id']."'><button type='button' class='btn btn-primary'>Update</button></a>
                            <a href='delete.php?id=".$row['id']."'><button type='button' class='btn btn-danger'>Delete</button></a>
                            </td>
                     </tr>
                   ";
                }  ?>
    </table>
    </tbody>
<?php  
}
else{
    echo "empty";
}
 
 
 
 ?>