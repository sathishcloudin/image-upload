<?php 
include "auth_session.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h1>THIS IS ADMIN HOME PAGE</h1>

</body>
</html>
<?php

$con=mysqli_connect("localhost","root","","login");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if($_SESSION['usertype'] == 'admin'){
$result = mysqli_query($con,"SELECT * FROM `loginsys`");

echo "<table border='1'>
<tr>
<th>username</th>
<th>password</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['password'] . "</td>";
}
echo "</table>";
?>
<li><a href="logout.php">log out</a></li> 
 <?php
}

elseif($_SESSION['usertype'] == 'super'){
  $result = mysqli_query($con,"SELECT * FROM `loginsys` where usertype = 'admin'");
echo '<b>Admin</b>';
  echo "<table border='1'>
  <tr>
  <th>username</th>
  <th>password</th>
  </tr>";
  
  while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['password'] . "</td>";
  }
  echo "</table>";

  $result = mysqli_query($con,"SELECT * FROM `loginsys` where usertype = 'user'");
  echo '<b>User</b>';
  echo "<table border='1'>
  <tr>
  <th>username</th>  
  </tr>";
  
  while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['password'] . "</td>";
  }
  echo "</table>";

  ?>
  <li><a href="logout.php">log out</a></li>
  <?php
}
else{
  //select query
  $id = $_SESSION['id'];
  $result = mysqli_query($con,"SELECT * FROM `loginsys` where id = '$id'");
  $row = mysqli_fetch_array($result);
  //query execete
  
  //fetch
        echo "I am a user";
?>
<ul>
  <li><a href="login.php">Home</a></li>
  <li><a href="myprofile.php">myprofile</a></li>
  <li><a href="password.php">change password</a></li>
  <li><a href="logout.php">log out</a></li>
</ul>
<img src="<?php echo $row['file'];?>" alt="" width="500" height="600">
<!-- img tag html -->
<!-- src="$row['username']" -->

<?php        
}
mysqli_close($con);
?>       