<?php

	include('Query_class.php');
	include('html\catalog_view.php');

	
	
	

	
		
if('POST'==$_SERVER['REQUEST_METHOD']){
	require('download_on_serv.php');
	$obj= new Query ($form_memory_choices,$form_brand_choices,$form_card_choices,$form_price_choices,$form_OS_choices,$form_name_choice);
	print_content($obj->get_searched());
	
}
else{
	print_first();
	if($content=Query::get_all()){
		print_content($content);
	}
	print_third();
}	
?>