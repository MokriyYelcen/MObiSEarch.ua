<?php
include('MobiQ.php');
//print_header_shapka();
$connection = mysqli_connect('127.0.0.1','root','','test_db') ;
$errors=array();
if($connection){
	if('POST'==$_SERVER['REQUEST_METHOD']){
		
		//////////////////////////////////////////////////////////////////////////////////////////////
		
		
		switch (control()){
			case'del':
			
			$user_id=$_POST['button'][0];
			if(delete_row_by_id($connection,$user_id)){//в этой функции запрос на удаление
				 show_user_table($connection);
			}else{
				 print 'something went wrong';
			}
			
			break;
			case'add':
			
			if($input=validate_input($connection)){
				print'case add </br>';
				 if(add_user($connection,$input)){
					show_user_table($connection);
				}else{
					show_errors();
				}
				
				
			}else{print'case add </br>';show_errors();}
			
			break;
		}
		
	}else{
		show_user_table($connection);
	}
	
	
	
	
	
}
else{
	print"NO db connection";
}






function show_user_table($connection){
	$query_all="SELECT * FROM `usertbl`";
	$res=mysqli_query($connection,$query_all);
	print'<form  name="dele" method="post" action="adm.php" align="center" style="width:800" > ';
	print'<table align="center" border="1" >';
	while($row=mysqli_fetch_assoc($res)){
		$id=$row['id'];
		$full_name=$row['full_name'];
		$email=$row['email'];
		$username=$row['username'];
		$password=$row['password'];
	$r='<tr>'.
									"<td>$full_name</td>".
									"<td>$email</td>".
									"<td>$username</td>".
									"<td>$password</td>".
									"<td><button name=\"button[]\" value=\"$id\" ><strong style=\"color:RED;background:YELLOW;font-size:30px;\">&#10008</strong></button></td>".
									
			'</tr>';
		print $r;
	}
	
	
	print"<tr>".
	"<td>"."<input type=\"text\" name=\"fullname\" placeholder=\"fullname\" >"."</td>".
	"<td>"."<input type=\"text\" name=\"Email\" placeholder=\"Email\" >"."</td>".
	"<td>"."<input type=\"text\" name=\"login\" placeholder=\"login\" >"."</td>".
	"<td>"."<input type=\"text\" name=\"password\" placeholder=\"password\" >"."</td>".
	"<td>"."<input type=\"submit\" name=\"add\" value=\"add new admin\" style=\"font-size:30px;\" >"."</td>".
	"</tr>"."</table>";
	print'</table>'.'</form>';
}

function delete_row_by_id($connection,$id){
	if($temp=mysqli_query($connection,"DELETE FROM `usertbl` WHERE `id`=$id")){
		return true;
	}
	else{return $temp;}
}

function add_user($connection,$valid_new_user){
	
		$full_name=$valid_new_user['fullname'];
		$email=$valid_new_user['Email'];
		$username=$valid_new_user['login'];
		$password=$valid_new_user['password'];
	
	$busy_email=mysqli_query($connection,"SELECT COUNT(`email`) as`e` FROM `usertbl` WHERE `email`='$email' ");
	$busy_login=mysqli_query($connection,"SELECT COUNT(`username`) as`u` FROM `usertbl` WHERE `username`='$username' ");
	$busy_email=mysqli_fetch_assoc($busy_email);
	$busy_login=mysqli_fetch_assoc($busy_login);
if ($busy_email['e']==0 && $busy_login['u']==0){
		$add_new_sql="INSERT INTO `usertbl`(`id`,`full_name`,`email`,`username`,`password`) VALUES ('NULL','$full_name','$email','$username','$password')";
		
		if($add=mysqli_query($connection,$add_new_sql)){
			return true;
		}else{
			$GLOBALS["errors"]['db_error']='data base error ocured';
			return false;
		}
	}else{
		if($busy_email['e']!=0){$GLOBALS["errors"]['busy_email']='entered busied email';}
		if($busy_login['u']!=0){$GLOBALS["errors"]['busy_login']='entered busied login';}
		return false;
	}
	
}
function validate_input($connection){
	$input=array();
	$val_errors=0;
	
 	if(strlen(trim($name=$_POST['fullname']))>=4){
		$input['fullname']=ucwords(strtolower(htmlspecialchars($name)));
	}else{
		$GLOBALS["errors"]['fullname']='uncorrect fullname';
		$val_errors++;
	} 
	
	
	if($email=filter_input(INPUT_POST,'Email',FILTER_VALIDATE_EMAIL)){
	$input['Email']=$email;
	}else{
		$GLOBALS["errors"]['Email']='uncorrect Email';
		$val_errors++;
	}
	
	if(strlen(trim($login=$_POST['login']))>=3){
		$input['login']=htmlspecialchars($login);
	}else{
		$GLOBALS["errors"]['login']='uncorrect login';
		$val_errors++;
	}
	
	if(strlen(trim($pass=$_POST['password']))>=3){
		$input['password']=htmlspecialchars($pass);
	}else{
		$GLOBALS["errors"]['password']='uncorrect password';
		$val_errors++;
	}
	
	
	if($val_errors==0){
		return $input;
	}else{
		return false;
	}
}

function show_errors(){
	$errors=$GLOBALS["errors"];
	foreach($errors as $error){
		print'u have '.$error.'</br>';
	}
}

function control(){
	if($_POST['button'][0]){return 'del';}
	if($_POST['add']){print 'control return adding </br>';return 'add';}
}


?>