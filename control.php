<?php

require ('\temp\form.html');
function validate($input){
	if(is_numeric($input)&&$input>-100&&$input<100){return true;}
	else{return false;}
}
if(!$_POST['minus']&&$_POST['uncatcheble']){
	print'Tring to change price for ever(for more inf, read SC)';
	/*эта функция могла бы принимать текущие цены на смартфоны за дефолтное значение,
	затрудняя процедуру отката до прошлой цены. В будущем планируется осуществить синхронзацию цен
	с текущим курсом доллара и автоматизировать процесс пасивного изменения цены*/
}
if (validate($_POST['minus'])) {
	$percent=$_POST['minus'];
		$connection=mysqli_connect('127.0.0.1','root','','test_db');
		if($connection){
			$checking="SELECT `percent`FROM `price_log` WHERE `znak`='0'";
			$prov=mysqli_query($connection,$checking);
			$start=mysqli_fetch_assoc($prov);
			if($start['percent']==100){
					$update="UPDATE `mobile_phones`
							SET `price` = `price`+(`price`*$percent/100)";
					mysqli_query($connection,$update);
					$log_change="UPDATE `price_log`
								SET `date`=SYSDATE(),`percent`=`percent`+$percent,`price_sum`=(SELECT SUM(`price`) FROM `mobile_phones`)
								WHERE `znak`='0'";
					mysqli_query($connection,$log_change);	
//					INSERT to price_history
					
			}
			else{
					$koef=$start['percent'];
					$return="UPDATE `mobile_phones`
							SET `price` = (`price`/$koef)*(100+$percent)";
					mysqli_query($connection,$return);
					$log_change="UPDATE `price_log`
								SET `date`=SYSDATE(),`percent`= 100+$percent,`price_sum`=(SELECT SUM(`price`) FROM `mobile_phones`)
								WHERE `znak`='0'";
					mysqli_query($connection,$log_change);
					
//					INSERT to price_history
			}
		} 
	

}




?>
