<?php

// first form
$form_name_choice;
if(isset($_POST["model"])){
		$form_name_choice=$_POST["model"];
	}
	//////////////////////////////////////
/* if('POST'==$_SERVER['REQUEST_METHOD']){
	print "your choice was: $form_name_choice";
	print '</br>';
} */





$form_memory_choices=array();//here is array of chosen memory charactestics, 16 gb choice storing in 0`s element | 240 - 4
for($i=0;$i<5;$i++){
	if(isset($_POST["memory$i"])){
		$form_memory_choices[]=$_POST["memory$i"];
	}
}
/////////////////////-----------testing memory array
/* if('POST'==$_SERVER['REQUEST_METHOD']){				
	print 'your choice was: ';
	foreach($form_memory_choices as $example){
		print $example.', ';
		
	}
	print '</br>';
	}  */
////////////////////










// second form
$form_brand_choices=array();
for($i=0;$i<5;$i++){
	if(isset($_POST["brand$i"])){
		$form_brand_choices[]=$_POST["brand$i"];
	}
}

////////////////////-----------testing memory array
/* if('POST'==$_SERVER['REQUEST_METHOD']){				
	print 'your choice was: ';
	foreach($form_brand_choices as $example){
		print $example.', ';
		
	}
	print '</br>';
	}  */
////////////////////









//third form
 $form_card_choices=array();
 for($i=0;$i<2;$i++){
	 if(isset($_POST["sim_card$i"])){
		 $form_card_choices[]=$_POST["sim_card$i"];
	 }
 }
 
 //////////////////------------testing card
 /* if('POST'==$_SERVER['REQUEST_METHOD']){				
	print 'your choice was: ';
	foreach($form_card_choices as $example){
		print $example.', ';
		
	}
	print '</br>';
	} */









//fourth form
$form_price_choices=array();
for($i=0;$i<2;$i++){
	if($_POST["price$i"]>=0&&is_numeric($_POST["price$i"])){
		$form_price_choices[$i]=$_POST["price$i"];
	}
}
 /* if($form_price_choices[0]&&$form_price_choices[1]){
	if($form_price_choices[1]>$form_price_choices[0]){
		$temp=$form_price_choices[0];
		$form_price_choices[0]=$form_price_choices[1];
		$form_price_choices[1]=$temp;
	}
}  */
 if(!$form_price_choices[1]){
	$form_price_choices[1]=1;
}
if(!$form_price_choices[0]){
	$form_price_choices[0]=99999999;
}

 /////////////////-------------testing price
/* if('POST'==$_SERVER['REQUEST_METHOD']){				
	print 'your choice was: ';
	foreach($form_price_choices as $example){
		print $example.', ';
		
	}
	print '</br>';
	} 
 */
	
	
	
	
	
	
	
	
	
	
	
	
//searching OS
$form_OS_choices=array();
for($i=0;$i<3;$i++){
	if(isset($_POST["OS$i"])){
		$form_OS_choices[]=$_POST["OS$i"];
	}
}
 /////////////////-------------testing OS
/* if('POST'==$_SERVER['REQUEST_METHOD']){				
	print 'your choice was: ';
	foreach($form_OS_choices as $example){
		print $example.', ';
		
	}
print '</br>';	}*/
?> 