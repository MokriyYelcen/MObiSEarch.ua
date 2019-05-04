<?php	
	$connection = mysqli_connect('127.0.0.1','root','','test_db') ;

	if(isset($_POST["login"])){

	if(!empty($_POST['l_username']) && !empty($_POST['l_password'])) {
	$l_username=htmlspecialchars($_POST['l_username']);
	$l_password=htmlspecialchars($_POST['l_password']);
	
	$sql="SELECT COUNT(`username`) AS'b' FROM `usertbl` WHERE `username`='$l_username'";
	$query =mysqli_query($connection,$sql );
	$numrows=mysqli_fetch_assoc($query);
	if($numrows['b'])
	{
	
	 $s1ql="SELECT * FROM `usertbl` WHERE `username`='$l_username'";
	$q1uery =mysqli_query($connection,$s1ql );
while($row=mysqli_fetch_assoc($q1uery))
 {
	$dbusername=$row['username'];
  $dbpassword=$row['password'];
 }
  if($l_username == $dbusername && $l_password == $dbpassword)//2 узел
 {
	
	// старое место расположения
	//  session_start();
	setcookie ("login", $row['username'], time() + 50000); 						
	setcookie ("password", $row['password'], time() + 50000);
	 $_SESSION['id'] = $row['id'];
	 $id = $_SESSION['id'];	 

   header("Location: menu.php");
	}
	else {
		echo  $message ="wrong password!!!";
	}
	
	
	} else {
			echo  $message ="login does not exist!!!";
			}
	}
	else {
    $message = "All fields are required!!!";
	}
	}
	require ('\temp\form_login.html');
	?>